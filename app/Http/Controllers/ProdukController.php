<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Penjualan;

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

    public function save(Request $request){
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:25',
            'harga' => 'required|numeric|max:100000',
            'stok' => 'required|numeric|max:100',
            'kategori' => 'required|string|max:25',
        ]);
        
        // Menyimpan nama file di database
        $model = new Produk();
        $model->nama_produk = $request->nama_produk;
        $model->harga = $request->harga;
        $model->stok = $request->stok;
        $model->kategori = $request->kategori;
        $model->save();

        $dataAll = $model->all();
        return redirect('/produk')->with('pesan', 'Data dengan nama: ' . $request->nama_produk . ' berhasil ditambahkan');
    }

    public function read(){
        $model = new Produk();
        $dataAll = $model->all();
        return view('produk.index', ['dataAll' => $dataAll]);
    }

    public function update($id_produk){
        if($data= Produk::find($id_produk)){
            return view('produk.update', ['data' => $data]);
        } else {
            return redirect('produk.index');
        }
    }

    public function edit(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:25',
            'harga' => 'required|numeric|max:100000',
            'stok' => 'required|numeric|max:100',
            'kategori' => 'required|string|max:25',
        ]);

        $data = Produk::find($request->id_produk);

        if (!$data) {
            return redirect('/produk')->with('error', 'Data tidak ditemukan.');
        }

        $data->nama_produk = $request->nama_produk;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->kategori = $request->kategori;
        $data->updated_at = now();
        $data->save();

        // Update data terkait di tabel Penjualan
        $penjualan = Penjualan::where('id_produk', $request->id_produk)->get();
        foreach ($penjualan as $jualan) {
            $jualan->nama_produk = $request->nama_produk;
            $jualan->harga = $request->harga;

            // Perbarui total harga berdasarkan perubahan harga produk
            $jualan->total = $request->harga * $jualan->jumlah;

            $jualan->save();
        }

        return redirect('/produk')->with('pesan', 'Data dengan nama: ' . $request->nama_produk . ' berhasil diupdate');
    }



    public function delete($id_produk){
        $produk = Produk::find($id_produk);
        $produk->delete();
        return redirect('/produk')->with('pesan', 'Data produk berhasil dihapus.');
    }
}
