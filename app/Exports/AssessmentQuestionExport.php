<?php

namespace App\Exports;

use App\model\AssessmentQuestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssessmentQuestionExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AssessmentQuestion::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'السؤال',
            'questions',
            'الاجابة',
            'answer',
            'created_at',
            'updated_at'
        ];
    }
}
