<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $model = new Pelanggan();
        $dataAll = $model->all();
        return view('pelanggan.index', ['dataAll' => $dataAll]);
    }
}
