<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ItemExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'nama barang',
            'id merek',
            'id distributor',
            'tanggal masuk',
            'harga beli',
            'harga jual',
            'stok barang',
            'keterangan',
            'created at',
            'updated at',
        ];
    }
}
