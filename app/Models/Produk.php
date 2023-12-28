<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
    protected $fillable = ['nama_produk', 'harga', 'stok', 'kategori', 'foto'];
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_produk');
    }
}
