<section>
    <x-guest-layout>
        <h1 class='mb-5 text-3xl font-bold text-center'>Tambah Produk</h1>

        <form method="POST" action="{{ url('/produk/save') }}">
        @csrf

            <!-- Name -->
            <div>
                <x-input-label for="nama_produk" :value="__('Nama produk')"/>
                <x-text-input type="text"
                        name="nama_produk"
                        id="nama_produk"
                        value="{{ old('nama_produk') }}"
                        required
                />
                <x-input-error :messages="$errors->get('nama_produk')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-3">
                <x-input-label for="harga" :value="__('Harga produk')"/>
                <x-text-input type="number"
                        name="harga"
                        id="harga"
                        value="{{ old('harga') }}"
                        required/>
                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-input-label for="stok" :value="__('Stok')"/>
                <x-text-input type="number"
                        name="stok"
                        id="stok"
                        required
                />
                <x-input-error :messages="$errors->get('stok')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-3">
                <x-input-label for="kategori" :value="__('Kategori')"/>
                <x-text-input type="text"
                        name="kategori"
                        id="kategori"
                        required
                />
                <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
            </div>

            <div class="flex flex-col items-end mt-4">
                <x-primary-button class="w-full">
                    {{ __('Tambah Produk') }}
                </x-primary-button>
                <a href="/produk" class="w-full px-4 py-2 mt-2 text-sm text-center text-white bg-red-500 rounded-md hover:bg-red-600">
                <button>Batal</button>
                </a>
            </div>
        </form>
    </x-guest-layout>

</section>
