<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 'total_bayar', 'uang_bayar', 'kembalian', 'tanggal_beli'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User' , 'id_user');
    }
}

