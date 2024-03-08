@extends('layouts.admin')

@section('heading')
تعديل بيانات الموقع
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/create_edit_book.css') }}">
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-right">
            بيانات الموقع
        </div>
        <div class="card-body">
            <form action="{{ route('admin.webinfo.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <label for="title" class="mb-2">اسم الموقع</label>
                <div class="input-group mb-3">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="ادخل اسم الموقع" value="{{ $webinfo->title ? $webinfo->title : old('title')  }}">
                    @error('title')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="description" class="mb-2">وصف الموقع - سيظهر في نتائج البحث عند البحث عن موقعك في جوجل-</label>
                <div class="input-group d-inline">
                    <textarea id="description" placeholder="مثلا: نوفر أحدث الكتب في المكلا ولدينا خجمة توصيل... إلخ" name="description" class="form-control @error('description') is-invalid @enderror" id="description" name="description" autocomplete="description" cols="12" rows="3">
                        {!! $webinfo->description ? $webinfo->description : old('description') !!}
                    </textarea>
                    @error('description')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                            </span>
                    @enderror
                </div>



                <label for="about" class="mb-2">حول المتجر</label>
                <div class="input-group d-inline">
                    <textarea id="about" placeholder="مثلا موقع ... يهتم ببيع الكتب ووو - لا يتجاوز - 1124 حرفا !!" name="about" class="form-control @error('about') is-invalid @enderror" id="about" name="about" autocomplete="about" cols="12" rows="3">
                        {!! $webinfo->about ? $webinfo->about : old('about') !!}
                    </textarea>
                    @error('about')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                            </span>
                    @enderror
                </div>


                
                {{-- <label for="location" class="mb-2">عنوان المتجر</label>
                <div class="input-group mb-3">
                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="مثلا: حضرموت/ المكلا/ الهابير..." value="{{ $webinfo->location ? $webinfo->location : old('location')  }}">
                    @error('location')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}


                <label for="location" class="mb-2">عنوان المتجر</label>
                <div class="input-group d-inline">
                    <textarea id="location" placeholder="مثلا: حضرموت/ المكلا/ الهابير..."  name="location" class="form-control @error('location') is-invalid @enderror" id="location" name="location" autocomplete="location" cols="12" rows="3">
                        {!! $webinfo->location ? $webinfo->location : old('location') !!}
                    </textarea>
                    @error('location')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                            </span>
                    @enderror
                </div>



                <div class="input-group my-3 file-area">
                    <label for="logo" class="mb-2">شعار المتجر</label>
                    <input type="file" id="logo" accept='image/*' name="logo" onchange="readCoverImage(this, 'logo-image-thumb')" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}" autocomplete="logo">
                    <div class="input-title">اسحب الصورة أو انقر للاختيار يدويا -سيتم اعتماد الصورة السابقة إن لم تقم بالاختيار - الحجم لا يتجاوز 1 ميفا بايت !!</div>
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                    <img  style="display: none" id="logo-image-thumb" width="150" height="150">

                    
                    
                    <div class="input-group my-3 file-area">
                        <label for="web_cover_image" class="mb-2">صورة المتجر</label>
                        <input type="file" id="web_cover_image" accept='image/*' name="web_cover_image" onchange="readCoverImage(this, 'cover-image-thumb')" class="form-control @error('web_cover_image') is-invalid @enderror" name="web_cover_image" value="{{ old('web_cover_image') }}" autocomplete="web_cover_image">
                        <div class="input-title">اسحب الصورة أو انقر للاختيار يدويا -سيتم اعتماد الصورة السابقة إن لم تقم بالاختيار - الحجم لا يتجاوز 1 ميفا بايت !!</div>
                        @error('web_cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                        <img  style="display: none" id="cover-image-thumb" width="150" height="150">
    

                        
                    <label for="phone_number" class="mb-2">رقم الهاتف اتصال(اختياري)</label>
                <div class="input-group mb-3">
                    <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="ادخل رقم هاتف ، مثال '777777777'" value="{{ $webinfo->phone_number ? $webinfo->phone_number : old('phone_number')  }}">
                    @error('phone_number')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="whatsapp_number" class="mb-2">رقم الوتساب (اختياري)</label>
                <div class="input-group mb-3">
                    <input id="whatsapp_number" type="number" class="form-control @error('whatsapp_number') is-invalid @enderror" name="whatsapp_number" placeholder="رقم الوتساب الذي سيتواصل الزبائن من خلاله" value="{{ $webinfo->whatsapp_number ? $webinfo->whatsapp_number : old('whatsapp_number')  }}">
                    @error('whatsapp_number')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="whatsapp_first_group_url" class="mb-2">رابط مجموعة الوتساب -1 (اختياري)</label>
                <div class="input-group mb-3">
                    <input id="whatsapp_first_group_url" type="url" class="form-control @error('whatsapp_first_group_url') is-invalid @enderror" name="whatsapp_first_group_url" placeholder="أدخل رابط المجموعة الأولى في حال وجودها" value="{{ $webinfo->whatsapp_first_group_url ? $webinfo->whatsapp_first_group_url : old('whatsapp_first_group_url')  }}">
                    @error('whatsapp_first_group_url')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="whatsapp_second_group_url" class="mb-2">رابط مجموعة الوتساب -2 (اختياري)</label>
                <div class="input-group mb-3">
                    <input id="whatsapp_second_group_url" type="url" class="form-control @error('whatsapp_second_group_url') is-invalid @enderror" name="whatsapp_second_group_url" placeholder="أدخل رابط المجموعة الثانية في حال وجودها" value="{{ $webinfo->whatsapp_second_group_url ? $webinfo->whatsapp_second_group_url : old('whatsapp_second_group_url')  }}">
                    @error('whatsapp_second_group_url')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="whatsapp_third_group_url" class="mb-2">رابط مجموعة الوتساب -3 (اختياري)</label>
                <div class="input-group mb-3">
                    <input id="whatsapp_third_group_url" type="url" class="form-control @error('whatsapp_third_group_url') is-invalid @enderror" name="whatsapp_third_group_url" placeholder="أدخل رابط المجموعة الثالثة في حال وجودها" value="{{ $webinfo->whatsapp_third_group_url ? $webinfo->whatsapp_third_group_url : old('whatsapp_third_group_url')  }}">
                    @error('whatsapp_third_group_url')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="whatsapp_forth_group_url" class="mb-2">رابط مجموعة الوتساب -4 (اختياري)</label>
                <div class="input-group mb-3">
                    <input id="whatsapp_forth_group_url" type="url" class="form-control @error('whatsapp_forth_group_url') is-invalid @enderror" name="whatsapp_forth_group_url" placeholder="أدخل رابط المجموعة الرابعة في حال وجودها" value="{{ $webinfo->whatsapp_forth_group_url ? $webinfo->whatsapp_forth_group_url : old('whatsapp_forth_group_url')  }}">
                    @error('whatsapp_forth_group_url')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="telegram_group_url" class="mb-2">رابط قناة التيليحرام (اختياري)</label>
                <div class="input-group mb-3">
                    <input id="telegram_group_url" type="url" class="form-control @error('telegram_group_url') is-invalid @enderror" name="telegram_group_url" placeholder="أدخل رابط قناة التيليجرام في حال وجودها" value="{{ $webinfo->telegram_group_url ? $webinfo->telegram_group_url : old('telegram_group_url')  }}">
                    @error('telegram_group_url')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="facebook_url" class="mb-2">رابط صفحة الفيسبوك (اختياري)</label>
                <div class="input-group mb-3">
                    <input id="facebook_url" type="url" class="form-control @error('facebook_url') is-invalid @enderror" name="facebook_url" placeholder="أدخل رابط صفحة االفيسبوك في حال وجودها" value="{{ $webinfo->facebook_url ? $webinfo->facebook_url : old('facebook_url')  }}">
                    @error('facebook_url')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="insta_url" class="mb-2">رابط صفحة متجر الإنستا (اختياري)</label>
                <div class="input-group mb-3">
                    <input id="insta_url" type="url" class="form-control @error('insta_url') is-invalid @enderror" name="insta_url" placeholder="أدخل رابط صفحة الإننستا في حال وجودها" value="{{ $webinfo->insta_url ? $webinfo->insta_url : old('insta_url')  }}">
                    @error('insta_url')
                        <span class="invalid-feedback"  role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
    <script src="{{ asset('scripts/edit_webinfo.js') }}"></script>
@endsection
