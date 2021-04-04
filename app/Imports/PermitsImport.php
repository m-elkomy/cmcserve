<?php

namespace App\Imports;

use App\model\Permits;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PermitsImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Permits([
            'article_text_status_ar'     => $row['article_text_status_ar'],
            'article_text_status_en'    => $row['article_text_status_en'],
            'search_keyword_ar' => $row['search_keyword_ar'],
            'search_keyword_en' => $row['search_keyword_en'],
            'permits_type_ar' => $row['permits_type_ar'],
            'permits_type_en' => $row['permits_type_en'],
            'permits_name_ar' => $row['permits_name_ar'],
            'permits_name_en' => $row['permits_name_en'],
            'article_text_ar' => $row['article_text_ar'],
            'article_text_en' => $row['article_text_en'],
            'permits_year' => $row['permits_year'],
            'permits_number' => $row['permits_number'],
            'article_number' => $row['article_number'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.article_text_status_ar'=>'required|string',
            '*.article_text_status_ar'=>'required|string',
            '*.search_keyword_ar'=>'required|string',
            '*.search_keyword_en'=>'required|string',
            '*.permits_type_ar'=>'required|string',
            '*.permits_type_en'=>'required|string',
            '*.permits_name_ar'=>'required|string',
            '*.permits_name_ar'=>'required|string',
            '*.permits_name_en'=>'required|string',
            '*.article_text_ar'=>'required|string',
            '*.article_text_en'=>'required|string',
            '*.permits_year'=>'required|numeric',
            '*.permits_number'=>'required|numeric',
            '*.article_number'=>'required|numeric',
        ];
    }
}
