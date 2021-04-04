<?php

namespace App\Imports;

use App\model\AssessmentQuestion;
use App\model\RelatedQuestion;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RelatedQuestionImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RelatedQuestion([
            'question_id'     => $row['question_id'],
            'related_questoin'    => $row['related_question'],
        ]);
    }

    public function rules(): array
    {
        $id = AssessmentQuestion::get('id');

        return [
            '*.question_id'=>'required|numeric|exists:assessment_questions,id',
            '*.related_question'=>'required|numeric|exists:assessment_questions,id',
        ];
    }
}
