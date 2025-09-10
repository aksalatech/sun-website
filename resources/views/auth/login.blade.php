@extends('layouts.admin.auth')
@section('title', 'Page Title')
@section('content')
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="d-flex flex-column flex-root" style="min-height: 100vh">
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white">
            <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: var(--app-primary-color);">
                <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                    <div class="flex justify-center mb-10">
                        <x-application-logo class="max-h-70px text-white" alt="" />
                    </div>
                    <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: var(--app-primary-dark-color);">Discover Amazing Cikal
                    <br />with great build tools</h3>
                </div>
                <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url({{ asset('assets/admin/images/background/login.svg')}})"></div>
            </div>
            <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                <div class="d-flex flex-column-fluid flex-center">
                    <div class="login-form login-signin">
                        <x-application-logo class="max-h-70px text-primary my-10" alt="" />
                        <form class="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">PT. Cirata Karya Lestari</h3>
                            </div>
                            <div class="form-group">
                                <x-input-label class="font-size-h6 font-weight-bolder text-dark" :value="__('Email')" />
                                <x-text-input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="email" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <x-input-label for="password" class="font-size-h6 font-weight-bolder text-dark pt-5" :value="__('Password')" />
                                </div>
                                <x-text-input id="password" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="password" autocomplete="off" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="pb-lg-0 pb-5">
                                <!-- Remember Me -->
                                <div class="block my-4">
                                    <div class="inline-flex items-center">
                                        <label for="remember_me" class="checkbox checkbox-inline checkbox-primary" :value="__('Remember me')">
                                            <input id="remember_me" type="checkbox" checked="checked" />
                                            <span></span>
                                        </label>
                                        <span class="ms-2 text-gray-600">{{ __('Remember me') }}</span>
                                    </div>
                                </div>
                                <x-primary-button class="btn btn-primary font-weight-bolder font-size-h6 px-20 py-4 my-3 mr-3">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-lg-start justify-content-center align-items-end mt-40">
                    <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                        <span class="mr-1">2024©</span>
                        <a href="{{ ENV('APP_URL') }}" target="_blank" class="text-dark-75 text-hover-primary">PT. Cirata Karya Lestari.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
