<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <h3 class="text-center text-bold pt-5">{{ __('Register') }}</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-md-6">
                            <input id="name" type="text"
                                class="form-control border-dark @error('name') is-invalid @enderror" name="name"
                                placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-md-6">
                            <input id="email" type="email"
                                class="form-control border-dark @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control border-dark @error('password') is-invalid @enderror"
                                placeholder="Password" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 d-flex justify-content-center">
                        <div class="col-md-6">
                            <input id="password-confirm" placeholder="Password Confirm" type="password"
                                class="form-control border-dark" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
