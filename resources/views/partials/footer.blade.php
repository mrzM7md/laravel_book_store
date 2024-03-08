<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="mt-5">
  
   <!-- Footer -->
   <footer
           class="text-center text-lg-start text-white">
     <!-- Grid container -->
     <div id="about-us" class="container p-4 pb-0">
       <!-- Section: Links -->
       <section>
         <!--Grid row-->
         <div class="row">
           <!-- Grid column -->
           <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
             <img src="{{ asset('storage/images/webinfo/icon.png') }}" width="100" height="100" alt="">
             <h1 class="text-uppercase mb-4 font-weight-bold">
               {!! $webinfo->title !!}
             </h1>
             <h2>
               {!! $webinfo->description !!}
            </p>
           </div>
           <!-- Grid column -->
 
           <hr class="w-100 clearfix d-md-none" />
 
           <!-- Grid column -->
           <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
             <h6 class="text-uppercase mb-4 font-weight-bold">موقعنا</h6>
             <p>
               {!! $webinfo->location !!}
             </p>
           </div>
           <!-- Grid column -->
 
           <hr class="w-100 clearfix d-md-none" />
 
           <!-- Grid column -->
           <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3 go-whatsapp">
             <h4 class="text-uppercase mb-4 font-weight-bold">
               انظم إلينا عبر واتساب
             </h4>
             
             @if ($webinfo->whatsapp_first_group_url)
             <p>
               <a href="{{$webinfo->whatsapp_first_group_url}}" class="text-white">المجموعة الأولى</a>
             </p>
            @endif 
            @if ($webinfo->whatsapp_second_group_url)
            <p>
               <a href="{{$webinfo->whatsapp_second_group_url}}" class="text-white">المجموعة الثانية</a>
             </p>            @endif 
            @if ($webinfo->whatsapp_third_group_url)
            <p>
               <a href="{{$webinfo->whatsapp_third_group_url}}" class="text-white">المجموعة الثالة</a>
             </p>            @endif 
            @if ($webinfo->whatsapp_forth_group_url)
            <p>
               <a href="{{$webinfo->whatsapp_forth_group_url}}" class="text-white">المجموعة الرابعة</a>
             </p>
            @endif
           </div>
 
           <!-- Grid column -->
           <hr class="w-100 clearfix d-md-none" />
 
           <!-- Grid column -->
           <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
             <h6 class="text-uppercase mb-4 font-weight-bold">تواصل معنا</h6>
             <p> <a class="text-white" href="tel:{{$webinfo->phone_number}}"> <i class="fas fa-phone mr-3"></i> {{$webinfo->phone_number}}</p></a>
           </div>
           <!-- Grid column -->
         </div>
         <!--Grid row-->
       </section>
       <!-- Section: Links -->
 
       <hr class="my-3">
 
       <!-- Section: Copyright -->
       <section class="p-3 pt-0">
         <div class="row d-flex align-items-center">
           <!-- Grid column -->
           <div class="col-md-7 col-lg-8 text-center text-md-start">
             <!-- Copyright -->
             <div class="p-3">
               © 2024 حميع الحقوق محفوظة
             </div>
             <!-- Copyright -->
           </div>
           <!-- Grid column -->
 
           <!-- Grid column -->
         <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
            <!-- facebook --> 
            @if ($webinfo->facebook_url)
               <a  href="{{$webinfo->facebook_url}}"
                  class="btn btn-outline-light btn-floating m-1" class="text-white"role="button">
                  <img src="{{ asset('storage/_resources/images/facebook.png') }}" height="20" width="20" alt="">
               </a>
            @endif
             <!-- Whatsapp -->
            @if ($webinfo->whatsapp_number)
               <a  href="https://wa.me/{{$webinfo->whatsapp_number}}"
                  class="btn btn-outline-light btn-floating m-1" class="text-white"role="button">
                  <img src="{{ asset('storage/_resources/images/whatsapp.png') }}" height="20" width="20" alt="">
               </a>
            @endif


           <!-- tele -->
           @if ($webinfo->telegram_group_url)
           <a  href="{{$webinfo->telegram_group_ur}}"
              class="btn btn-outline-light btn-floating m-1" class="text-white"role="button">
              <img src="{{ asset('storage/_resources/images/twitter.png') }}" height="20" width="20" alt="">
           </a>
        @endif

                <!-- insta -->
                @if ($webinfo->insta_url)
                <a  href="{{$webinfo->insta_url}}"
                   class="btn btn-outline-light btn-floating m-1" class="text-white"role="button">
                   <img src="{{ asset('storage/_resources/images/Instagram.png') }}" height="20" width="20" alt="">
                </a>
             @endif
 
           </div>
           <!-- Grid column -->
         </div>
       </section>
       <!-- Section: Copyright -->
     </div>
     <!-- Grid container -->
   </footer>
   <!-- Footer -->
 </div>
 <!-- End of .container -->
 

 




