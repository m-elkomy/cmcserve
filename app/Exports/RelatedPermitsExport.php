<?php

namespace App\Exports;

use App\model\RelatedPermits;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use phpDocumentor\Reflection\Types\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;
class RelatedPermitsExport implements FromCollection, WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return RelatedPermits::all();
    }

    public function map($related): array
     {
         return [
             $related->permits_id,
             $related->reg_permits['permits_name_en'],
             $related->related_permits,
             $related->permits['permits_name_en'],
         ];
     }

    public function headings(): array
    {
        return [
            'permits_id',
            'permits_name',
            'related_permits',
            'related_permits_name',
        ];
    }
}
