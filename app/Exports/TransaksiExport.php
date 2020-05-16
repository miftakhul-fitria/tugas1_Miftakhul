<?php

namespace App\Exports;

use App\Models\T_pesanan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return T_pesanan::all();
    }
}
