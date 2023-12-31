<?php

namespace App\Http\Controllers\Admin;

use App\Models\Satker;
use App\Models\Jabatan;
use App\Models\Jumlah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\MySqlConnection;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class JumlahController extends Controller
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
    $pageTitle = 'Tabel Pemetaan Jumlah Pegawai berdasar Jabatan dalam Satuan Kerja KEJATI JATIM';

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
    $jumlahs = Jumlah::all();
    return view('admin.jumlahpegawai.create', compact('pageTitle', 'satkers', 'jabatans', 'jumlahs'));
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

    if ($validator->fails()) {
      return redirect()->back()->withErrors('Terjadi Kesalahan!')->withInput();
    }
    if ($satkers->jabatans->contains('id', $jabatan)) {
      // If it exists, update the 'jumlah' variable
      $newData = [
        'updated_at' => now(),
        'jumlah' => $jumlah, // Update the 'jumlah' column in the pivot table
      ];

      $satkers->jabatans()->updateExistingPivot($jabatan, $newData);
      Alert::alert('Peringatan!', 'Data Jumlah Pegawai Yang Dimasukkan Sudah Ada. Sistem Menggantikan Data Jumlah Yang Sudah Ada.', 'warning');
    } else {
      // If it doesn't exist, create a new pivot record

      $satkers->jabatans()->sync([$jabatan => ['jumlah' => $jumlah, 'created_at' => now(), 'updated_at' => now()]], false);
      Alert::alert('Sukses!', 'Data Jumlah Pegawai Berhasil Ditambahkan', 'success');
    }

    // $satkers->jabatans()->sync([$jabatan => ['jumlah' => $jumlah, 'created_at' => now(), 'updated_at' => now()]], false);


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

    return view('admin.jumlahpegawai.edit', compact('pageTitle', 'satkers', 'jabatans', 'pivotData', 'jabatanbyjumlah', 'satkerbyjumlah'));
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

    Alert::alert('Sukses!', 'Data Jumlah Pegawai Berhasil Diubah', 'success');

    return redirect()->route('jumlahs.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    DB::table('jumlahs')->where('id', $id)->delete();
    Alert::alert('Sukses!', 'Data Jumlah Pegawai Berhasil Dihapus', 'success');
    return redirect()->route('jumlahs.index');
  }

  public function deleteMultiple()
  {
    $pageTitle = 'Hapus Multi Data Jumlah Pegawai';

    $satkers = Satker::with('jabatans')->get();
    $jumlahs = Jumlah::all();
    return view('admin.jumlahpegawai.deleteMultiple', ['pageTitle' => $pageTitle], ['satkers' => $satkers], ['jumlahs' => $jumlahs]);
  }

  public function deleteMultipleGo(Request $request)
  {
    $selectedIds = $request->input('selected_ids');

    $selectedIdsArray = explode(',', $selectedIds);

    // dd($selectedIdsArray);
    // Check if any IDs are selected
    if (!empty($selectedIdsArray)) {

      Jumlah::whereIn('id', $selectedIdsArray)->delete();

      // Redirect back to the index page
      Alert::alert('Sukses!', 'Data Jumlah Pegawai Berhasil Dihapus', 'success');
      return redirect()->route('jumlahs.index');
    } else {
      // If no IDs are selected, show a message and redirect
      return redirect()->route('jumlahs.index')->with('error', 'No items were selected for deletion.');
    }
  }
}
