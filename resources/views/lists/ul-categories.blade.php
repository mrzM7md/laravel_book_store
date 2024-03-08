@forelse ($categories as $category)
    @if ($category->books->count() > 0)
        <a href="{{ route('slug-categories.index', ['slug'=>$category->slug]) }}">{{ $category->name}} - {{count($category->books)}} كتب - </a>
    @endif
    @empty
        <a href="#">فارغ</a>
 @endforelse 
{{-- 
<ul class="dropdown-menu position-absolute">
    @forelse ($categories as $category)
        @if ($category->books->count() > 0)
            <li><a dir="rtl" class="dropdown-item" href="{{ route('slug-categories.index', ['slug'=>$category->slug]) }}">{{ $category->name}} - {{count($category->books)}}</a></li>
        @endif
    @empty
        <li><div dir="rtl" class="dropdown-item"> فارغ </div></li>
    @endforelse    
</ul> --}}