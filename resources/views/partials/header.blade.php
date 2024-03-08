<nav class="main-nav">
    <nav class="navbar-mobile">
      <div class="nav-icons-mobile">
        @if ( request()->is('books'))
          <a href="{{route('home')}}"> <span class="material-symbols-outlined nav-icon nav-icon-active">home</span></a>
        @else
          <a href="{{route('home')}}"> <span class="material-symbols-outlined nav-icon">home</span></a>
        @endif
        @if ( request()->is('books'))
            <a href="#about-us"><span class="material-symbols-outlined nav-icon">info</span></a>
        @endif
        
        @if ( request()->is('books'))
            <a href="#most-seller"><span class="material-symbols-outlined nav-icon">auto_stories</span></a>
         @endif
        <button onclick="return flex_hidden_Item('mobile-author-icon', 'authors')"> <span id="mobile-author-icon" class="material-symbols-outlined nav-icon">signature</span></button>
        <button onclick="return flex_hidden_Item('mobile-category-icon', 'categories')"><span id="mobile-category-icon" class="material-symbols-outlined nav-icon">shoppingmode</span></button>   
        @admin
        <a href="{{ route('controlpanel') }}"><span class="material-symbols-outlined nav-icon">admin_panel_settings</span></a>
     @endadmin
      @auth
      <a class="nav-icon">
        <form action="{{ route('logout') }}" method="POST">
        @csrf
          <button onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟')">
            <span class="material-symbols-outlined nav-icon">logout</span>
          </button>
      </form>
    </a>

      @else
        <a href="{{ route('login') }}"><span class="material-symbols-outlined nav-icon">login</span></a>
      @endauth
      @auth
        <a href="{{ route('cart.view') }}"><span class="material-symbols-outlined nav-icon cart">shopping_cart<span class="nav-icon-cart my-cart"> {{ Auth::user()->booksInCart()->count() ?? 0 }} </span> </span></a>
      @endauth

         

    </div>
  </nav>
  
    <nav class="navbar-desktop">
      <div class="nav-icons-desktop">
        
        <div class="right-side side home nav-icon-active">
          <a href="{{route('home')}}" class="nav-icon"><span class="material-symbols-outlined">home</span></a>
        </div>
        
        <div class="center-side side">
    
        @if ( request()->is('books'))
          <a href="#about-us" class="nav-icon"><span class="material-symbols-outlined self-icon">info</span><span>حول نشاطنا</span></a>
        @endif
        
        
        @if ( request()->is('books'))
          <a href="#about-us" class="nav-icon"><span class="material-symbols-outlined self-icon">auto_stories</span><span>منجاتنا</span></a>
        @endif
        
        <button id="desktop-author-icon" onclick="return flex_hidden_Item('desktop-author-icon', 'authors')" class="nav-icon"><span class="material-symbols-outlined self-icon">signature</span><span>المؤلفون</span></button>
        <button id="desktop-category-icon"  onclick="return flex_hidden_Item('desktop-category-icon', 'categories')" class="nav-icon"><span class="material-symbols-outlined self-icon">shoppingmode</span><span>تصنيفات</span></button>
        
      </div>
  


    <div class="left-side side">
      @admin
        <a href="{{ route('controlpanel') }}" class="nav-icon"><span class="material-symbols-outlined self-icon">admin_panel_settings</span><span>لوحة التحكم</span></a>
       @endadmin
      @auth
        <form style="display: inline;" action="{{ route('logout') }}" method="POST">
            @csrf
            <button onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟')" class="nav-icon"><span class="material-symbols-outlined self-icon">logout</span><span>تسحيل الخروج</span></button>
        </form>

      @else
        <a href="{{ route('login') }}" class="nav-icon"><span class="material-symbols-outlined self-icon">login</span><span>تسحيل الدخول</span></a>
      @endauth

      @auth
        <a href="{{ route('cart.view') }}"><span class="material-symbols-outlined nav-icon cart">shopping_cart<span class="nav-icon-cart">{{ Auth::user()->booksInCart()->count() ?? 0 }}</span></span></a>
      @endauth  
    </div>
      </div>
    </nav>
  
    <div id="authors" class="nav-categories-authors authors">
      <span>المؤلفون</span>
      <span>
        @include('lists.ul-authors')
      </span>
    </div>
    <div id="categories" class="nav-categories-authors categories">
      <span>تصنيفات الكتب</span>
      <span>
        @include('lists.ul-categories')
      </span>
    </div>
  </nav>
  
  
  
  






  
  <!-- start header -->
{{-- 
  <div class="header fixed-top m-0">
    <nav class="navbar bg-dark border-bottom border-body "
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand text-warning m-0" href="{{route('home')}}">{{$webinfo->title}}</a>

            <ul>
                <div class="drop-down" data-open="true"><i class="fa-solid fa-angle-down"></i>
                </div>
                <ul class="list">
                    <li><a href="{{route('home')}}">الرئيسية</a></li>

                    @if ( request()->is('books'))
                        <li><a href="#about">حول نشاطنا</a></li>
                    @endif

                    <li class="nav-item dropdown position-relative">
                        <a
                            class="nav-link dropdown-toggle text-light d-flex align-items-center"
                            href="#"
                            role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-list"></i> <span style="margin-right: 5px">الأصناف</span><i class="fa-solid fa-angle-down"></i>
                        </a>
                        @include('lists.ul-categories')
                        
                    </li>
                    <li class="nav-item dropdown position-relative">
                        <a
                            class="nav-link dropdown-toggle text-light d-flex align-items-center"
                            href="#"
                            role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-pen"></i> <span style="margin-right: 5px">المؤلفون</span><i class="fa-solid fa-angle-down"></i>
                        </a>
                        @include('lists.ul-authors')
                    </li>

                    @if ( request()->is('books'))
                        <li><a href="#products">منجاتنا</a></li>
                    @endif
                

                    @admin
                        <li><a href="{{ route('controlpanel') }}">لوحة التحكم</a></li>
                    @endadmin
                </ul>
            </ul>

            <div class="btns">
                @auth
                    <a href="{{ route('cart.view') }}"
                        class="navBasket-icon bg-warning btn btn-sm text-light">
                        
                        @if(Auth::user()->booksInCart()->count() > 0)
                            <span class="cart badge" style=" background-color:khaki ; color: black;">{{ Auth::user()->booksInCart()->count() }}</span>
                        @else
                            <span class="cart badge" style="background-color: #4c4c4c; color: white">0</span>
                        @endif
                        
                        <i class="fa-solid fa-basket-shopping"></i>
                        
                        <!-- <span class="count">2</span> -->
                    </a>
                @endauth
                
                @auth
                    <form style="display: inline;" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <div class="bg-warning btn btn-sm text-light">
                       <button onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟')" style="margin: 0; padding: 0; background-color: transparent; border-width: 0ch"> <i class="fa-solid fa-right-from-bracket" style="color: #fafcff;"></i></button>
                    </div>
                </form>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-warning btn btn-sm text-light">
                        <i class="fa-solid fa-user"></i>
                    </a>
                @endauth
            </div>
        </div>
    </nav>
  
</div>
 --}}

<!-- end header -->