<?php

namespace App\Exports;

use App\Models\Publisher;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PublisherExport implements FromQuery
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
        return Publisher::query()->where('pub_name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('pub_desc', 'LIKE', '%' . $this->search . '%')
            ->orWhere('updated_at', 'LIKE', '%' . $this->search . '%');
    }

}
