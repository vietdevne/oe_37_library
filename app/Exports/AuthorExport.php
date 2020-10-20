<?php

namespace App\Exports;

use App\Models\Author;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class AuthorExport implements FromQuery
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
        return Author::query()->where('author_name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('author_desc', 'LIKE', '%' . $this->search . '%')
            ->orWhere('updated_at', 'LIKE', '%' . $this->search . '%'); 
    }

}