{{-- 

               
                <div class="footer py-5">
                  <div class="container">
                      <div class="row text-white-50">
                          <div class="col-lg-4 col-md-6 mb-5">
                              <h2 class="text-warning ">{!! $webinfo->title !!}</h2>
                              <p class="pe-2 mb-1">{!! $webinfo->description !!}</p>
                              <p class="pe-2 mb-1">{!! $webinfo->location !!}</p>
                           </div>
                          <div class="col-lg-2 col-md-6 mb-5">
                              <h5 class="text-light"> <i class="fa-brands fa-square-whatsapp fa-lg"></i> مجموعات الوتساب </h5>
                              <ul class="list-unstyled lh-lg">
                                 @if ($webinfo->whatsapp_first_group_url)
                                     <li><a style="font-size: 0.8rem; padding: 3px; margin-bottom: 2px" class="btn btn-success" href="{{$webinfo->whatsapp_first_group_url}}">المجموعة الأولى</a> </li>
                                 @endif 
                                 @if ($webinfo->whatsapp_second_group_url)
                                     <li><a style="font-size: 0.8rem; padding: 3px; margin-bottom: 2px" class="btn btn-success" href="{{$webinfo->whatsapp_second_group_url}}">المجموعة الثانية</a> </li>
                                 @endif 
                                 @if ($webinfo->whatsapp_third_group_url)
                                     <li><a style="font-size: 0.8rem; padding: 3px; margin-bottom: 2px" class="btn btn-success" href="{{$webinfo->whatsapp_third_group_url}}">المجموعة الثالثة</a> </li>
                                 @endif 
                                 @if ($webinfo->whatsapp_forth_group_url)
                                     <li><a style="font-size: 0.8rem; padding: 3px" class="btn btn-success" href="{{$webinfo->whatsapp_forth_group_url}}">المجموعة الرابعة</a> </li>
                                 @endif 
                              </ul>
                          </div>
                          <div class="col-lg-2 col-md-6 mb-5">
                           <h5 class="text-light"> <i class="fa-solid fa-globe"></i> حول </h5>
                           <ul class="list-unstyled lh-lg">
                              @auth
                                 <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <li>
                                       <button onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟')" type="submit" class="btn btn-secondary" style="padding: 3px; font-size: 0.8rem; margin-bottom: 2px" href="{{ route('logout') }}">تسجيل الخروج</button></li>
                                 </form>
                              @else
                                 <li><a class="btn btn-secondary" style="padding: 3px; font-size: 0.8rem; margin-bottom: 2px" href="{{ route('login') }}">تسجيل الدخول</a></li>
                                 <li><a class="btn btn-secondary" style="padding: 3px; font-size: 0.8rem; margin-bottom: 2px" href="{{ route('register') }}">إنشاء حساب</a></li>
                              @endauth
                              @if (request()->is('books'))
                                 <li><a class="btn btn-secondary" style="padding: 3px; font-size: 0.8rem" href="#about">حول نشاطنا</a></li>
                              @else
                                 <li><a class="btn btn-secondary" style="padding: 3px; font-size: 0.8rem" href="{{ route('home') }}#about">حول نشاطنا</a></li>
                              @endif
                           </ul>
                          </div>
                          <div class="col-lg-4 col-md-6 mb-5">
                              <h5 class="text-light"> <i class="fa-solid fa-address-book"></i> تواصل معنا </h5>
                              @if ($webinfo->phone_number)
                                 <a style="color: #ffc107" style="padding: 3px; font-size: 0.8rem; margin-bottom: 2px" href="tel:{{$webinfo->phone_number}}"><i style="margin-left: 5px; color: white !important" class="fa-solid fa-phone"></i>{{$webinfo->phone_number}}</li>
                              @endif

                              
                              <ul class="d-flex mt-2 list-unstyled gap-3">
                                 @if ($webinfo->whatsapp_number)
                                    <li>
                                       <a class="d-block text-light" href="https://wa.me/{{$webinfo->whatsapp_number}}"><i class="fa-brands fa-whatsapp fa-lg whatsapp rounded-circle p-2"></i></a>
                                    </li>
                                 @endif
                                 @if ($webinfo->facebook_url)
                                    <li>
                                       <a class="d-block text-light" href="{{$webinfo->facebook_url}}"><i class="fa-brands fa-facebook fa-lg facebook rounded-circle p-2"></i></a>
                                    </li>
                                 @endif
                                 @if ($webinfo->telegram_group_url)
                                    <li>
                                       <a class="d-block text-light" href="{{$webinfo->telegram_group_url}}"><i class="fa-brands fa-telegram fa-lg telegram rounded-circle p-2"></i></a>
                                    </li>
                                 @endif
                                 @if ($webinfo->insta_url)
                                    <li>
                                       <a class="d-block text-light" href="{{$webinfo->insta_url}}"><i class="fa-brands fa-instagram fa-lg instagram rounded-circle p-2"></i></a>
                                    </li>
                                 @endif
                              </ul>
                          </div>
                          <div>&copy; 2023 - <span class="bon">حميع الحقوق محفوظة</span></div>

                      </div>
                  </div>
              </div> --}}
