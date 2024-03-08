@extends('layouts.main')
@section('links')
  {{-- <link href= {{ asset('storage/assets/css/bookStoreStyle.css') }}   rel="stylesheet"> --}}
  
  <style>

  </style>
@endsection
@section('content')
<div class="container" style="margin-top: 100px !important">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">عرض تفاصيل الكتاب</div>

                <div class="card-body">
                    <table class="table table-stribed">
                        @auth
                            <div class="form {{-- for cart ajax --}} text-center mb-2">
                                <input type="hidden" id="bookId" value="{{$book->id}}">
                                    @if ($book->number_of_copies)
                                        <span class="text-muted mb-3"><input type="number" class="form-control d-inline mx-auto" id="quantity" value="1" min="1" max="{{$book->number_of_copies}}" style="width: 10%;" required></span>
                                    @else
                                        <span class="text-muted mb-3"><input type="hidden" class="form-control d-inline mx-auto" id="quantity" value="0" style="width: 10%;"></span>
                                    @endif
                                    <button type="submit" class="btn bg-cart addCart {{-- for cart ajax --}}  me-2"><i class="fa fa-cart-plus"></i>أضف للسلة</button>
                            </div>
                        @endauth
                        <tr>
                            <th>العنوان</th>
                            <td class="lead"><b class="title">{{ $book->title }}</b></td>
                        </tr>

                        <tr>
                            <th>تقييم المستخدمين</th>
                            <td>
                                <span class="score">
                                    <div id="all_ratings" class="score-wrap">
                                        <span class="stars-active" style="width: {{ $book->rate()*20 }}%">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                        
                                        <span class="stars-inactive">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </span>
                                <span id="number_of_raters">
                                    @switch($book->ratings()->count())
                                        @case(1)
                                             مستخدم واحد فقط قام بالتقييم
                                            @break
                                        @case(2)
                                             شخصان اثنان قاما بالتقييم
                                            @break
                                        @default
                                             عدد المقيّمين {{ $book->ratings()->count()}} مستخدم
                                        @endswitch
                                </span>
                            </td>
                        </tr>

                        @if ($book->isbn)
                            <tr>
                                <th>الرقم التسلسلي</th>
                                <td>{{ $book->isbn }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>صورة الغلاف</th>
                            <td><img class="img-fluid img-thumbnail cover-image" src="{{ asset('storage/' . $book->cover_image) }}"></td>
                        </tr>
                        
                        @if (count($book->images) > 0)
                            <tr>
                                <th>لقطات من المنتج</th>
                                <td>
                                    @foreach ($book->images as $image)
                                        <img class="img-fluid img-thumbnail" src="{{ asset('storage/' . $image->book_photo_path) }}">
                                    @endforeach
                                </td>
                            </tr>
                        
                        @endif
                       
                        @if (count($book->categories) > 0)
                        <tr>
                            <th>التصنيف</th>
                            <td>
                            @foreach ($book->categories as $category)
                                <a href="{{ route('slug-categories.index', ['slug'=>$category->slug]) }}" class="btn btn-success ml-2 mb-2">{{ $category->name }}</a>
                            @endforeach
                            </td>
                        </tr>
                        @endif
                        
                        @if (count($book->authors) > 0)
                        <tr>
                            <th>الكاتب</th>
                            <td>
                            @foreach ($book->authors as $author)
                                <a href="{{ route('slug-authors.index', ['slug'=>$author->slug]) }}" class="btn btn-secondary ml-2 mb-2">{{ $author->name }}</a>
                            @endforeach
                            </td>
                        </tr>
                        @endif


                        @if ($book->description)
                            <tr>
                                <th>الوصف</th>
                                <td class="description">{!! $book->description !!}</td>
                            </tr>
                        @else
                        <tr style="display: none">
                            <th>الوصف</th>
                            <td class="description">{!! $book->description !!}</td>
                        </tr>
                        @endif
                        @if ($book->publish_year)
                            <tr>
                                <th>سنة النشر</th>
                                <td>{{ $book->publish_year }}</td>
                            </tr>
                        @endif
                        @if ($book->number_of_pages)
                            <tr>
                                <th>عدد الصفحات</th>
                                <td>{{ $book->number_of_pages }}</td>
                            </tr>
                        @endif
                       
                        @if ($book->number_of_copies)
                            <tr>
                                <th>عدد النسخ</th>
                                <td>{{ $book->number_of_copies }}</td>
                            </tr>
                        @endif
                        
                        @if ($book->price)
                        <tr>
                            <th>السعر</th>
                            @switch($book->currency_id)
                                @case($book->y())
                                <td>{{$book->price}}ر.ي</td>
                                    @break
                                @case($book->sa())
                                    <td>{{$book->price}}ر.س</td>
                                    @break
                                @case($book->usd())
                                    <td>{{$book->price}}دولار</td>
                                    @break
                            @endswitch
                        </tr>
                        @endif

      
                        <tr>
                            {{-- <th>شارك هذا المنتج مع أصجقائك !</th> --}}
                            <td>
                                <ul class="d-flex mt-2 list-unstyled gap-1">
                                    <li>
                                        <button id="copy-button" style="border: none; background-color: transparent" class="d-block text-light"><i style="color: black" class="fa-solid fa-copy fa-sm copy rounded-circle p-2"></i></button>
                                    </li>
                                    @if ($webinfo->whatsapp_number)
                                       <li>
                                        {{-- <button id="copy-button" style="border: none; background-color: transparent" class="d-block text-light"><i style="color: black" class="fa-solid fa-copy fa-sm copy rounded-circle p-2"></i></button> --}}
                                          <button id="whatsapp-share-button" style="border: none; background-color: transparent; padding: 0" class="d-block text-light"><i class="fa-brands fa-whatsapp fa-sm whatsapp rounded-circle p-2"></i></button>
                                       </li>
                                    @endif
                                    @if ($webinfo->facebook_url)
                                       <li>
                                          <button id="facebook-share-button" style="border: none; background-color: transparent; padding: 0" class="d-block text-light"><i class="fa-brands fa-facebook fa-sm facebook rounded-circle p-2"></i></button>
                                       </li>
                                    @endif
                                    @if ($webinfo->telegram_group_url)
                                       <li>
                                          <button id="telegram-share-button" style="border: none; background-color: transparent; padding: 0" class="d-block text-light" ><i class="fa-brands fa-telegram fa-sm telegram rounded-circle p-2"></i></button>
                                       </li>
                                    @endif
                                    @if ($webinfo->insta_url)
                                       <li>
                                          <button id="instagram-share-button" style="border: none; background-color: transparent; padding: 0" class="d-block text-light" ><i class="fa-brands fa-instagram fa-sm instagram rounded-circle p-2"></i></button>
                                       </li>
                                    @endif
                                
                                 </ul>
                           
                            </td>
                        </tr>

                    </table>
                    
                    @auth
                        <h4>قيّم هذا الكتاب<h4>
                        {{-- @if ($bookfind) --}}
                        <div id="my_first_rating" class="rating"></div>
                            @if(auth()->user()->isRatedThisBook($book))
                                <div id="my_rating" class="rating">
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 5 ? 'checked' : '' }}" data-value="5"></span>
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 4 ? 'checked' : '' }}" data-value="4"></span>
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 3 ? 'checked' : '' }}" data-value="3"></span>
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 2 ? 'checked' : '' }}" data-value="2"></span>
                                    <span class="rating-star {{ auth()->user()->bookRating($book)->value == 1 ? 'checked' : '' }}" data-value="1"></span>
                                </div>
                            @else
                                <div id="gray-starts" class="rating">
                                    <span class="rating-star" data-value="5"></span>
                                    <span class="rating-star" data-value="4"></span>
                                    <span class="rating-star" data-value="3"></span>
                                    <span class="rating-star" data-value="2"></span>
                                    <span class="rating-star" data-value="1"></span>
                                </div>
                            @endif
                        
                        {{-- @else
                        
                        @endif --}}
                    
                        @if (request()->is('01010-admin-01010*'))
                        <div>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.books.edit', $book->slug) }}"><i class="fa fa-edit"></i> تعديل</a>
                            <form class="d-inline-block" method="POST" action="{{ route('admin.books.destroy', $book) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')"><i class="fa fa-trash"></i> حذف</button> 
                            </form>
                        </div>    
                        
                    
                        @endif
                    
                    @else
                        <div class="alert alert-warning" role="alert">
                            يجب <a style="font-size: 1rem" href="{{ route('login') }}">تسجيل الدخول</a> لتستطيع تقييم الكتاب !!
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script>
    const post = {
    coverImage: document.querySelector(".cover-image").src,
    title: document.querySelector(".title").textContent,
    description: document.querySelector(".description").textContent,
  };

  const message = `${post.coverImage} \n \n عنوان الكتاب \n ${post.title} \n - عن الكتاب \n${post.description} \n \n \nشاهد المزيد في موقعنا !! \n \n {{ route('books.show', $book->slug) }}`

  document.querySelector('#whatsapp-share-button').addEventListener('click', () => {
    // Get the name and description elements

    // Share the post on Instagram
    const whatsappkUrl = `https://wa.me/?text=${message}`;
    window.open(whatsappkUrl, "_blank");
});


    document.querySelector('#telegram-share-button').addEventListener('click', () => {
    // Get the name and description elements

    // Share the post on Instagram
    const telegramkUrl = `https://t.me/share/url?url=${message}`;
    window.open(telegramkUrl, "_blank");
});


    document.querySelector('#facebook-share-button').addEventListener('click', () => {
    // Get the name and description elements

    // Share the post on Instagram
    const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${message}`;
    window.open(facebookUrl, "_blank");
});

document.querySelector('#instagram-share-button').addEventListener('click', () => {
    // Get the name and description elements

    // Share the post on Instagram
    const instagramUrl = `https://www.instagram.com/share.php?u=${message}`;
    window.open(instagramUrl, "_blank");
});


