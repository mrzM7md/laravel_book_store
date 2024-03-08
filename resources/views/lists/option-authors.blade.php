@if ($authors)

@foreach($authors as $author)
    <option value="{{ $author->id }}" {{ $book->authors->contains($author) ? 'selected' : '' }}>{{ $author->name }}</option>
    {{-- <option value="{{$author->id}}"> {{$author->name}} </option> --}}
@endforeach

@endif