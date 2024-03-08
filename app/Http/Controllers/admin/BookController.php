<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BookRequest;
use App\Models\{Book, Category, Author, Image, Currency};
use App\Repositories\admin\book\RBook;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\ImageUploadTrait;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use ImageUploadTrait;

    private $books;
    private $rBooks;

    public function __construct(Book $books, RBook $rBooks)
    {
        $this->books = $books;
        $this->rBooks = $rBooks;
    }
    public function index($isBestBooks = false)
    {
        if (!$isBestBooks)
            $books = $this->rBooks->getAll();
        
        else{
            // return $this->rBooks->getAllBestBooks();
            $books = $this->rBooks->getAllBestBooks()->get();
        }
        return view('admin.books.index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::orderBy('name', 'desc')->get();
        $categories = Category::orderBy('name', 'desc')->get();
        $currencies = Currency::all();
        
        $book = new Book();
        return view('admin.books.create', compact('categories', 'authors', 'book', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $this->validate($request, [
            'isbn' => ['alpha_num', Rule::unique('books', 'isbn'), 'nullable'],
        ]);

        $this->rBooks->store($request);

        session()->flash('flash_message', $this->rBooks->successBookAddedMessage());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $book = $this->rBooks->getBookBySlug($slug);
        return view('admin.books.details', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $book = $this->rBooks->getBookBySlug($slug);
        $authors = Author::all();
        $categories = Category::all();
        $currencies = Currency::all();
        
        return view('admin.books.edit', compact('categories', 'authors', 'book', 'currencies'));
    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $this->rBooks->update($this, $request, $book);

        session()->flash('flash_message', $this->rBooks->successBookUpdatedMessage());

        return redirect(route('admin.books.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->rBooks->destroy($book);
        session()->flash('flash_message', $this->rBooks->successBookDeletedMessage());

        return redirect(route('admin.books.index'));
    }
}
