<section>
    <x-guest-layout>
        <h1 class='mb-5 text-3xl font-bold text-center'>Tambah Penjualan</h1>

        <form method="POST" action="{{ url('/penjualan/save') }}" enctype="multipart/form-data">
        @csrf

            <!-- Name -->
            <div>
                <x-input-label for="nama_produk" :value="__('Nama produk')"/>
                
                <select name="nama_produk" id="nama_produk" class="block w-full mt-1">
                    @foreach($produkList as $produk)
                        <option value="{{ $produk->nama_produk }}" data-harga="{{ $produk->harga }}" data-stok="{{ $produk->stok }}" {{ old('nama_produk') == $produk->nama_produk ? 'selected' : '' }}>
                            {{ $produk->nama_produk }}
                        </option>
                    @endforeach
                </select>
                
                <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="harga" :value="__('Harga')"/>
                <x-text-input type="number"
                        name="harga"
                        id="harga"
                        value="{{ old('harga') }}"
                        required
                        readonly
                />
                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Tangani perubahan pada dropdown nama_produk
                    $('#nama_produk').change(function() {
                        // Dapatkan harga dari atribut data-harga pada opsi yang dipilih
                        var selectedPrice = $(this).find(':selected').data('harga');

                        // Update nilai pada input harga
                        $('#harga').val(selectedPrice);
                    });

                    // Inisialisasi nilai harga berdasarkan opsi yang dipilih saat pertama kali memuat halaman
                    var initialPrice = $('#nama_produk').find(':selected').data('harga');
                    $('#harga').val(initialPrice);
                });
            </script>


            
            <div>
                <x-input-label for="jumlah" :value="__('Jumlah')"/>
                <x-text-input type="number"
                        name="jumlah"
                        id="jumlah"
                        value="{{ old('jumlah') }}"
                        required
                />
                <small id="stok-produk-info">Stok produk: {{ $produkList[0]->stok }}</small>
                <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Tangani perubahan pada dropdown nama_produk
                    $('#nama_produk').change(function() {
                        // Dapatkan stok produk dari atribut data-stok pada opsi yang dipilih
                        var selectedStok = $(this).find(':selected').data('stok');

                        // Update nilai pada elemen small
                        $('#stok-produk-info').text('Stok produk: ' + selectedStok);
                    });

                    // Inisialisasi nilai stok berdasarkan opsi yang dipilih saat pertama kali memuat halaman
                    var initialStok = $('#nama_produk').find(':selected').data('stok');
                    $('#stok-produk-info').text('Stok produk: ' + initialStok);
                });
            </script>

            <!-- Email Address -->
            <div class="mt-3">
                <x-input-label for="total" :value="__('Total')"/>
                <x-text-input type="number"
                        name="total"
                        id="total"
                        value="{{ old('total') }}"
                        required
                        readonly/>
                <x-input-error :messages="$errors->get('total')" class="mt-2" />
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Tangani perubahan pada input jumlah
                    $('#jumlah').change(function() {
                        // Dapatkan nilai jumlah dan harga
                        var jumlah = $(this).val();
                        var harga = $('#harga').val();

                        // Hitung total
                        var total = jumlah * harga;

                        // Update nilai pada input total
                        $('#total').val(total);
                    });
                });
            </script>

            <div class="flex flex-col items-end mt-4">
                <x-primary-button class="w-full">
                    {{ __('Tambah Penjualan') }}
                </x-primary-button>
                <a href="/penjualan" class="w-full px-4 py-2 mt-2 text-sm text-center text-white bg-red-500 rounded-md hover:bg-red-600">
                <button>Batal</button>
                </a>
            </div>
        </form>
    </x-guest-layout>

</section>