</script>

<script>
    // Add an event listener to the button
    document.querySelector('#copy-button').addEventListener('click', () => {
    // Get the name and description elements
    const title = document.querySelector('.title');
    const description = document.querySelector('.description');

    // Copy the text to the clipboard
    navigator.clipboard.writeText(`${post.coverImage} \n\n عنوان الكتاب\n${title.textContent}\n - عن الكتاب \n${description.textContent}\nشاهد المزيد في موقعنا !! \n {{ route('books.show', $book->slug) }}`);

    // Display a message to the user
    document.getElementById("alert-success").style.visibility = "visible";
    $("#alert-success-text").text ('تم النسخ');
    setTimeout(() => {
        document.getElementById("alert-success").style.visibility = "hidden";
    }, 1000);
});
</script>





  <script>
    $(document).on('click', '.rating-star', function() {
        var token = "{{ Session::token() }}";
        var submitStars = $(this).attr('data-value');

        $.ajax({
            method: 'POST',
            url: "{{ route('book.rate', [ 'slug' => $book->slug ] ) }}",
            data: {
                '_token': token,
                'value' : submitStars
            },
            success: function(response) {
                // alert('Success');
                // location.reload();
                var user_rate_value = submitStars;
                var users_rate = response.users_rate;
                var number_of_raters = response.number_of_raters;

                var my_rating = `
                    <span class="rating-star ${(user_rate_value == 5) ? 'checked' : ''} " data-value="5"></span>
                    <span class="rating-star ${(user_rate_value == 4) ? 'checked' : ''} " data-value="4"></span>
                    <span class="rating-star ${(user_rate_value == 3) ? 'checked' : ''} " data-value="3"></span>
                    <span class="rating-star ${(user_rate_value == 2) ? 'checked' : ''} " data-value="2"></span>
                    <span class="rating-star ${(user_rate_value == 1) ? 'checked' : ''} " data-value="1"></span>
                     `;
                
                '@auth'
                    if( '{{auth()->user()->isRatedThisBook($book) == false }}'  ){
                        document.getElementById("gray-starts").style.display = "none";
                        $('#my_first_rating').html(my_rating);
                    }
                    else
                        $('#my_rating').html(my_rating);
                '@endauth'
                raters_num = `عدد المقيّمين ${number_of_raters} مستخدم`;
                if(number_of_raters == 1){
                    raters_num = 'أنت الشخص الوحيد الذي قام بالنقييم، شكرا لك !!';
                }
                else if (number_of_raters == 2){
                    raters_num = 'شخصان اثنان قاما بالتقييم';
                }
                else {
                    raters_num = `عدد المقيّمين ${number_of_raters} مستخدم`;
                }
                $('#number_of_raters').html(raters_num);

                var all_ratings = `
                    <span class="stars-active" style="width: ${users_rate}%">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </span>
                    
                    <span class="stars-inactive">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </span>
                `;
                $('#all_ratings').html(all_ratings);
                document.getElementById("alert-success").style.visibility = "visible";
                
                $("#alert-success-text").text('تمت عملية التقييم بنجاح');
                    
                setTimeout(() => {
                    document.getElementById("alert-success").style.visibility = "hidden";
                }, 2000);

            },
            error: function() {
                // alert('error');
                document.getElementById("alert-fail").style.visibility = "visible";
                $("#alert-fail-text").text('حدث خطأ ما');
                setTimeout(() => {
                    document.getElementById("alert-fail").style.visibility = "hidden";
                }, 2000);
            },

        });
    });
