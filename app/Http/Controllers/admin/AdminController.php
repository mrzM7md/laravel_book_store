<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\{Book, Category, Author, User};
use App\Repositories\admin\admin\IAdmin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $admin;
    public function __construct(IAdmin $admin)
    {
        $this->admin = $admin;
    }

    public function index() {
        $number_of_books = $this->admin->getNumberOfBooks();
        $number_of_best_books = $this->admin->getNumberOfBestBooks() ;
        $number_of_categories = $this->admin->getNumberOfCategories();
        $number_of_authors = $this->admin->getNumberOfAuthors();
        $number_of_users = $this->admin->getNumberOfUsers();
        $number_of_admins = $this->admin->getNumberOfAdmins();
        $number_of_super_admins = $this->admin->getNumberOfSuperAdmins();
        return view('admin.index', compact('number_of_books', 'number_of_best_books', 'number_of_categories', 'number_of_authors', 'number_of_users', 'number_of_admins', 'number_of_super_admins'));
    }
}

