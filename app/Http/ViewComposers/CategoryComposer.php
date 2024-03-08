<?php
namespace App\Http\ViewComposers;

use App\Models\Category;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class CategoryComposer
{
    private $categories;

    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }

    public function compose(View $view)
    { 
        $view->with('categories', $this->categories::all());
    }
}