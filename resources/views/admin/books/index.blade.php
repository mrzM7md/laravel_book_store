@extends('layouts.admin')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
عرض الكتب
@endsection

@section('content')
{{-- <a class="btn btn-primary" href="#"><i class="fas fa-plus"></i> أضف كتابًا جديدًا</a> --}}
<a class="btn btn-primary" href="{{ route('admin.books.create') }}"><i class="fas fa-plus"></i> أضف كتابًا جديدًا</a>
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="books-table" class="table table-stribed text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>الرقم التسلسلي</th>
                    <th>التصنيف</th>
                    <th>المؤلفون</th>
                    <th>المضيف</th>
                    <th>السعر</th>
                    <th>خيارات</th>
                </tr>
            </thead>

            <tbody>
                @foreach($books as $book)
                    <tr>
                        {{-- <td><a href="#">{{ $book->title }}</a></td> --}}
                        <td><a href="{{ route('admin.books.show', $book->slug) }}">{{ $book->title }}</a></td>
                        <td>{{ $book->isbn }}</td>
                        <td>
                            @if($book->authors()->count() > 0)
                                @foreach($book->categories as $category)
                                    {{ $loop->first ? '' : 'و' }}
                                    {{ $category->name }}
                                @endforeach
                            @endif
                        </td>

                        <td>
                            @if($book->authors()->count() > 0)
                                @foreach($book->authors as $author)
                                    {{ $loop->first ? '' : 'و' }}
                                    {{ $author->name }}
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $book->user->name}}</td>
                        <td> {{$book->price}}</td>
                        <td>
                            {{-- <a class="btn btn-info btn-sm" href="#"><i class="fa fa-edit"></i> تعديل</a>  --}}
                            <a class="btn btn-info btn-sm" href="{{ route('admin.books.edit', $book->slug) }}"><i class="fa fa-edit"></i> تعديل</a> 
                            {{-- <form class="d-inline-block" method="POST" action="#"> --}}
                            <form class="d-inline-block" method="POST" action="{{ route('admin.books.destroy', $book) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')"><i class="fa fa-trash"></i> حذف</button> 
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#books-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            }
        });
    });
</script>
@endsection