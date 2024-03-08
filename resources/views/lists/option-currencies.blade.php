<option value="{{ $currencies[0]->id }}" selected>{{ $currencies[0]->name }}</option>
@foreach($currencies as $currency)
    {{-- <option value="{{$currency->id}}"> {{$currency->name}} </option> --}}
    @if ($currency != $currencies[0])
        <option value="{{ $currency->id }}" {{ $book->currency == $currency ? 'selected' : '' }}>{{ $currency->name }}</option>
    @endif
@endforeach