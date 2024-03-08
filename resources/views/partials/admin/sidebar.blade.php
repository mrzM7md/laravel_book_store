    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      {{-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <img style="width:70%" src="{!! asset('logo.png') !!}"> 
        </div>
      </a> --}}

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->is('01010-admin-01010') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('admin.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>لوحة التحكم</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            @superadmin
            <li class="nav-item {{ request()->is('01010-admin-01010/webinfo*') ? 'active' : '' }}">
              <a class="nav-link text-right" href="{{ route('admin.webinfo.edit') }}">
              <i class="fas fa-globe"></i>
                <span>بيانات الموقع</span>
              </a>
            </li>
            @endsuperadmin

            <li class="nav-item {{ request()->is('01010-admin-01010/carousels*') ? 'active' : '' }}">
              {{-- <a class="nav-link text-right" href="#"> --}}
              <a class="nav-link text-right" href="{{ route('admin.carousels.index') }}">
                <i class="fa-solid fa-face-smile" style="color: #000000;"></i>
                <span>صور العروض</span></a>
            </li>
            
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('01010-admin-01010/books*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('admin.books.index') }}">
        <i class="fas fa-book-open"></i>
          <span>الكتب</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('01010-admin-01010/bestbooks*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('admin.best-books.index', true) }}">
        <i class="fas fa-book-open"></i>
          <span>الكتب الأكفر مبيعا</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ request()->is('01010-admin-01010/categories*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{route('admin.categories.index')}}">
        {{-- <a class="nav-link text-right" href="{{ route('categories.index') }}"> --}}
        <i class="fas fa-folder"></i>
          <span>التصنيفات</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('01010-admin-01010/authors*') ? 'active' : '' }}">
        {{-- <a class="nav-link text-right" href="#"> --}}
        <a class="nav-link text-right" href="{{ route('admin.authors.index') }}">
        <i class="fas fa-pen-fancy"></i>
          <span>المؤلفون</span>
        </a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item {{ request()->is('01010-admin-01010/users*') ? 'active' : '' }}">
        {{-- <a class="nav-link text-right" href="#"> --}}
        <a class="nav-link text-right" href="{{ route('admin.users.index') }}">
        <i class="fas fa-users"></i>
          <span>المستخدمون</span></a>
      </li>

      <li class="nav-item {{ request()->is('01010-admin-01010/users*') ? 'active' : '' }}">
        {{-- <a class="nav-link text-right" href="#"> --}}
        <a target="_blank" class="nav-link text-right" href="{{ route('home') }}">
          <i class="fa-solid fa-laptop" style="color: #ffffff;"></i>
          <span>الموقع</span></a>
      </li>

      <li class="nav-item {{ request()->is('01010-admin-01010/carousels*') ? 'active' : '' }}">
        {{-- <a class="nav-link text-right" href="#"> --}}
        <a class="nav-link text-right" href="{{ route('admin.carousels.index') }}">
          <i class="fa-solid fa-face-smile" style="color: #000000;"></i>
          <span>صور العروض</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->