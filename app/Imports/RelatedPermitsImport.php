<?php

namespace App\Imports;

use App\model\Permits;
use App\model\RelatedPermits;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RelatedPermitsImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RelatedPermits([
            'permits_id'     => $row['permits_id'],
            'related_permits'    => $row['related_permits'],
        ]);
    }

    public function rules(): array
    {
        $id = Permits::get('id');

        return [
            '*.permits_id'=>'required|numeric|exists:permits,id',
            '*.related_permits'=>'required|numeric|exists:permits,id',
        ];
    }
}
