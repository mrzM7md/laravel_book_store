<?php

namespace App\Repositories\admin\admin;

use App\Models\{Book, Category, Author, User};
use App\Repositories\admin\admin\IAdmin;

class RAdmin implements IAdmin {
    private $BEST_SELLER = 1;
    public function getNumberOfBestBooks()
    {
        return Book::whereBest_seller($this->BEST_SELLER)->count();
    }
    public function getNumberOfBooks()
    {
        return Book::count();
    }

    public function getNumberOfCategories()
    {
        return Category::count();
    }

    public function getNumberOfAuthors()
    {
        return Author::count();
    }

    
    public function getNumberOfUsers()
    {
        return User::count();
    }

    public function getNumberOfAdmins()
    {
        return  User::where('administration_level', 1)->count();
    }

    public function getNumberOfSuperAdmins()
    {
        return  User::where('administration_level', 0)->count();
    }

    
}