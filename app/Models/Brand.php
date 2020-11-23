<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_merek'
    ];

    public function barang()
    {
        return $this->hasMany('App\Models\Item', 'id_merek');
    }
}
