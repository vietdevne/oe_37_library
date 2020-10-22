<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class UserExport implements FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($fullname, $role)
    {
        $this->fullname = $fullname;
        $this->role = $role;
    }

    public function query()
    {
        return User::query()->fullname($this->fullname)->role($this->role);
    }
}
