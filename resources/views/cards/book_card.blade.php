<div class="single-card shadow-sm p-2 mb-5 bg-body rounded me-3">
    <img class="shadow-lg p-0 m-0 bg-body rounded" src="{{$image}}" alt="">
    <a href="{{ route('books.show', $slug) }}">
      <p class="single-card-title m-0">{{ $title }}</p>
    </a>

    <span class="score">
      <div class="score-wrap">
          <span class="stars-active" style="width: {{ $rate }}%">
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

    <div class="single-card-info">
      <div class="price">
        {{ $price }}
      </div>
      
      @auth
      <form class="add-cart-form" action="{{ route('add.cart', ['slug' => $slug]) }}" method="POST">
        @csrf
        <input name="id" type="hidden" id="bookId" value="{{$book->id}}">
          <span class="text-muted mb-3">
            <input name="quantity" type="hidden" class="form-control d-inline mx-auto" id="quantity" value="0" style="width: 10%;">
          </span>
        <button type="submit" class="cart addCart {{-- for cart ajax --}}  me-2">
          <span class="material-symbols-outlined">shopping_cart</span>
        </button>
      </form> 
      @else
      <a href="{{ route('login') }}" class="cart addCart">
        <span class="material-symbols-outlined">shopping_cart</span>
      </a>
      @endauth


    </div>
  </div>


  @section('scripts')
  <script>
        $('.add-cart-form').on('submit', function(e) {
        e.preventDefault();
        var token = "{{ Session::token() }}";
        var thisForm = this;

        $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        method: 'POST',
        token: token,
        data:$(this).serialize(),
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
                  $(".cart").text(response.num_of_product);
                  
              setTimeout(() => {
                  document.getElementById("alert-warning").style.visibility = "hidden";
              }, 2000);

              }
              else{
                  // thisForm.parentNode.remove();
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