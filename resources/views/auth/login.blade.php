@extends('layouts.master')

@section('content')
    <div class="register-page">
        <div class="wrapper-header">
            <a class="nav-link signin" href="{{ url('/') }}">Back</a>
        </div>

        <div class="register-content">
            <div class="container">
                <h2 class="register-heading text-center">Login</h2>

                <div class="register-form-wrapper">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-item">
                                <p>Email</p>

                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-item">
                                <p>Password</p>

                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-button">
                            <button class="nav-link signin" type="submit" value="Submit">Sign In</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
