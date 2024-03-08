<?php
namespace App\Repositories\admin\book;

interface IBook {
    public function getAll();
    public function getAllBestBooks();

    public function store($request);
    public function successBookAddedMessage();
    public function successBookUpdatedMessage();
    public function successBookDeletedMessage();

    public function getBookBySlug($slug);
    public function getBookImagesByBookId($bookId);

    public function update($bookController, $request, $book);
}