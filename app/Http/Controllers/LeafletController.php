<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satker;

class LeafletController extends Controller
{
    public function index()
    {
        $pageTitle = 'Pemetaan Satker';

        $satkers = Satker::all();

        return view('leaflet', ['pageTitle' => $pageTitle], ['satkers' => $satkers]);
    }
}
