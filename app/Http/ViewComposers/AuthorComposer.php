<?php
namespace App\Http\ViewComposers;

use App\Models\Author;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class AuthorComposer
{
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function compose(View $view)
    { 
        $view->with('authors', $this->author::all());
        // $view->with('authors', $this->author::select('name', 'slug')->get());
    }
}