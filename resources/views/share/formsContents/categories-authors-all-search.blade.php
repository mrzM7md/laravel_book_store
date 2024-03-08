{{-- <input id="keyword" value="{{ $keyword }}" name="keyword" class="form-control mx-1 bg-dark text-light" type="search" placeholder="عن ماذا تبحث؟" aria-label="Search">
<button class="btn btn-sm btn-outline-dark border-2 border-dark" type="submit">بحث</button>
<div style="z-index: 1000" id="suggestions" class></div> --}}


<input id="keyword" name="keyword" value="{{ $keyword }}" class="keyword col-10 col-md-11 " placeholder="ادخل اسم الكتاب" type="text" aria-label="Search">
<button  type="submit" class="col-2 col-md-1">
        <span class="material-symbols-outlined">search</span>
</button>