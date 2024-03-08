<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة إن متعة القراءة ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
    
    <?php $title = $webinfo->title ?>
    <title>@yield('pageName', $title)</title>
   
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <!-- Google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    <!-- cairo font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('storage/_resources/css/books_style.css') }} ">
    
    @yield('links')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $description = $webinfo->description ?>
    <meta content="<?php $description ?>" name="description">

  {{-- <meta content="<?php $webinfo ?>" name="keywords"> --}}
  
  <style>
    .bg-cart {
        background-color: #ffc107;
        color: #fff;
    }

    .score {
        display: block;
        font-size: 0.8rem;
        position: relative;
        overflow: hidden;
    }
    .score-wrap {
        display: inline-block;
        position: relative;
        height: 19px;
    }
    .score .stars-active {
        color: #FFCA00;
        position: relative;
        z-index: 10;
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
    }
    .score .stars-inactive {
        color: lightgrey;
        position: absolute;
        top: 0;
        left: 0;
    }
    .rating {
        overflow: hidden;
        display: inline-block;
        position: relative;
        font-size: 20px;
    }
    .rating-star {
        padding: 0 5px;
        margin: 0;
        cursor: pointer;
        display: block;
        float: left;
    }
    .rating-star:after {
        position: relative;
        font-family: "Font Awesome 5 Free";
        content: '\f005';
        color: lightgrey;
    }
    .rating-star.checked ~ .rating-star:after,
    .rating-star.checked:after {
        content: '\f005';
        color: #FFCA00;
    }
    .rating:hover .rating-star:after {
        content: '\f005';
        color: lightgrey;
    }
    .rating-star:hover ~ .rating-star:after,
    .rating .rating-star:hover:after {
        content: '\f005';
        color: #FFCA00;
    }

    /* .my-alert {
        position: fixed;
        z-index: 100000;
        display: none !important;
        top: 20px;
        right: 20px;
        opacity: 0.8;
        width: fit-content;
        visibility: hidden;
    } */
    


</style>

<body>
    @include('partials.header')  
    <div style="position: fixed; z-index: 100000;top: 20px;right: 20px;opacity: 0.8;width: fit-content;visibility: hidden;" id="alert-fail" class="alert alert-danger d-flex gap-2 align-items-center; opacity:0.9"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </svg>
        <p id="alert-fail-text" class="m-0"></p>
    </div>

    <div style="position: fixed; z-index: 100000;top: 20px;right: 20px;opacity: 0.8;width: fit-content; visibility: hidden;transition:visibility 5s linear" id="alert-success" class="alert alert-success"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </svg>
        <p style="display: inline;" id="alert-success-text" class="m-0"></p>
    </div>

    <div style="position: fixed; z-index: 100000;top: 20px;right: 20px;opacity: 0.8;width: fit-content; visibility: hidden;transition:visibility 5s linear" id="alert-warning" class="alert alert-warning"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </svg>
        <p style="display: inline;" id="alert-warning-text" class="m-0"></p>
    </div>

  {{-- @include('partials.tabpar') --}}  

  @yield('content', $webinfo->description)

  @include('partials.footer')

    <!-- bootstrab -->
    <script src="{{ asset('storage/_resources/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/34d33c3cc7.js" crossorigin="anonymous"></script>
        
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="{{ asset('storage/_resources/js/books_style.js') }}"></script>
    
    {{-- jQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    @yield('scripts')
</body>
