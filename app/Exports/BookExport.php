<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class BookExport implements FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($title, $cate)
    {
        $this->title = $title;
        $this->cate = $cate;
    }

    public function query()
    {
        return Book::query()->title($this->title)->cate($this->cate);
    }
}
