@section('scripts')    
    <script>
        $(function(){
            $('#keyword').on('keyup', function(){
                var keyword = $(this).val();
                console.log(keyword);
                $('#suggestions').fadeIn();
                $.ajax({
                    url: '{{$autocompleteRoute}}',
                    method: "GET",
                    data: { 
                        "keyword": keyword,
                    }
                }).done(function(data){
                    // alert(data);
                    $('#suggestions').html(data);
                });
            });
                $('#suggestions').on('click', 'p', function(){
                    $('#keyword').val($(this).text());
                    $('#suggestions').fadeOut();
                })
            });
    </script>
@endsection

@auth
  @php
    $user = Auth::user();
  @endphp
@endauth

<div class="w-100 all-products-view-cards">

@foreach ($books as $book)
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
    <!-- Pagination -->
    <div>
        <ul class="pagination justify-content-center mb-4">
            {{ $books->links() }}
        </ul>
    </div>

      