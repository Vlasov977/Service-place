@extends('layouts.master')

@section('css')

@endsection

@section('content')

<div class="register-page">

    <div class="wrapper-header">
        <a class="nav-link signin" href="{{ url('/profile') }}">Back</a>
    </div>

    <div class="register-content">
        <div class="container">
            <h2 class="register-heading text-center">Social Links</h2>

            <div class="register-form-wrapper">
                <form method="post" action="{{ action('WelcomeController@social_update') }}">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-item">
                            <p><i class="fab fa-facebook-f"></i> Facebook</p>
                            <input name="facebook" value="@if(isset($socials->facebook)) {{ $socials->facebook }} @endif" type="text"/>

                            @if ($errors->has('facebook'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-item">
                            <p><i class="fab fa-viber"></i> Viber</p>
                            <input name="viber" value="@if(isset($socials->viber)) {{ $socials->viber }} @endif" type="text">

                            @if ($errors->has('viber'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('viber') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-item">
                            <p><i class="fab fa-telegram-plane"></i> Telegram</p>
                            <input name="telegram" value="@if(isset($socials->telegram)) {{ $socials->telegram }} @endif" type="text">

                            @if ($errors->has('telegram'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telegram') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-item">
                            <p><i class="fab fa-vk"></i> VK</p>
                            <input name="vk" value="@if(isset($socials->vk)) {{ $socials->vk }} @endif" type="text">

                            @if ($errors->has('vk'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vk') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item">
                            <p><i class="fab fa-linkedin-in"></i> LinkedIn</p>
                            <input name="linkedIn" value="@if(isset($socials->linkedIn)) {{ $socials->linkedIn }} @endif" type="text">

                            @if ($errors->has('linkedIn'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('linkedIn') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-item">
                            <p><i class="fab fa-instagram"></i> Instagram</p>
                            <input name="instagram" value="@if(isset($socials->instagram)) {{ $socials->instagram }} @endif" type="text">

                            @if ($errors->has('instagram'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('instagram') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item">
                            <p><i class="fab fa-whatsapp"></i> WhatsApp</p>
                            <input name="whatsApp" value="@if(isset($socials->whatsApp)) {{ $socials->whatsApp }} @endif" type="text">

                            @if ($errors->has('whatsApp'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('whatsApp') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-button">
                        <button class="nav-link signin" type="submit" value="Submit">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
