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
    public function editfoto($id_produk)
    {
        $produk = Produk::find($id_produk);
        if ($produk) {
            return view('produk.editfoto', compact('produk'));
        } else {
            return redirect('/produk/read')->with('error', 'Data produk tidak ditemukan.');
        }
    }

    public function updateFoto(Request $request, $id_produk)
    {
        // Validate the incoming request data
        $request->validate([
            'new_foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the product by ID
        $produk = Produk::find($id_produk);

        // Check if the product exists
        if (!$produk) {
            return redirect('/produk/read')->with('error', 'Produk not found.');
        }

        // Handle file upload
        if ($request->hasFile('new_foto')) {
            $file = $request->file('new_foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('path/to/your/upload/directory'), $fileName);

            // Update the 'foto' column in the database
            $produk->foto = $fileName;
            $produk->save();
        }

        return redirect('/produk/read')->with('pesan', 'Foto produk berhasil diupdate.');
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
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add image validation rules
        ]);
    
        // Create a new Produk instance
        $model = new Produk();
        $model->nama_produk = $request->nama_produk;
        $model->harga = $request->harga;
        $model->stok = $request->stok;
        $model->kategori = $request->kategori;
    
        // Check if a file is uploaded
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('path/to/your/upload/directory'), $fileName);
    
            // Save the file name to the 'foto' column in the database
            $model->foto = $fileName;
        }
    
        // Save the model to the database
        $model->save();
    
        // Redirect to the read page
        return redirect('/produk/read')->with('pesan', 'Data dengan nama: ' . $request->nama_produk . ' berhasil ditambahkan');
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
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = Produk::find($request->id_produk);

        if (!$data) {
            return redirect('/produk/read')->with('error', 'Data tidak ditemukan.');
        }

        $data->nama_produk = $request->nama_produk;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->kategori = $request->kategori;
        $data->updated_at = now();
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($produk->foto) {
                Storage::delete('public/foto_produk/' . $produk->foto);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('public/foto_produk');
            $produk->foto = basename($fotoPath);
        }
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

        return redirect('/produk/read')->with('pesan', 'Data dengan nama: ' . $request->nama_produk . ' berhasil diupdate');
    }



    public function delete($id_produk){
        $produk = Produk::find($id_produk);
        $produk->delete();
        return redirect('/produk/read')->with('pesan', 'Data produk berhasil dihapus.');
    }
}
