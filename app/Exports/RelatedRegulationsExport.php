<?php

namespace App\Exports;

use App\model\RelatedRegulations;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use phpDocumentor\Reflection\Types\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;
class RelatedRegulationsExport implements FromCollection, WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return RelatedRegulations::all();
    }

    public function map($related): array
     {
         return [
             $related->regulations_id,
             $related->reg_regulations['regulation_name_en'],
             $related->related_regulations,
             $related->regulations['regulation_name_en'],
         ];
     }

    public function headings(): array
    {
        return [
            'regulations_id',
            'regulation_name',
            'related_regulations',
            'related_regulation_name',
        ];
    }
}
