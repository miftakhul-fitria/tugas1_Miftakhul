<?php

namespace App\Exports;

use App\BiodataMahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class BiodataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BiodataMahasiswa::select('id','name','nim','address','photo')->get();
    }
}
