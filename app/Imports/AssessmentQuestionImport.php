<?php

namespace App\Imports;

use App\model\AssessmentQuestion;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssessmentQuestionImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AssessmentQuestion([
            'question_ar'     => $row['question_ar'],
            'question_en'    => $row['question_en'],
            'answer_ar' => $row['answer_ar'],
            'answer_en' => $row['answer_en'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.question_ar'=>'required|string',
            '*.question_en'=>'required|string',
            '*.answer_ar'=>'required|string',
            '*.answer_en'=>'required|string',
        ];
    }
}
