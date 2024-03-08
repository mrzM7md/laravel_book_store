@forelse ($authors as $author)
    @if ($author->books->count() > 0)
        <a href="{{ route('slug-authors.index', ['slug'=>$author->slug]) }}">{{ $author->name}} - {{count($author->books)}}</a>
    @endif
    @empty
        <a href="#">فارغ</a>
 @endforelse 

{{-- <ul class="dropdown-menu position-absolute">
    @forelse ($authors as $author)
    @if ($author->books->count() > 0)
        <li><a class="dropdown-item" href="{{ route('slug-authors.index', ['slug'=>$author->slug]) }}">{{ $author->name}} - {{$author->books->count()}}</a></li>
    @endif    
    @empty
        <li><div dir="rtl" class="dropdown-item"> فارغ </div></li>
    @endforelse
</ul> --}}
