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

    public function create(){
        return view('pelanggan.create');
    }

    public function save(Request $request){
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:25',
            'alamat' => 'required|string|max:100000',
            'nomor_telepon' => 'required|numeric',
        ]);
        
        // Menyimpan nama file di database
        $model = new Pelanggan();
        $model->nama_pelanggan = $request->nama_pelanggan;
        $model->alamat = $request->alamat;
        $model->nomor_telepon = $request->nomor_telepon;
        $model->save();

        $dataAll = $model->all();
        return redirect('/pelanggan')->with('pesan', 'Data dengan nama: ' . $request->nama_pelanggan . ' berhasil ditambahkan');
    }

    public function read(){
        $model = new Pelanggan();
        $dataAll = $model->all();
        return view('pelanggan.index', ['dataAll' => $dataAll]);
    }

    public function update($id_pelanggan){
        if($data= Pelanggan::find($id_pelanggan)){
            return view('pelanggan.update', ['data' => $data]);
        } else {
            return redirect('pelanggan.index');
        }
    }

    public function edit(Request $request){
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:25',
            'alamat' => 'required|string|max:100000',
            'nomor_telepon' => 'required|numeric',
        ]);

        $data = Pelanggan::find($request->id_pelanggan);

        if (!$data) {
            return redirect('/pelanggan')->with('error', 'Data tidak ditemukan.');
        }

        $data->nama_pelanggan = $request->nama_pelanggan;
        $data->alamat = $request->alamat;
        $data->nomor_telepon = $request->nomor_telepon;
        $data->updated_at = now();
        $data->save();
        
        return redirect('/pelanggan')->with('pesan', 'Data dengan nama: ' . $request->nama_pelanggan . ' berhasil diupdate');
    }

    public function delete($id_pelanggan){
        $pelanggan = Pelanggan::find($id_pelanggan);
        $pelanggan->delete();
        return redirect('/pelanggan')->with('pesan', 'Data pelanggan berhasil dihapus.');
    }
}
