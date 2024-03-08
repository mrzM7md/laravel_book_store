<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
     public function addToCart(Request $request)
     {
         $this->validate($request, [
            'quantity' => 'numeric',
      ]);
      
         $book = Book::find($request->id);
         $message = 'تمت إضافة المنتجات للسلة !!';
         $successPercent = 100;


            if($request->quantity >= 0){
               if(auth()->user()->booksInCart->contains($book)) { // if: this book already exsists in the cart => [if all quantity > found quantity then send warnning message then back !!, else: update it], other wise (new book to the cart) => add it !!
                  $newQuantity = $request->quantity + auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;
                  if($request->quantity == 0){
                     $message = 'الكتاب موجود بالفعل' ;
                     $successPercent = 100;
                  }
                  else if($newQuantity > $book->number_of_copies) {
                     $message = 'الكتاب موجود بالفعل والكمية المطلوبة أكثر من الكمية المتاحة' ;
                     $successPercent = 50;
                  } else {
                     auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies'=> $newQuantity]);
                  }
                     
               } else {
                  if($request->quantity > $book->number_of_copies and $request->quantity != 0){
                     $message = 'الكمية المطلوبة أكثر من الكمية المتاحة' ;
                     $successPercent = 0;
                  }
                  else
                     auth()->user()->booksInCart()->attach($request->id, ['number_of_copies'=> $request->quantity]);
               }
            }
         else{
               $message = 'أدخل قيمة صالحة';
               $successPercent = 0;
            }


      $num_of_produt = auth()->user()->booksInCart()->count();
      return response()->json([
                              'num_of_product' => $num_of_produt,
                              'message' => $message,
                              'successPercent' => $successPercent]); // return it to ajax !!

   }

   public function viewCart()
   {
       $items = auth()->user()->booksInCart;
       return view('cart', compact('items'));
   }

   
   public function removeAll(Book $book) {
      // $price = auth()->user()->booksInCart()->;

      $booksInCart = auth()->user()->booksInCart();
      // $thisBook = $booksInCart->whereBook_id($book->id)->first();
      
      $booksInCart->detach($book->id);
      $totalPrice = $booksInCart->pluck('price')->sum();
      $count = $booksInCart->pluck('price')->count();

      return Response::json([
         'message' => "تم الحذف",
         'bookTitleprice' => "المجموع النهائي: {$totalPrice}" ,
         'cartCount' => $count,
     ]);
  }
}
