<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $model = new Produk();
        $dataAll = $model->all();
        return view('produk.index', ['dataAll' => $dataAll]);
    }
    
    public function create(){
        return view('produk.create');
    }
}
