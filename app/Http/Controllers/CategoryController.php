<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private Category $categories;
    /**
     * Display a listing of the resource.
     */

    function __construct(Category $categories){
        $this->categories = $categories;
    }

    public function index($slug, Request $request)
    {
        $keyword='';
        if($slug == null){
            return abort(404);
        }
        $category = $this->categories->whereSlug($slug)->first();
        $categoryName = $category->name;
        
        if($request->get('keyword') != null){
            $keyword=$request->get('keyword');
            $books = $category->books()->where('title', 'LIKE', '%'.$keyword.'%')->paginate(12);
        }
        
        else{
            $books = $category->books()->paginate(12);
        }
        return view('categories.index', compact('books', 'slug', 'categoryName', 'keyword'));
    }

    public function autocomplete(Request $request, $slug){
            $input = $request->keyword;
            
            if($input != null){
                $data = $this->categories->whereSlug($slug)->first()->books()->where('title', 'LIKE', '%'.$input.'%')->get();
            
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
