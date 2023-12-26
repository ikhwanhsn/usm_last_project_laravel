<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;

class PenjualanController extends Controller
{
    public function index()
    {
        $model = new Penjualan();
        $dataAll = $model->all();
        return view('penjualan.index', ['dataAll' => $dataAll]);
    }

    public function create(){
        $produkList = Produk::all();
        return view('penjualan.create', compact('produkList'));
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:25',
            'harga' => 'required|numeric|max:10000000',
            'jumlah' => 'required|numeric|max:100000',
            'total' => 'required|numeric|max:100000000',
        ]);

        // Menyimpan penjualan
        $penjualan = new Penjualan();
        $penjualan->nama_produk = $request->nama_produk;
        $penjualan->harga = $request->harga;
        $penjualan->jumlah = $request->jumlah;
        $penjualan->total = $request->total;

        // Ambil model Produk berdasarkan nama_produk
        $produk = Produk::where('nama_produk', $request->nama_produk)->first();

        // Pastikan produk ditemukan sebelum menyimpan penjualan
        if ($produk) {
            // Mengisi 'id_produk' pada model Penjualan
            $penjualan->id_produk = $produk->id_produk;

            // Menyimpan penjualan
            $penjualan->save();

            // Mengurangkan stok produk
            $produk->stok -= $request->jumlah;
            $produk->save();

            return redirect('/penjualan')->with('pesan', 'Data dengan nama: ' . $request->nama_produk . ' berhasil ditambahkan');
        } else {
            return redirect('/penjualan')->with('error', 'Produk tidak ditemukan.');
        }
    }



    public function read(){
        $model = new Produk();
        $dataAll = $model->all();
        return view('penjualan.index', ['dataAll' => $dataAll]);
    }

    public function update($id_penjualan){
        $data = Penjualan::find($id_penjualan);
        if($data){
            $produkList = Produk::all();
            return view('penjualan.update', compact('data', 'produkList'));
        } else {
            return redirect('penjualan.index')->with('pesan', 'Data penjualan tidak ditemukan');
        }
    }

    public function edit(Request $request){
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:25',
            'harga' => 'required|numeric|max:10000000',
            'jumlah' => 'required|numeric|max:100000',
            'total' => 'required|numeric|max:100000000',
        ]);

        $data = Penjualan::find($request->id_penjualan);

        if (!$data) {
            return redirect('/penjualan')->with('error', 'Data tidak ditemukan.');
        }

        $data->nama_produk = $request->nama_produk;
        $data->harga = $request->harga;
        $data->jumlah = $request->jumlah;
        $data->total = $request->total;
        $data->updated_at = now();
        $data->save();
        
        return redirect('/penjualan')->with('pesan', 'Data dengan nama: ' . $request->nama_produk . ' berhasil diupdate');
    }

    public function delete($id_penjualan){
        $penjualan = Penjualan::find($id_penjualan);
        $penjualan->delete();
        return redirect('/penjualan')->with('pesan', 'Data penjualan berhasil dihapus.');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
