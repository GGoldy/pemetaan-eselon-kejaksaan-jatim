<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satker;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = 'Pemetaan Satuan Kerja dengan Pegawai dalam Wilayah Kerja KEJATI JATIM';
        $satkersWithJabatans = Satker::with('jabatans')->get();
        return view('admin.mapadmin', ['pageTitle' => $pageTitle], ['satkers' => $satkersWithJabatans]);
    }
}
