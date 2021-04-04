<?php

namespace App\Imports;

use App\model\Regulations;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegulationsImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Regulations([
            'article_text_status_ar'     => $row['article_text_status_ar'],
            'article_text_status_en'    => $row['article_text_status_en'],
            'search_keyword_ar' => $row['search_keyword_ar'],
            'search_keyword_en' => $row['search_keyword_en'],
            'regulation_type_ar' => $row['regulation_type_ar'],
            'regulation_type_en' => $row['regulation_type_en'],
            'regulation_name_ar' => $row['regulation_name_ar'],
            'regulation_name_en' => $row['regulation_name_en'],
            'article_text_ar' => $row['article_text_ar'],
            'article_text_en' => $row['article_text_en'],
            'regulation_year' => $row['regulation_year'],
            'regulation_number' => $row['regulation_number'],
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
            '*.regulation_type_ar'=>'required|string',
            '*.regulation_type_en'=>'required|string',
            '*.regulation_name_ar'=>'required|string',
            '*.regulation_name_ar'=>'required|string',
            '*.regulation_name_en'=>'required|string',
            '*.article_text_ar'=>'required|string',
            '*.article_text_en'=>'required|string',
            '*.regulation_year'=>'required|numeric',
            '*.regulation_number'=>'required|numeric',
            '*.article_number'=>'required|numeric',
        ];
    }
}
