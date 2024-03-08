@extends('layouts.main') 
@section('content')

<section class="search-section text-center mb-4 row mx-auto">
    <div class="mb-2">البحث</div>
    <div class="serach-box text-center shadow p-2 my-1 bg-body rounded">    
        <form action="{{ route('categories.search', ['slug' => $slug]) }}" method="GET" class="text-center col-12 row" role="search">
            @include('share.formsContents.categories-authors-all-search', ['keyword' => $keyword])
        </form>

        <div id="suggestions" id="results" class="col-12 text-start  mt-2 results shadow">
        </div>
    </div>
</section>


<section class="all-products-view">
    <div class="text-center">
      <h2>الكتب التابعة لتصنيف {{$categoryName}}</h2>
      @if ($keyword)
        <p>عرض نتائج البحث حول كلمة <span>{{$keyword}}</span></p>
      @endif
    </div>

    @php $autocompleteRoute = route('categories.autocomplete', ['slug' => $slug]) @endphp
    @include('share.categories-authors-all-items', ['books'=>$books, 'autocompleteRoute'=>$autocompleteRoute])
</section>
@endsection
