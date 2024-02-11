<?php

namespace App\Exports;

use App\Models\Calendari;
use Maatwebsite\Excel\Concerns\FromCollection;

class CalendariExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Calendari::all();
    }
}
