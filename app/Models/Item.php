<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang', 'id_merek', 'id_distributor', 'tanggal_masuk', 'harga_barang', 'stok_barang', 'keterangan'
    ];

    public function merek()
    {
        return $this->belongsTo('App\Models\Brand', 'id_merek');
    }

    public function distributor()
    {
        return $this->belongsTo('App\Models\Distributor', 'id_distributor');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaction', 'id_barang');
    }
}
