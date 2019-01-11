@extends('layouts.master')

@section('css')

@endsection

@section('content')

    <header class="masthead">
        <div class="overlay"></div>

        <div class="intro">
            <div class="container">

                <div class="wrapper-logo-user">
                    <p>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            @if(setting('site.logo'))
                                <img src="{{ asset('storage/' . setting('site.logo')) }}" alt="">
                            @else
                                LOGO
                            @endif
                        </a>
                    </p>
                    <p>

                    <p>
                        <a href="{{ url('/language/en') }}"
                          class="nav-item-child nav-item-hover language  @if ( Config::get('app.locale') == 'en') active-language @endif">
                            @lang('messages.menu.language.en')
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('/language/ru') }}"
                           class="nav-item-child nav-item-hover language @if ( Config::get('app.locale') == 'ru') active-language @endif">
                            @lang('messages.menu.language.ru')
                        </a>
                    </p>

                    <ul class="navbar-nav ml-auto">

                        <a href="{{ url('/language/ru') }}"
                           class="nav-item-child nav-item-hover language @if ( Config::get('app.locale') == 'ru') active-language @endif">
                            @lang('messages.menu.language.ru')
                        </a>



                        @guest
                            <li class="nav-item">
                                <a class="nav-link signin" href="{{ route('login') }}">@lang('messages.menu.signIN')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link signin" href="{{ route('register') }}">@lang('messages.menu.signUp')</a>
                            </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('profile') }}">Profile</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                    </ul>
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <div class="site-heading">
                            <h1>{{ setting('site.title') }}</h1>
                            <span class="subheading">{{ setting('site.description') }}</span>

                            <form class="search-form" action="{{ action('PostsController@search') }}">
                                <input name="search" type="text" class="form-control"
                                       placeholder="What do you want to find?">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="wrapper-content">
        <div class="container">
            <div class="row">
                @if(Request::is('search'))
                    <p class="search-helper">We found {{ $posts->total() }} posts<span
                                class="search-helper-keyword"> "{{ $search }}" </span>
                    </p>
                @else
                    <p class="search-helper">We found {{ $posts->total() }} latests posts</p>
                @endif
            </div>
        </div>

        <div class="posts-container">
            <div class="item-list row no-marg">

                @foreach($posts as $post)
                    <div class="animated fadeInUp service col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="service-item">
                            <a href="{{ url('post/' . $post->id ) }}" class="service-item-title-link">
                                <p class="service-item-title">{{ $post->title }}</p>
                            </a>
                            <p class="service-item-descr">{{ mb_strimwidth($post->description, 0, 100, " ...") }}</p>
                            <div class="service-wrapper-user">
                                <a href="{{ url( '/user/' . $post->user->id) }}">

                                    @if($post->user->avatar)
                                        <img class="service-logo" src="{{ asset($post->user->avatar) }}" alt="">
                                    @endif
                                </a>
                                <a class="service-username" href="{{ url('user/' . $post->user->id) }}">
                                    <p>{{ $post->user->name }}</p>
                                </a>
                                <a class="service-userarrow" href="{{ url('user/' . $post->user->id) }}">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="wrapper-pagination">
                    {{ $posts->links() }}
                </div>


            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection