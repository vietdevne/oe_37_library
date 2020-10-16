<?php

namespace App\Libraries\ViewComposers;

use Illuminate\View\View;
use App\Models\Entities\CategoryEntity;
use App\Repositories\RepositoryInterface\CategoryRepositoryInterface;

class CategoryComposer
{
    protected $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        // Dependencies automatically resolved by service container...
        $this->category = $category;
    }
    
    public function compose(View $view)
    { 
        $allCategory = $this->category->getAllNoPagination();
        $view->with('allCategory', $allCategory);
    }
}
