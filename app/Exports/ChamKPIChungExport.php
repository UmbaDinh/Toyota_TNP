<?php

namespace App\Exports;

use App\Models\DM_KPI_CHUNG;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChamKPIChungExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DM_KPI_CHUNG::all();
    }
}
