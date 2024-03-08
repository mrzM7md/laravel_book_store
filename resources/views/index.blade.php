@extends('layouts.test')

@section('links')

@endsection

@section('content')
@auth
  @php
    $user = Auth::user();
  @endphp
@endauth

  @if (count($index_carousels) != 0)
  <section class="slider">
    <div id="carousel-views-images" class="carousel slide">
      <div class="carousel-indicators">
        @for ($i = 0; $i <=  $index_carousels->count(); $i++)
          @if ($i == 0)
            <button type="button" data-bs-target="#carousel-views-images" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide {{$i}}"></button>
          @else
            <button type="button" data-bs-target="#carousel-views-images" data-bs-slide-to="{{$i}}" aria-label="Slide {{$i}}"></button>
          @endif
        @endfor
      </div>

      <div class="carousel-inner">
        @foreach ($index_carousels as $carousel)      
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('storage/'. $carousel->carousels_photo_path) }}" class="d-block w-100" alt="...">
          </div>  
        @endforeach
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carousel-views-images" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carousel-views-images" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
{{-- 
    <div id="carouselExampleCaptions" class="carousel slide mt-5">
      <div class="carousel-indicators">
        @for ($i = 0; $i <=  $index_carousels->count(); $i++){
          <!-- start carousel-->
          <button type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide-to="{{$i}}" 
          @if ($i == 0)
              class="active" aria-current="true"
          @endif
           aria-label="Slide {{ $i+1 }}"></button>
        }
        @endfor
      </div>
        
      
      <div class="carousel-inner">
        @foreach ($index_carousels as $carousel)
            <div class="carousel-item active">
                <img src="{{ asset('storage/'. $carousel->carousels_photo_path) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                  @if ($loop->last)
        
                      <a href class="btn btn-warning"
                          style="    font-weight: bold;
                      font-size: 1.5rem;">تسوق الأن</a>
                  @endif
                  
              </div>
            </div>
         @endforeach
        </div>

          
          <button class="carousel-control-prev" type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
      <!-- End carousel -->
    </div> --}}
  @endif













  <!-- start products section -->
  <!-- Most dseller -->
<section id="most-seller" class="products-section w-100">
  <div class="text-center">
    <p class="mt-5 mb-1">الكتب الأكثر مبيعا</p>
    <a class="mb-4" href="{{ route('books-book.books', ['booksType'=>'bestBooks']) }}"><p>عرض الكل</p></a>
  </div>

  <div class="row w-100 m-0">
    
    <div id="arrow-scroll-end-most-aeller" class="col-1 arrow arrow-end p-0">
        <span class="material-symbols-outlined shadow-lg p-3 mb-5 bg-body rounded w-100 arrow-icon">arrow_forward_ios</span>
    </div>
    
    <div id="most-seller-products-cards" class="col-10 col-xl-12 products-cards">
      @foreach ($index_books_best_seller as $book)
        <?php $price = '' ?>
        @if ($book->price)
          @switch($book->currency_id)
              @case($book->y())
                <?php $price = $book->price . ' ر.ي'  ?>
              @break
              @case($book->sa())
                <?php $price = $book->price . ' ر.س' ?>
              @break
              @case($book->usd())
                <?php $price = $book->price . ' دولار' ?>
              @break
          @endswitch
        @else
          <?php $price = 'السعر غير محدد' ?>
        @endif

        @include('cards.book_card', ['title' => $book->title, 'price' => $price, 'image' => asset('storage/'.$book->cover_image), 'rate' => $book->rate()*20, 'slug' => $book->slug ])
      @endforeach
    </div>
    <div id="arrow-scroll-start-most-seller" class="col-1 arrow arrow-start p-0">
      <span class="material-symbols-outlined shadow-lg p-3 mb-5 bg-body rounded w-100 arrow-icon">arrow_back_ios</span>
    </div>

  </div>

  
  <!-- Most recent -->
  <div class="text-center">
    <p class="mt-5 mb-1">أحدث الكتب</p>
    <a class="mb-4" href="{{ route('books-book.books', ['booksType'=>'allBooks']) }}"><p>عرض الكل</p></a>
  </div>

  <div class="row w-100 m-0">
    
    <div id="arrow-scroll-end-most-aeller" class="col-1 arrow arrow-end p-0">
        <span class="material-symbols-outlined shadow-lg p-3 mb-5 bg-body rounded w-100 arrow-icon">arrow_forward_ios</span>
    </div>
    
    <div id="most-seller-products-cards" class="col-10 col-xl-12 products-cards">
      @forelse ($index_books as $book)
        <?php $price = '' ?>
        @if ($book->price)
          @switch($book->currency_id)
              @case($book->y())
                <?php $price = $book->price . ' ر.ي'  ?>
              @break
              @case($book->sa())
                <?php $price = $book->price . ' ر.س' ?>
              @break
              @case($book->usd())
                <?php $price = $book->price . ' دولار' ?>
              @break
          @endswitch
        @else
          <?php $price = 'السعر غير محدد' ?>
        @endif

        @include('cards.book_card', ['title' => $book->title, 'price' => $price, 'image' => asset('storage/'.$book->cover_image), 'rate' => $book->rate()*20, 'slug' => $book->slug ])
      @endforeach
    </div>
    <div id="arrow-scroll-start-most-seller" class="col-1 arrow arrow-start p-0">
      <span class="material-symbols-outlined shadow-lg p-3 mb-5 bg-body rounded w-100 arrow-icon">arrow_back_ios</span>
    </div>

  </div>


