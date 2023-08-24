<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satker;
use App\Models\Jabatan;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = 'Pemetaan Satker';

        $satkersWithJabatans = Satker::with('jabatans')->get();

        return view('home', ['pageTitle' => $pageTitle], ['satkers' => $satkersWithJabatans]);
    }

    public function howto()
    {
        $pageTitle = 'Cara Penggunaan';
    }
}
