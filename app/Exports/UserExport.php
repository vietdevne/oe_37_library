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
    public function __construct($search)
    {
        $this->search = $search;
    }

    public function query()
    {
        return User::query()->where('fullname', 'LIKE', '%' . $this->search . '%')
            ->orWhere('role', 'LIKE', '%' . $this->search . '%');
    }
}
