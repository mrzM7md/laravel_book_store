@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/create_edit_book.css') }}">
@endsection

@section('heading')
عدّل بيانات الكتاب     
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-right">
            عدّل بيانات الكتاب     
        </div>
        <div class="card-body">
            <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('admin.books.forms.add-edit-book', $book)

                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">عدّل</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script src="{{ asset('scripts/create_edit_book.js') }}"></script>
@endsection