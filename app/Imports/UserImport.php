<?php

namespace App\Imports;

use App\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => Hash::make($row['password']),
            'mobile' => $row['mobile'],
            'member_type' => $row['member_type'],
            'company' => $row['company'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=>'required',
            '*.email'=>'required|email|unique:users',
            '*.password'=>'required|min:6',
            '*.mobile'=>'required|numeric',
            '*.member_type'=>'required|in:gold,silver,Platinum',
            '*.company'=>'required|string',
        ];
    }
}