</section>

<!-- end products section -->
















      {{-- <div id="products" class="newes mt-5">
        <div class="container section">
            <div class="head-section">
                <h2 style="font-size: 1.2rem" class="main-title">الكتب الأكفر مبيعا</h2>
                <a href="{{ route('books-book.books', ['booksType'=>'bestBooks']) }}" class="see-more"><span>عرض الكل </span>
                <i class="fa-solid fa-angles-left"></i></a>
            </div>
            <div class="swiper">
                <div class="swiper-wrapper" style="align-items: flex-end;">


                  @forelse ($index_books_best_seller as $book)
                      <div  class="product-card card m-2  swiper-slide"
                          style="width: 18rem;">
                          <img src="{{ asset('storage/'.$book->cover_image  )}}" class="w-100" src="imgs/1.jpeg" alt="image">
                          <div class="bodyCard">
                            <a style="color: #face2f; list-style:disc" href="{{ route('books.show', $book->slug) }}"> <u>{{ Str::limit ($book->title, 26, '..')}}</u></a>
                              <span class="score">
                                <div class="score-wrap">
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

                              <h6 class="kind categories">
                                @foreach ($book->categories as $category)
                                  {!! $loop->first ? '' : '<b style="color: #face2f">-</b>' !!}
                                  <a style="color:#ccc; font-size: 0.9rem" href="{{ route('slug-categories.index', ['slug'=>$category->slug]) }}"> <u> {{ $category->name }} </u></a>
                                @endforeach
                              </h6>
                              <h6 class="kind">
                                @foreach ($book->authors as $author)
                                  {!! $loop->first ? '' : '<b style="color: #face2f">-</b>' !!}
                                  <a style="color:#b5ffdae0; font-size: 0.9rem" href="{{ route('slug-authors.index', ['slug'=>$author->slug]) }}"> <u> {{ $author->name }} </u></a>
                                @endforeach
                              </h6>

                            <div class="product-card-footer">
                                @if ($book->price)
                                @switch($book->currency_id)
                                    @case($book->y())
                                      <span style="font-size: 0.9rem" class="price">{{$book->price}}ر.ي</span>
                                        @break
                                    @case($book->sa())
                                      <span style="font-size: 0.9rem" class="price">{{$book->price}}ر.س</span>
                                        @break
                                    @case($book->usd())
                                      <span style="font-size: 0.9rem" class="price">{{$book->price}}دولار</span>
                                      @break
                                @endswitch
                                @else
                                    <span style="font-size: 0.9rem" class="price">السعر غير محدد</span>
    
                              @endif 
                              <div class="icon">
                                @auth
                                    <div>
                                      <form class="add-cart-form" action="{{ route('add.cart', ['slug' => $book->slug]) }}" method="POST">
                                        @csrf
                                        <input name="id" type="hidden" id="bookId" value="{{$book->id}}">
                                          <span class="text-muted mb-3"><input name="quantity" type="hidden" class="form-control d-inline mx-auto" id="quantity" value="0" style="width: 10%;"></span>
                                        <button type="submit" class="btn btn-sm btn-warning addCart  me-2"><i class="fa-solid fa-basket-shopping"></i></button>
                                      </form>                                      
                                    </div>
                                @else
                                <div>
                                  <a href="{{ route('register') }}">
                                      <input name="id" type="hidden" id="bookId" value="{{$book->id}}">
                                        <span class="text-muted mb-3"><input name="quantity" type="hidden" class="form-control d-inline mx-auto" id="quantity" value="0" style="width: 10%;"></span>
                                      <button type="submit" class="btn btn-sm btn-warning addCart me-2"><i class="fa-solid fa-basket-shopping"></i></button>
                                  </a>
                                </div>
                                @endauth
                                    
                                </div>
                            </div>
                              
                          </div>
                      </div>
                  @endforeach



                </div>
                <div class="swiper-button-next"
                    style="color: var(--main-color); left: 0;"></div>
                <div class="swiper-button-prev"
                    style="color: var(--main-color); right: 0"></div>
                <div class="swiper-pagination"
                    style="color: var(--main-color);"></div>
            </div>
        </div>
    </div>
     --}}
   
        {{-- <div id="products" class="newes">
          <div class="container section">
              <div class="head-section">
                  <h2 style="font-size: 1.2rem" class="main-title">الأحدث</h2>
                  <a href="{{ route('books-book.books', ['booksType'=>'allBooks']) }}" class="see-more"><span>عرض الكل </span><i
                          class="fa-solid fa-angles-left"></i></a>
              </div>
              <div class="swiper" style>
                  <div class="swiper-wrapper" style="align-items: flex-end;">


                    @forelse ($index_books as $book)
                      <div  class="product-card card m-2  swiper-slide"
                          style="width: 18rem;">
                          <img src="{{ asset('storage/'.$book->cover_image  )}}" class="w-100" src="imgs/1.jpeg" alt>
                          <div class="bodyCard ">
                            <a style="color: #face2f; list-style:disc" href="{{ route('books.show', $book->slug) }}"> <u>{{ Str::limit ($book->title, 26, '..')}}</u></a>

                              <span class="score">
                                <div class="score-wrap">
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

                            <h6 class="kind categories">
                              @foreach ($book->categories as $category)
                                {!! $loop->first ? '' : '<b style="color: #face2f">-</b>' !!}
                                <a style="color:#ccc; font-size: 0.9rem" href="{{ route('slug-categories.index', ['slug'=>$category->slug]) }}"> <u> {{ $category->name }} </u></a>
                              @endforeach
                            </h6>
                            <h6 class="kind">
                              @foreach ($book->authors as $author)
                                {!! $loop->first ? '' : '<b style="color: #face2f">-</b>' !!}
                                <a style="color:#b5ffdae0; font-size: 0.9rem" href="{{ route('slug-authors.index', ['slug'=>$author->slug]) }}"> <u> {{ $author->name }} </u></a>
                              @endforeach
                            </h6>

                            <div class="product-card-footer">
                              @if ($book->price)
                              @switch($book->currency_id)
                                  @case($book->y())
                                    <span style="font-size: 0.9rem" class="price">{{$book->price}}ر.ي</span>
                                      @break
                                  @case($book->sa())
                                    <span style="font-size: 0.9rem" class="price">{{$book->price}}ر.س</span>
                                      @break
                                  @case($book->usd())
                                    <span style="font-size: 0.9rem" class="price">{{$book->price}}دولار</span>
                                    @break
                              @endswitch
                              @else
                                  <span style="font-size: 0.9rem" class="price">السعر غير محدد</span>
  
                            @endif 
                            <div class="icon">
                              @auth

                              <div>
                                    <form class="add-cart-form" action="{{ route('add.cart', ['slug' => $book->slug]) }}" method="POST">
                                      @csrf
                                      <input name="id" type="hidden" id="bookId" value="{{$book->id}}">
                                        <span class="text-muted mb-3"><input name="quantity" type="hidden" class="form-control d-inline mx-auto" id="quantity" value="0" style="width: 10%;"></span>
                                      <button type="submit" class="btn btn-sm btn-warning addCart me-2"><i class="fa-solid fa-basket-shopping"></i></button>
                                    </form>                                      
                                  </div>

                                  @else
                              <div>
                                <a href="{{ route('register') }}">
                                    <input name="id" type="hidden" id="bookId" value="{{$book->id}}">
                                      <span class="text-muted mb-3"><input name="quantity" type="hidden" class="form-control d-inline mx-auto" id="quantity" value="0" style="width: 10%;"></span>
                                    <button type="submit" class="btn btn-sm btn-warning addCart   me-2"><i class="fa-solid fa-basket-shopping"></i></button>
                                </a>
                              </div>
                              @endauth
                                  
                              </div>
                          </div>
                              
                          </div>
                      </div>

                      @endforeach



                  </div>
                  <div class="swiper-button-next"
                      style="color: var(--main-color); left: 0;"></div>
                  <div class="swiper-button-prev"
                      style="color: var(--main-color); right: 0"></div>
                  <div class="swiper-pagination"
                      style="color: var(--main-color);"></div>
              </div>
          </div>
      </div>

    <section style="color: #c5c6c5; background-color: whitesmoke;" id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
            <img width="100%" src="{{ asset('storage/images/webinfo/webImage.png') }}" alt="">
            </div>
          </div>

          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <h2 class="about-web" style="font-size: 1.2rem; line-height: 1.6;"> {!! $webinfo->about !!}</h2>
            </div>
          </div>
        </div>

      </div>
    </section> --}}

@endsection

