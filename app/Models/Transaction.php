<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang', 'jumlah_beli', 'total_harga', 'status'
    ];

    public function barang()
    {
        return $this->belongsTo('App\Models\Item' , 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User' , 'id_user');
    }
}
