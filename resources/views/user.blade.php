@extends('layouts.master')

@section('css')

@endsection

@section('content')

    <div class="register-page">

        <div class="wrapper-header">
            <a class="nav-link signin" href="{{ url('/') }}">Home</a>
        </div>

        <div class="profile-content">
            <div class="wrapper-profile-avatar">
                <p>
                    @if($user->avatar && $user->avatar != "users/default.png")
                        <img class="img-fluid" src="{{ asset($user->avatar) }}" alt="{{ $user->name }}">
                    @endif
                </p>

                <p class="profile-username">{{ $user->name }}</p>
            </div>

            <div class="wrapper-social-links">
                <div class="social-links">
                    <div class="social-link social-link-thead @if(empty($user->social->instagram) && empty($user->social->facebook) && empty($user->social->vk) && empty($user->social->linkedIn) && empty($user->social->telegram) && empty($user->social->viber) && empty($user->social->whatsApp)) empty @endif">
                        <p class="social-link-thead-name">Social links</p>
                    </div>

                    @if(isset($user->social->instagram) && !empty($user->social->instagram))
                        <div class="social-link">
                            <p class="social-link-name">Instagram</p>
                            <p class="social-link-src"><a href="{{ $user->social->instagram }}">{{ $user->social->instagram }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->facebook) && !empty($user->social->facebook))
                        <div class="social-link">
                            <p class="social-link-name">Facebook</p>
                            <p class="social-link-src"><a href="{{ $user->social->facebook }}">{{ $user->social->facebook }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->vk) && !empty($user->social->vk))
                        <div class="social-link">
                            <p class="social-link-name">VK</p>
                            <p class="social-link-src"><a href="{{ $user->social->vk }}">{{ $user->social->vk }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->linkedIn) && !empty($user->social->linkedIn))
                        <div class="social-link">
                            <p class="social-link-name">LinkedIn</p>
                            <p class="social-link-src"><a href="{{ $user->social->facebook }}">{{ $user->social->facebook }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->telegram) && !empty($user->social->telegram))
                        <div class="social-link">
                            <p class="social-link-name">Telegram</p>
                            <p class="social-link-src"><a href="{{ $user->social->telegram }}">{{ $user->social->telegram }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->viber) && !empty($user->social->viber))
                        <div class="social-link">
                            <p class="social-link-name">Viber</p>
                            <p class="social-link-src"><a href="{{ $user->social->viber }}">{{ $user->social->viber }}</a></p>
                        </div>
                    @endif

                    @if(isset($user->social->whatsApp) && !empty($user->social->whatsApp))
                        <div class="social-link">
                            <p class="social-link-name">WhatsApp</p>
                            <p class="social-link-src"><a href="{{ $user->social->whatsApp }}">{{ $user->social->whatsApp }}</a></p>
                        </div>
                    @endif

                </div>
            </div>


            <div class="social-links">
                <div class="social-link social-link-thead">
                    <p class="social-link-thead-name">Posts</p>
                </div>

                @foreach($user->posts as $post)
                    <div class="social-link users-posts @if($loop->last) social-link-last @endif">
                        <p class="social-link-name"><a href="{{ url('/post/' . $post->id) }}">{{ $post->title }}</a></p>
                        <p class="social-link-src">{{ $post->description }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection


@section('scripts')

@endsection
