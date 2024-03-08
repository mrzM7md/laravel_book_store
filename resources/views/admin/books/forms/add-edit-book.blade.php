<label for="title" class="mb-2">عنوان الكتاب</label>
<div class="input-group mb-3">
    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="جدد عنوان الكتاب" value="{{ $book->title ? $book->title : old('title')  }}">
    @error('title')
        <span class="invalid-feedback"  role="alert">
            <strong> {{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="input-group mb-3">
    <input class="m-2" id="best_seller" type="checkbox" class="@error('best_seller') is-invalid @enderror" name="best_seller" {{$book->best_seller ? 'checked' : ''}}>
    @error('best_seller')
        <span class="invalid-feedback" role="alert">
            <strong> {{ $message }}</strong>
        </span>
    @enderror
    <label for="best_seller" class="mt-2">إضافة إلى قائمة الكتب الأكثر مبيعا</label>
</div>


<div class="input-group my-3 file-area">
    <label for="categories" class="mb-2">التصنيف</label>
    <div class="input-group mb-3">
        <select id="categories" multiple style="width: 100% !important;" name="categories[]" class="form-select">
            <option disabled selected>اختر تصنيفًا (اختياري)</option>
            @include('lists.option-categories', ['categories' => $categories, 'book' => $book])
        </select>
    
        @error('categories')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <a style="padding: 3px; font-size: 0.9rem; margin-top: 3px" class="btn btn-primary" href="{{ route('admin.categories.index')}}">إضافة تصنيف جديد </a>

    </div>
</div>


<label for="authors" class="mb-2">المؤلف</label>
<div class="input-group mb-3">
    <select id="authors" multiple style="width: 100% !important;" name="authors[]" class="form-select">
        <option disabled selected>اختر مؤلفا (اختياري)</option>
        @include('lists.option-authors', ['authors' => $authors, 'book' => $book])
    </select>

    @error('authors')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <a style="padding: 3px; font-size: 0.9rem; margin-top: 3px" class="btn btn-primary" href="{{ route('admin.authors.index')}}">إضافة مؤلف جديد </a>

</div>


<label for="isbn" class="mb-2">الرقم التسلسلي</label>
<div class="input-group mb-3">
    <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" placeholder="الرقم التسلسلي (اختياري)" value="{{ $book->isbn ? $book->isbn : old('isbn') }}">
    @error('isbn')
        <span class="invalid-feedback" role="alert">
            <strong> {{ $message }}</strong>
        </span>
    @enderror
</div>


<div class="input-group my-3 file-area">
    <label for="cover_image" class="mb-2">صورة الغلاف</label>
    <input type="file" id="cover_image" accept='image/*' name="cover_image" onchange="readCoverImage(this)" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" value="{{ old('cover_image') }}" autocomplete="cover_image">
    <div class="input-title">اسحب الصورة أو انقر للاختيار يدويا</div>
    @error('cover_image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>

    <img  style="display: none" id="cover-image-thumb" width="100" height="150">


<div class="input-group my-3 file-area">
    <label for="images" class="mb-2">صور اخرى للمنتج - 3 صور كحد أقصى - (اختياري)</label>
    <input multiple type="file" id="images" accept='image/*' name="images[]" onchange="readMultiImages(this)" class="form-control @error('images') is-invalid @enderror" value="{{ old('images') }}" autocomplete="images">
    <div class="input-title">اسحب الصور أو انقر للاختيار يدويا</div>
    @error('images')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
</div>

<img style="display: none" id="image-thumb-1" width="100" height="100">
<img style="display: none" id="image-thumb-2" width="100" height="150">
<img style="display: none" id="image-thumb-3" width="100" height="150">


<label for="description" class="mb-2">الوصف</label>
<div class="input-group d-inline">
    <textarea id="description" placeholder="الوصفف  (اختياري)" name="description" class="form-control @error('description') is-invalid @enderror" id="description" name="description" autocomplete="description" cols="12" rows="3">
        {!! $book->description ? $book->description : old('description') !!}
    </textarea>
    @error('description')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
            </span>
    @enderror
</div>


<label for="publish_year" class="mb-2">سنة النشر</label>
<div class="input-group mb-3">
    <input id="publish_year" type="number" class="form-control @error('publish_year') is-invalid @enderror" name="publish_year" placeholder="سنة النشر (اختياري)" value="{{ $book->publish_year ? $book->publish_year : old('publish_year') }}" autocomplete="publish_year">
    @error('publish_year')
        <span class="invalid-feedback"  role="alert">
            <strong> {{ $message }}</strong>
        </span>
    @enderror
</div>


<label for="number_of_pages" class="mb-2">عدد الصفحات</label>
<div class="input-group mb-3">
    <input id="number_of_pages" type="number" class="form-control @error('number_of_pages') is-invalid @enderror" name="number_of_pages" placeholder="عدد الصفحات (اختياري)" value="{{$book->number_of_pages ? $book->number_of_pages : old('number_of_pages') }}" autocomplete="number_of_pages">
    @error('number_of_pages')
        <span class="invalid-feedback"  role="alert">
            <strong> {{ $message }}</strong>
        </span>
    @enderror
</div>


<label for="number_of_copies" class="mb-2">عدد النسخ</label>
<div class="input-group mb-3">
    <input id="number_of_copies" type="number" class="form-control @error('number_of_copies') is-invalid @enderror" name="number_of_copies" placeholder="عدد النسخ (اختياري)" value="{{ $book->number_of_copies ? $book->number_of_copies : old('number_of_copies') }}" autocomplete="number_of_copies">
    @error('number_of_copies')
        <span class="invalid-feedback"  role="alert">
            <strong> {{ $message }}</strong>
        </span>
    @enderror
</div>



<label for="price" class="mb-2">السعر</label>
<div class="input-group mb-3">
    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="السعر (اختياري)" value="{{ $book->price ? $book->price : old('price') }}" autocomplete="price">
    @error('price')
        <span class="invalid-feedback"  role="alert">
            <strong> {{ $message }}</strong>
        </span>
    @enderror
</div>

<div id="currency-div">
    <label for="currency" class="mb-2">العملة</label>
    <div class="input-group mb-3">
        <select id="currency" style="width: 100% !important;" name="currency" class="form-select">
            @include('lists.option-currencies', ['currencies' => $currencies, 'book' => $book])
        </select>

        @error('currencies')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>


