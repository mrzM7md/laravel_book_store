<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\Response;

class AuthorController  extends Controller {
    public function index(){
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        // $this->validate($request, ['name' => 'required']);
        $author = new Author;
        $author->name = $request->name;
        $author->user_id = auth()->user()->id;
        $author->save();
    
        session()->flash('flash_message',  'تمت إضافة المؤلف بنجاح');
    
        return redirect(route('admin.authors.index'));

        // return Response::json([
        //     'name' => $request->name ,
        //     'id' => "تم تحديث اسم المؤلف بنجاح"
        // ]);
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author->name = $request->name;
        $author->user_id = auth()->user()->id;
        $author->save();
        
        return Response::json([
            'name' => $request->name ,
            'message' => "تم تحديث اسم المؤلف بنجاح"
        ]);
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return;
    }


}