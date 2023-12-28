<form method="POST" action="{{ url('/produk/update-foto/'.$produk->id_produk) }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="foto">Foto Produk</label>
        <img src="{{ asset('path/to/foto_produk.jpg') }}" alt="Foto Produk" width="50">
    </div>

    <div>
        <label for="new_foto">Upload Foto Baru</label>
        <input type="file" name="new_foto" id="new_foto" accept="image/*" />
    </div>

    <div class="flex flex-col items-end mt-4">
        <button type="submit">Update Foto</button>
    </div>
</form>