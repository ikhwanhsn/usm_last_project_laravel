<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public $table = 'products';
    protected $primaryKey = 'id_products';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
}
