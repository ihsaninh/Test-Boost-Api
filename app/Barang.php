<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
     protected $fillable = [
        'kode_barang', 'nama_barang', 'harga_barang', 'gambar_barang', 'jumlah_barang',
    ];

    protected $primaryKey = 'kode_barang';

    public $incrementing = false;
}
