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
    {{-- <x-authentication-card> --}}
        <a href="/">
            <img src="{{ asset('storage/images/webinfo/logo.png') }}" width="200" height="200" alt="logo">
        </a>

        <form method="POST" action="{{ route('register') }}" dir="rtl">
            @csrf
          
            <x-validation-errors class="mb-4" />

            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="name" value="{{old('name')}}" name="name" required class="form-control" type="text" id="name" autocomplete="name" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
{{-- 
            <div>
                <x-label class="form-label" for="name" value="{{ __('site.name') }}" />
                <x-input id="name" required class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            </div> --}}

            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" value="{{old('email')}}" name="email" required class="form-control" type="email" id="email" autocomplete="email" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>

            {{-- <div class="mt-4">
                <x-label for="email" value="{{ __('site.email') }}" />
                <x-input id="email" required class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
            </div> --}}

            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input type="password" required type="password" name="password" autocomplete="new-password" class="form-control" id="password">
            </div>

            {{-- <div class="mt-4">
                <x-label for="password" value="{{ __('site.password') }}" />
                <x-input id="password" required class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
            </div> --}}

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" required type="password" name="password_confirmation" autocomplete="new-password" class="form-control" id="password">
            </div>

            {{-- <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('site.password_confirmation') }}" />
                <x-input id="password_confirmation" required class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
            </div> --}}

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                
                {{-- <button type="submit" class="btn btn-warning">لديك حساب بالفعل؟</button> --}}

                {{-- <a  class="btn btn-warning href="{{ route('login') }}">
                    {{ __('site.already_registered') }}
                </a> --}}

                <button type="submit" class="btn btn-warning">إنشاء حساب</button>
                <span>هل لديك حساب؟<a href="{{ route('login') }}" >تسجيل الدخول</a></span>

                {{-- <x-button class="mr-4">
                    {{ __('site.register') }}
                </x-button> --}}
            </div>
        </form>
    {{-- </x-authentication-card> --}}
</div>
@endsection