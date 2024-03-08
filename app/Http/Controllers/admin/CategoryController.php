<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller {
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->user_id = auth()->user()->id;
        $category->save();
    
        session()->flash('flash_message',  'تمت إضافة الصنف بنجاح');
    
        return redirect(route('admin.categories.index'));

        // return Response::json([
        //     'name' => $request->name ,
        //     'id' => "تم تحديث اسم الصنف بنجاح"
        // ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->user_id = auth()->user()->id;
        $category->save();
        
        return Response::json([
            'name' => $request->name ,
            'message' => "تم تحديث اسم الصنف بنجاح"
        ]);
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return;
    }


}