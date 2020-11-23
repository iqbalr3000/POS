<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_distributor', 'alamat', 'no_telp'
    ];

    public function barang()
    {
        return $this->hasMany('App\Models\Item', 'id_distributor');
    }
}
