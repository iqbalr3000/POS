<?php

namespace App\Exports;

use App\Models\DetailTransaction;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DetailTransaction::all();
    }

    public function headings(): array
    {
        return [
            'id user',
            'total bayar',
            'uang bayar',
            'kembalian',
            'tanggal beli',
            'created at',
            'updated at',
        ];
    }
}