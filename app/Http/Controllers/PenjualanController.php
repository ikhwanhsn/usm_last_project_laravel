<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        $model = new Penjualan();
        $dataAll = $model->all();
        return view('penjualan.index', ['dataAll' => $dataAll]);
    }
}
