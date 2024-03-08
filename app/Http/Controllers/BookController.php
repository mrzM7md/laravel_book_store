<?php

namespace App\Http\Controllers;

use App\Models\ {Book, Carousel, Category, Rating};
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as JsonResponse;

class BookController extends Controller
{
    private Book $books;
    /**
     * Display a listing of the resource.
     */

    function __construct(Book $books){
        $this->books = $books;
    }

    public function index()
    {                
        $index_books = $this->books::latest()->take(6)->get (); // lastest 6
        $index_books_best_seller = $this->books::whereBest_seller(1)->latest()->take(6)->get() ; // lastest 6
        $index_carousels = Carousel::select('carousels_photo_path')->get();
        
        return view('index', compact('index_books', 'index_books_best_seller', 'index_carousels'));
    }

    
    public function books($booksType, Request $request)
    {
        $keyword='';
        $books = '';
        $BEST_SELLER_TRUE = 1;
        $COUNT_PAGINATE = 10;

        if($booksType == 'bestBooks'){
            if($request->get('keyword') != null){
                $books = $this->books::whereBest_seller($BEST_SELLER_TRUE);
                $keyword = $request->get('keyword');
                $books = $books->where('title', 'LIKE', '%'.$keyword.'%')->paginate($COUNT_PAGINATE);
            }
            else
                $books = $this->books::whereBest_seller($BEST_SELLER_TRUE)->paginate($COUNT_PAGINATE);
            $booksTypeStatment = 'الكتب الأعلى مبيعا';
        }
        else{
            if($request->get('keyword') != null){
                $books = $this->books;
                $keyword = $request->get('keyword');
                $books = $books::where('title', 'LIKE', '%'.$keyword.'%')->paginate($COUNT_PAGINATE);
            }
            else $books = $this->books::paginate($COUNT_PAGINATE);
            $booksTypeStatment = 'جميع الكتب من الأحدث';
        }
        


        return view('books.index', compact('books', 'booksType', 'booksTypeStatment', 'keyword'));
    }

    public function rate(Request $request, $slug){
        try{
            $book = $this->books::whereSlug($slug)->first();
            if(auth()->user()->isRatedThisBook($book)) { // if the user already rated this book before, then put new rating instead..
                $rating = Rating::where(['user_id' => auth()->user()->id, 'book_id' => $book->id])->first();
                $rating->value = $request->value;
                $rating->save();
            } else { // other wise add new rating..
                $rating = new Rating;
                $rating->user_id = auth()->user()->id;
                $rating->book_id = $book->id;
                $rating->value = $request->value;
                $rating->save();
            }
            return JsonResponse::json([
                'number_of_raters' => $book->ratings()->count(),
                'users_rate' => $book->rate()*20
            ]);
        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }


    public function autocomplete(Request $request, $booksType){
        $books = '';
        $output = '';
        $input = $request->keyword;

        if($input != null){
            if($booksType == 'allBooks'){
                $books = $this->books::select('title');
            }
            else{
                $books = $this->books::select('title')->whereBest_seller(1);
            }
            
            $data = $books->where('title', 'LIKE', '%'.$input.'%')->get();

            foreach ($data as $row) {
                $output .= '<p style="cursor: pointer" class="ps-4 suggestion">'.$row->title.'</p>';
            }
        }

        return $output;
        }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($slug)
    {
        $book = $this->books->whereSlug($slug)->first();
        return view('books.details', compact('book'));
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
