@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/create_edit_book.css') }}">
@endsection

@section('heading')
إضافة كتاب جديد
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-right">
            أضف كتابًا جديدًا
        </div>
        <div class="card-body">
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.books.forms.add-edit-book')
                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">أضف</button>
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