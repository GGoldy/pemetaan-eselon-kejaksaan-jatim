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
        $pageTitle = 'Selamat Datang di Pengenalan Pemetaan SATKER KEJATI JATIM!';

        return view('admin.dashboard', ['pageTitle' => $pageTitle]);
    }

    public function leaflet()
    {
        $pageTitle = 'Pemetaan Satuan Kerja KEJATI JATIM';
        $satkers = Satker::all();
        return view('admin.mapadmin', ['pageTitle' => $pageTitle], ['satkers' => $satkers]);
    }
}
