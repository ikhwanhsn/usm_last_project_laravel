<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Produk;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('Jumlah melebihi stok yang ada', function ($attribute, $value, $parameters, $validator) {
            // Pemeriksaan stok di sini
            $namaProduk = $parameters[0];
            $produk = Produk::where('nama_produk', $namaProduk)->first();

            return $produk && $value <= $produk->stok;
        });
    }
}
