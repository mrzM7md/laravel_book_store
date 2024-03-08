<?php

namespace App\Repositories\admin\admin;

interface IAdmin {
    public function getNumberOfBooks();
    public function getNumberOfBestBooks();
    public function getNumberOfCategories();
    public function getNumberOfAuthors();
    public function getNumberOfUsers();
    public function getNumberOfAdmins();
    public function getNumberOfSuperAdmins();
}