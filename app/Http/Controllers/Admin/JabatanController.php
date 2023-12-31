<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\MySqlConnection;
use RealRashid\SweetAlert\Facades\Alert;

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
        $pageTitle = 'Tabel Daftar Jabatan dalam Wilayah Kerja KEJATI JATIM';

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

        Alert::alert('Sukses!', 'Data Jabatan Berhasil Ditambahkan', 'success');

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

        Alert::alert('Sukses!', 'Data Jabatan Berhasil Diubah', 'success');

        return redirect()->route('jabatans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jabatan::find($id)->delete();
        Alert::alert('Sukses!', 'Data Jabatan Berhasil Dihapus', 'success');
        return redirect()->route('jabatans.index');
    }

    public function deleteMultiple()
  {
    $pageTitle = 'Hapus Multi Data Jumlah Pegawai';

    $jabatans = Jabatan::all();

    return view('admin.jabatan.deleteMultiple', ['pageTitle' => $pageTitle], ['jabatans' => $jabatans]);
  }

  public function deleteMultipleGo(Request $request)
  {
    $selectedIds = $request->input('selected_ids');

    $selectedIdsArray = explode(',', $selectedIds);

    // dd($selectedIdsArray);
    // Check if any IDs are selected
    if (!empty($selectedIdsArray)) {

      Jabatan::whereIn('id', $selectedIdsArray)->delete();

      // Redirect back to the index page
      Alert::alert('Sukses!', 'Data Jumlah Pegawai Berhasil Dihapus', 'success');
      return redirect()->route('jabatans.index');
    } else {
      // If no IDs are selected, show a message and redirect
      return redirect()->route('jabatans.index')->with('error', 'No items were selected for deletion.');
    }
  }
}
