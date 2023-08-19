<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satker;

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

        $satkers = Satker::all();

        return view('home', ['pageTitle' => $pageTitle], ['satkers' => $satkers]);
    }

    public function howto()
    {
        $pageTitle = 'Cara Penggunaan';
    }
}
