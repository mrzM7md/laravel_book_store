@extends('layouts.admin')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/create_edit_book.css') }}">
@endsection


@section('heading')
صور عروض المتجر
@endsection

@section('content')

    <form id="form-add" action="{{route('admin.carousels.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('POST')
        <div class="input-group my-3 file-area">
            {{-- <input type="file" id="carousels_photo_path" accept='image/*' name="carousels_photo_path" class="form-control @error('carousels_photo_path') is-invalid @enderror" name="carousels_photo_path" value="{{ old('carousels_photo_path') }}" autocomplete="carousels_photo_path"> --}}
            <input onchange="onChangeNewImage()" multiple type="file" id="carousels_photo_path" accept='image/*' name="carousels_photo_path[]" class="form-control @error('carousels_photo_path.*') is-invalid @enderror">
            <div class="input-title">أضف صور جديدة بالنقر أو السحب - الحجم لا يتعدى 1 ميغا بايت !!</div>
            @error('carousels_photo_path.*')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </form>

<hr>
<div class="row">
    <div class="col-md-12">
        <table id="carousel-table" class="table table-stribed text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><center>الصورة</center></th>
                    <th><center>المضيف</center></th>
                    <th><center>استبدال</center></th>
                    <th><center>حذف</center></th>
                </tr>
            </thead>

            <tbody>
                @foreach($carousels as $carousel)
                    <tr>
                        {{-- <img src="{{assets('')}}" alt=""> --}}

                        <td>
                            <img height="100" width="300"  src="{{ asset('storage/' . $carousel->carousels_photo_path) }}" alt="image">
                        </td>
                        
                        <td> --- </td>
                        <td>
                            <form id="form-replace" action="{{route('admin.carousels.store')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <input type="file" id="carousels_photo_path" accept='image/*' name="carousels_photo_path" class="form-control @error('carousels_photo_path') is-invalid @enderror" name="carousels_photo_path" value="{{ old('carousels_photo_path') }}" autocomplete="carousels_photo_path">
                                    <div class="input-title">اختر - أو - ضع الصورة الجديدة هنا</div>
                                    @error('carousels_photo_path.*')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </form>
                            {{-- <a class="btn btn-info btn-sm" href="{{ route('admin.books.edit', $book->slug) }}"><i class="fa fa-edit"></i> تعديل</a>  --}}
                        </td>
                        <td>
                            <center>
                                <form id="form-delete" class="d-inline-block" method="POST" action="{{ route('admin.carousels.destroy', $carousel->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')"><i class="fa fa-trash"></i> حذف</button> 
                                </form>
                            </center>
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
        $('#carousel-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            }
        });
    });
</script>

<script>
    // Get the image input element
    function onChangeNewImage(){
        $('#form-add').submit();
        // alert('submit');
    }

    function onChangeReplaceDeleteImage(formClass){
        $('.'+formClass).submit();
    }
</script>


@endsection