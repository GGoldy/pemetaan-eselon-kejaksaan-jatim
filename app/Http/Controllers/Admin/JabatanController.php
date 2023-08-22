<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Jumlah;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\MySqlConnection;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = 'Tabel Daftar Jabatan dalam wilayah kerja Kejaksaan Tinggi Jawa Timur';

        $jabatans = Jabatan::all();

        return view('admin.jabatan.index', ['pageTitle' => $pageTitle], ['jabatans' => $jabatans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Buat Jabatan';

        return view('admin.jabatan.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();

        return redirect()->route('jabatans.index');
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
        $pageTitle = 'Sunting Jabatan';
        $jabatan = Jabatan::find($id);

        return view('admin.jabatan.edit', compact('pageTitle', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jabatan = Jabatan::find($id);
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();

        return redirect()->route('jabatans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jabatan::find($id)->delete();
        return redirect()->route('jabatans.index');
    }
}
