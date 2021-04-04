<?php

namespace App\Exports;

use App\model\Regulations;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegulationsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Regulations::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'حالة القانون',
            'Text Status',
            'كلمات البحث',
            'Search Keyword',
            'نوع القانون',
            'Regulation Type',
            'اسم القانون',
            'Regulation Name',
            'نص القانون',
            'Article Text',
            'attachment',
            'regulation_year',
            'regulation_number',
            'article_number',
            'created_at',
            'updated_at'
        ];
    }
}
