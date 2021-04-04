<?php

namespace App\Exports;

use App\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdminExport implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Admin::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'name',
            'email',
            'created_at',
            'updated_at',
        ];
    }
}
