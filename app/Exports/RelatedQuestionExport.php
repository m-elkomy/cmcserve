<?php

namespace App\Exports;

use App\model\RelatedQuestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use phpDocumentor\Reflection\Types\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;
class RelatedQuestionExport implements FromCollection, WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return RelatedQuestion::all();
    }

    public function map($related): array
     {
         return [
             $related->question_id,
             $related->reg_question['question_en'],
             $related->related_questoin,
             $related->question['question_en'],
         ];
     }

    public function headings(): array
    {
        return [
            'question_id',
            'question_name',
            'related_question_id',
            'related_question',
        ];
    }
}
