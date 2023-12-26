<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Penjualan extends Model
{
    use HasFactory;
    public $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
