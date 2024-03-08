@extends('layouts.main') 

@section('links')
<style>
    /*  start register in page */
    .log-in {
    max-width: 565px;
    background-color: #0379a8;
    margin: 20px 0;
    position: relative;
    right: 50%;
    transform: translate(50%);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 9px 0px rgb(255 193 7 / 60%);
    }
    .log-in img{
    width: 30%;
    position: relative;
    right: 50%;
    transform: translate(50%);
    padding: 1.5%;
    }
    .log-in form{
    margin-top: 10px;
    padding: 1.5%;
    box-shadow: 1px -3px 20px 0px rgb(255 193 1 / 60%);
    border-radius: 10px;
    }
    .log-in form .form-label{
    color: white;
    font-weight: 600;
    font-size: 18px;
    }
    .log-in form .form-check{
    display: flex;
    align-items: center;
    gap: 5px;
    }
    .log-in form .form-check-label{
    color: white;
    font-weight: 600;
    font-size: 18px;
    }
    .log-in form .form-check-input{
    float: none;
    margin: 0;
    width: 16px;
    height: 16px;
    }
    .log-in form button{
    margin-right: auto;
    margin-left: auto;
    display: block;
    width: 100%;
    }
    .log-in form span{
    text-align: center;
    display: block;
    margin-top: 10px;
    color: white;
    font-size: 15px;
    }
    .log-in form span a{
    color: #ffc107;
    margin-right: 3px;
    }
    /*  End log in page */
</style>
@endsection

@section('content')
    <div style="margin-top: 100px" class="log-in bg-dark">
        
        <a href="/">
            <img src="{{ asset('storage/images/webinfo/logo.png') }}" width="200" height="200" alt="logo">
        </a>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" dir="rtl">
            @csrf

            <x-validation-errors class="mb-4" />

            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" value="{{old('email')}}" name="email" required class="form-control" type="email" id="email" autocomplete="email" aria-describedby="emailHelp">
            </div>

            {{-- <div>
                <x-label for="email"  value="{{ __('site.email') }}" />
                <x-input id="email" required class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
            </div> --}}


            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" required type="password" name="password" autocomplete="current-password" class="form-control" id="password">
            </div>


            {{-- <div class="mt-4">
                <x-label for="password" value="{{ __('site.password') }}" />
                <x-input id="password" required class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
            </div>
            --}}
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                <label class="form-check-label" for="remember_me">تذكرني</label>
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('site.remember_me') }}</span>
                </label>
            </div> --}}

            <div dir="rtl" class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('site.forgot_password') }}
                    </a>
                @endif

                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    ليس لديك حساب؟
                </a> --}}

                <button type="submit" class="btn btn-warning">تسجيل دخول</button>
                <span>ليس لديك حساب؟<a class="" href="{{ route('register') }}" >إنشاء حساب</a></span>
                
                {{-- <x-button class="mr-4">
                    {{ __('site.login') }}
                </x-button> --}}
            </div>
        </form>
    </div>
@endsection