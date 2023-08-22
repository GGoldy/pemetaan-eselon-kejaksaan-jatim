<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\MySqlConnection;
use App\Models\Satker;
use App\Models\Jabatan;
use App\Models\Jumlah;

class JumlahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Tabel Pemetaan Jumlah Pegawai SATKER KEJATI JATIM';

        $jumlahs = Jumlah::all();

        return view('admin.jumlahpegawai.index', ['pageTitle' => $pageTitle], ['jumlahs' => $jumlahs]);
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

        $satker = $request->satker;
        $jabatan = $request->jabatan;
        $jumlah_jumlah = $request->jumlah;


        $jumlah = new Jumlah;
        $jumlah->satker_id = $satker;
        $jumlah->jabatan_id = $jabatan;
        $jumlah->jumlah = $jumlah_jumlah;
        $jumlah->save();

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
        $jumlahtbl = Jumlah::find($id);
        $satkers = Satker::all();
        $jabatans = Jabatan::all();
        return view('admin.jumlahpegawai.edit', compact('pageTitle', 'jumlahtbl' ,'satkers','jabatans'));
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

        $satker = $request->satker;
        $jabatan = $request->jabatan;
        $jumlah_jumlah = $request->jumlah;


        $jumlah = Jumlah::find($id);
        $jumlah->satker_id = $satker;
        $jumlah->jabatan_id = $jabatan;
        $jumlah->jumlah = $jumlah_jumlah;
        $jumlah->save();

        return redirect()->route('jumlahs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jumlah::find($id)->delete();
        return redirect()->route('jumlahs.index');
    }
}
