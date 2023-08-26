<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\MySqlConnection;
use App\Models\Satker;
use App\Models\Jabatan;


class JumlahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Tabel Pemetaan Jumlah Pegawai SATKER KEJATI JATIM';

        $satkers = Satker::with('jabatans')->get();

        return view('admin.jumlahpegawai.index', ['pageTitle' => $pageTitle], ['satkers' => $satkers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Buat Jumlah Pegawai';
        $satkers = Satker::all();
        $jabatans = Jabatan::all();
        return view('admin.jumlahpegawai.create', compact('pageTitle','satkers','jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $satker = $request->satker;
        $jabatan = $request->jabatan;
        $jumlah = $request->jumlah;

        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric'
        ], $messages);

        $satkers = Satker::find($satker);

        if ($validator->fails() or $satkers->jabatans->contains('id',$jabatan)) {
            return redirect()->back()->withErrors('Terjadi Kesalahan!')->withInput();
        }

        $satkers->jabatans()->sync([$jabatan => ['jumlah' => $jumlah, 'created_at' => now(), 'updated_at' => now()]], false);

        return redirect()->route('jumlahs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Buat Jumlah Pegawai';
        $satkers = Satker::all();
        $jabatans = Jabatan::all();
        // to get all jabatan related to one satker with id from jumlahs
        // $satkerpivot = Satker::whereHas('jabatans', function($query)use($id){
        //   $query->where('jumlahs.id',$id);
        // })->get();
        $pivotData = DB::table('jumlahs')->where('id', $id)->first();
        $jabatanbyjumlah = Jabatan::find($pivotData->jabatan_id);
        $satkerbyjumlah = Satker::find($pivotData->satker_id);

        return view('admin.jumlahpegawai.edit', compact('pageTitle','satkers','jabatans','pivotData','jabatanbyjumlah', 'satkerbyjumlah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $satker = $request->old_satker;
        $jabatan = $request->old_jabatan;
        $jumlah = $request->jumlah;


        $satkers = Satker::find($satker);
        $jabatans = Jabatan::find($jabatan);

        $newData = [
            'created_at' => now(), // Update the created_at timestamp
            'updated_at' => now(), // Update the created_at timestamp
            'jumlah' => $jumlah, // Update a custom column in the pivot table
        ];

        $satkers->jabatans()->updateExistingPivot($jabatans->id, $newData);


        return redirect()->route('jumlahs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jumlahs')->where('id', $id)->delete();
        return redirect()->route('jumlahs.index');
    }
}
