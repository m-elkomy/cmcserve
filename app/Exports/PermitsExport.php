<?php

namespace App\Exports;

use App\model\Permits;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PermitsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Permits::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'حالة القانون',
            'Text Status',
            'كلمات البحث',
            'Search Keyword',
            'نوع التصريح',
            'Regulation Type',
            'اسم التصريح',
            'Regulation Name',
            'نص التصريح',
            'Article Text',
            'attachment',
            'permits_year',
            'permits_number',
            'article_number',
            'created_at',
            'updated_at'
        ];
    }
}
