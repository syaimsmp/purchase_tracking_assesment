<?php

namespace App\Imports;

use App\Models\UserImport;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UserImport([
            'mobile_no' => $row[0],
            'text1' => $row[1],
            'amount' => $row[2],
            'text2' => $row[3],
        ]);
    }
}