</script>

{{-- <script src="{{ asset('stograge/scripts/toaster.js') }}"></script> --}}
<script>
    $('.addCart').on('click', function(event){
        var token = "{{ Session::token() }}";
        var url = "{{ route('add.cart', ['slug' => $book->slug]) }}";

        event.preventDefault(); // prevent page to return up !!

        // var bookId = $(this).parents(".form").find("#bookId").val();
        var quantity = $(this).parents(".form").find("#quantity").val();

        $.ajax({
            method: 'POST',
            url: url,
            data: {
                quantity: quantity,
                 id: '{{$book->id}}',
                _token: token
            },
            success : function(response){
                if(response.successPercent == 0){
                    document.getElementById("alert-fail").style.visibility = "visible";
                    $("#alert-fail-text").text (response.message);
                    

                setTimeout(() => {
                    document.getElementById("alert-fail").style.visibility = "hidden";
                }, 2000);

                    // toastr.error(response.message);
                }
                else if(response.successPercent == 50){
                    
                    document.getElementById("alert-warning").style.visibility = "visible";
                    $("#alert-warning-text").text(response.message);
                    $(".my-cart").text(response.num_of_product);
                    
                setTimeout(() => {
                    document.getElementById("alert-warning").style.visibility = "hidden";
                }, 2000);

                }
                else{
                    document.getElementById("alert-success").style.visibility = "visible";
                    $("#alert-success-text").text(response.message);
                    $(".my-cart").text(response.num_of_product);
                    
                setTimeout(() => {
                    document.getElementById("alert-success").style.visibility = "hidden";
                }, 2000);
                }
                
            },
            error : function(erroe){
                
                // toastr.error('');
                document.getElementById("alert-fail").style.visibility = "visible";
                $("#alert-fail-text").text ("حدث خطأ ما !");
                setTimeout(() => {
                    document.getElementById("alert-fail").style.visibility = "hidden";
                }, 2000);
            }
    });

});
</script>


@endsection
