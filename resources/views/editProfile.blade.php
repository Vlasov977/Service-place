@extends('layouts.master')

@section('content')
    <div class="register-page">

        <div class="wrapper-header">
            <a class="nav-link signin" href="{{ url('/profile') }}">Back</a>
        </div>

        <div class="register-content">
            <div class="container">
                <h2 class="register-heading text-center">Edit Profile</h2>

                <div class="register-form-wrapper">
                    <form method="post" action="{{ action('WelcomeController@updateProfile', $user) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-item">
                                <p>Profile photo</p>
                                <input type="file" name="avatar" id="file" class="upload" />
                                <label for="file">Choose a file</label>
                            </div>
                            <div class="form-item">
                                <p>Email</p>

                                <input disabled="disabled" value="{{ $user->email }}" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                                <p>First name</p>

                                <input value="{{ $user->name }}" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-item">
                                <p>Last name</p>

                                <input value="{{ $user->lastName }}" id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lastName') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                                <p>Password</p>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-item">
                                <p>Confirm password</p>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-button">
                            <button class="nav-link signin" type="submit" value="Submit">{{ __('Edit') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

