<section>
    <x-guest-layout>
        <h1 class='mb-5 text-3xl font-bold text-center'>Update Pelanggan</h1>

        <form method="POST" action="{{ url('/pelanggan/edit') }}">
        @csrf

        <x-text-input type="hidden"
                name="id_pelanggan"
                id="id_pelanggan"
                value="{{ $data->id_pelanggan }}"
                required
        />
            <!-- Name -->
            <div>
                <x-input-label for="nama_pelanggan" :value="__('Nama pelanggan')"/>
                <x-text-input type="text"
                        name="nama_pelanggan"
                        id="nama_pelanggan"
                        value="{{ $data->nama_pelanggan }}"
                        required
                />
                <x-input-error :messages="$errors->get('nama_pelanggan')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-3">
                <x-input-label for="alamat" :value="__('Alamat')"/>
                <x-text-input type="text"
                        name="alamat"
                        id="alamat"
                        value="{{ $data->alamat }}"
                        required/>
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-input-label for="nomor_telepon" :value="__('Nomor telepon')"/>
                <x-text-input type="number"
                        name="nomor_telepon"
                        id="nomor_telepon"
                        value="{{ $data->nomor_telepon }}"
                        required
                />
                <x-input-error :messages="$errors->get('nomor_telepon')" class="mt-2" />
            </div>

            <div class="flex flex-col items-end mt-4">
                <x-primary-button class="w-full">
                    {{ __('Simpan') }}
                </x-primary-button>
                <a href="/pelanggan" class="w-full px-4 py-2 mt-2 text-sm text-center text-white bg-red-500 rounded-md hover:bg-red-600">
                <button>Batal</button>
                </a>
            </div>
        </form>
    </x-guest-layout>

</section>
