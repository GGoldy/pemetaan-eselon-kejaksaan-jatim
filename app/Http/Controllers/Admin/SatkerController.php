<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satker;
use App\Models\Jumlah;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\MySqlConnection;
use RealRashid\SweetAlert\Facades\Alert;


class SatkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alert = new Alert();
        $pageTitle = 'Tabel Pemetaan Satuan Kerja KEJATI JATIM';

        $satkers = Satker::all();

        return view('admin.satker.index', compact('pageTitle', 'satkers','alert'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Buat Satker';

        return view('admin.satker.create', compact('pageTitle'));
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
            'nama' => 'required',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $longtitude = $request->longitude;
        $latitude = $request->latitude;
        $longalt = implode(', ', [$longtitude, $latitude]);

        $satker = new Satker;
        $satker->nama = $request->nama;
        $satker->longalt = $longalt;
        $satker->save();

        Alert::alert('Sukses!', 'Data Satuan Kerja Berhasil Ditambahkan', 'success');

        return redirect()->route('satkers.index');

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
        $pageTitle = 'Sunting Satker';
        $satker = Satker::find($id);

        return view('admin.satker.edit', compact('pageTitle', 'satker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $longtitude = $request->longitude;
        $latitude = $request->latitude;
        $longalt = implode(', ', [$longtitude, $latitude]);

        $satker = Satker::find($id);
        $satker->nama = $request->nama;
        $satker->longalt = $longalt;
        $satker->save();

        Alert::alert('Sukses!', 'Data Satuan Kerja Berhasil Diubah', 'success');

        return redirect()->route('satkers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Satker::find($id)->delete();
        Alert::alert('Sukses!', 'Data Satuan Kerja Berhasil Dihapus', 'success');
        return redirect()->route('satkers.index');

    }
}
