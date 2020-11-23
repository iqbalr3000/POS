<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang', 'id_user', 'jumlah_beli', 'total_harga', 'tanggal_beli'
    ];

    public function barang()
    {
        return $this->belongsTo('App\Models\Item' , 'id_barang');
    }
}
