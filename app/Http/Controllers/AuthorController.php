<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private Author $authors;
    /**
     * Display a listing of the resource.
     */

    function __construct(Author $authors){
        $this->authors = $authors;
    }

    public function index($slug, Request $request)
    {
        $keyword='';
        if($slug == null){
            return abort(404);
        }
        $author = $this->authors->whereSlug($slug)->first();
        $authorName = $author->name;
        
        if($request->get('keyword') != null){
            $keyword=$request->get('keyword');
            $books = $author->books()->where('title', 'LIKE', '%'.$keyword.'%')->paginate(8);
        }
        
        else{
            $books = $author->books()->paginate(8);
        }
        return view('authors.index', compact('books', 'slug', 'authorName', 'keyword'));
    }

    public function autocomplete(Request $request, $slug){
            $input = $request->keyword;
            
            if($input != null){
                $data = $this->authors->whereSlug($slug)->first()->books()->where('title', 'LIKE', '%'.$input.'%')->get();
            
            $output = '';

            foreach ($data as $row) {
                $output .= '<p style="cursor: pointer" class="ps-4 suggestion">'.$row->title.'</p>';
            }
            return $output;
            }
        }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
