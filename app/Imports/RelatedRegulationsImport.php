<?php

namespace App\Imports;

use App\model\Regulations;
use App\model\RelatedRegulations;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RelatedRegulationsImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RelatedRegulations([
            'regulations_id'     => $row['regulations_id'],
            'related_regulations'    => $row['related_regulations'],
        ]);
    }

    public function rules(): array
    {
        $id = Regulations::get('id');

        return [
            '*.regulations_id'=>'required|numeric|exists:regulations,id',
            '*.related_regulations'=>'required|numeric|exists:regulations,id',
        ];
    }
}
