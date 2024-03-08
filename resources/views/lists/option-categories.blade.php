@if ($categories)
    
@foreach($categories as $category)
    {{-- <option value="{{$category->id}}"> {{$category->name}} </option> --}}
    <option value="{{ $category->id }}" {{ $book->categories->contains($category) ? 'selected' : '' }}>{{ $category->name }}</option>
@endforeach

@endif
