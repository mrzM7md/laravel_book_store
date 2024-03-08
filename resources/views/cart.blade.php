@extends('layouts.main')

@section('content')
    <div style="margin-top: 100px !important;" class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">عربة التسوق</div>
                    <div class="card-body">
                        @if ($items->count())
                            <table id="table" class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">العنوان</th>
                                        <th scope="col">السعر</th>
                                        <th scope="col">الكمية</th>
                                        <th scope="col">السعر الكلي</th>
                                        <th scope="col"></th>
                                    </tr>
                                    
                                </thead>
                                @php($totalPrice = 0)
                                @php($askParagrahp = '')

                               @foreach ($items as $item)
                                @if ($item->pivot->number_of_copies == 0)
                                    <?php $item->pivot->number_of_copies = 1 ?>                                   
                                @endif
                                    @php($totalPrice += $item->price * $item->pivot->number_of_copies)
                                    <tbody>
                                        <tr>
                                            <td scope="row"><a href="{{ route('books.show', $item->slug) }}"><u>{{ $item->title }}</u></a> </td>

                                            {{-- <td scope="row"> <a class="btn btn-warning" href="{{ route('books.show', $item->slug) }}">{{ $item->title }}</a> </td> --}}
                                            <td> {{ $item->price ?? 'غير محدد' }} </td>                              
                                            <td> {{ $item->pivot->number_of_copies }} </td>
                                            <td> {{ $item->price * $item->pivot->number_of_copies }} </td>
                                            <td style="display: none">
                                                {{ route('books.show', $item->slug) }}
                                            </td>
                                            <td>
                                                <form class="delete-cart-form" style="float: left; margin: auto 5px" method="POST" action="{{route('cart.remove_all', $item->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('هل أنت متأكد؟')" class="btn btn-danger btn-sm" type="submit"> حذف </button>
                                                </form>

                                                {{-- <form style="float: left; margin: auto 5px" method="POST" action="{{route('cart.remove_one', $item->id)}}">
                                                    @csrf
                                                    <button class="btn btn-warning btn-sm" type="submit">أزل واحدا</button>
                                                </form> --}}
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <h4 id="total-price" class="mb-5"> المجموع النهائي : {{$totalPrice}}</h4>
                            @if ($webinfo->whatsapp_number)
                                <button id="ask-via-whatsapp" class="btn btn-sm btn-success"> اطلب عبر وتساب </button>
                            @endif
                            <button id="copy-cart" class="btn btn-sm btn-secondary">نسخ محتوى عربة التسوق</button>

                        
                        @else
                            <div class="alert-alert-info text-center">
                                لا توجد كتب في العربة
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    function cartDataContent(){
        
        $table = document.getElementById("table");

        var tbodies = table.querySelectorAll("tbody");

        var data = [];

        for (var i = 0; i < tbodies.length; i++) {

            var dataRow = [];
            var tr = tbodies[i].querySelector("tr");
                    
            dataRow.push('عنوان الكتاب: ' + tr.querySelector("td:nth-child(1)").innerText + '\n');

            dataRow.push('السعر: ' + tr.querySelector("td:nth-child(2)").innerText + '\n');

            dataRow.push('الكمية: ' + tr.querySelector("td:nth-child(3)").innerText + '\n');

            // Add the total price of the book.
            dataRow.push('السعر الكلي: ' + tr.querySelector("td:nth-child(4)").innerText + '\n');

            dataRow.push(tr.querySelector("td:nth-child(5)").innerText  + '\n\n');        
            // Add the row data to the array.
            data.push(dataRow);
            }

            data.push(document.getElementById("total-price").innerText );

            return data;

        }

    $(document).on('click', '#copy-cart', function() {
    
    navigator.clipboard.writeText(cartDataContent());
    
    document.getElementById("alert-success").style.visibility = "visible";
            $("#alert-success-text").text('تم نسخ محتوى العربة بنجاح');
            setTimeout(() => {
                document.getElementById("alert-success").style.visibility = "hidden";
            }, 2000);
            
    });
    
    $(document).on('click', '#ask-via-whatsapp', function() {
        var whatsappNumber = {{ $webinfo->whatsapp_number }};
        window.open("https://wa.me/" + whatsappNumber + "?text=" + cartDataContent(), "_blank");
        window.open(whatsappkUrl, "_blank");
     });
</script>

<script>
    $('.delete-cart-form').on('submit', function(e) {
    
    e.preventDefault();
    
    var token = "{{ Session::token() }}";
    var thisForm = this;

    $.ajax({
        url: $(this).attr('action'),
        // type: 'POST'
        method: 'DELETE',
        token: token,
        data:$(this).serialize(),
        success: function(response) {
            thisForm.parentNode.parentNode.parentNode.remove();
            // thisForm.parentNode.parentNode.style.visibility = "hidden";
            $(".my-cart").text(parseInt($(".my-cart").text()) - 1);
            $("#total-price").text(`${response.bookTitleprice}`);
           
            if(response.cartCount == 0){
                $('.card-body').html(
                    `
                    <div class="alert-alert-info text-center">
                        لا توجد كتب في العربة
                    </div>  
                    `                             
                 );
            document.getElementById("total-price").style.visibility = "hidden";
            }

            document.getElementById("alert-success").style.visibility = "visible";
                $("#alert-success-text").text (response.message);
                setTimeout(() => {
                    document.getElementById("alert-success").style.visibility = "hidden";
                }, 2000);
        },
        error: function() {
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