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
                <h2 class="register-heading text-center">Add New Post</h2>


                <form class="newpostform" method="post" action="{{ action('PostsController@storePost') }}">
                    {{ csrf_field() }}
                    <div class="register-form-wrapper new-post-wrapper">


                        <div class="form-row">
                            <div class="form-item">
                                <p>Title of the post</p>
                                <input name="title" type="text"
                                       class="{{ $errors->has('title') ? 'is-invalid' : '' }}"/>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                                <p>Description</p>
                                <textarea name="description" type="text"
                                          class="{{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                                <p class="prices-description-text">Below the post was successfully published, please
                                    Deposit
                                    the amount at billing. </p>
                                <div class="prices-block">
                                    <p>1 month - $10</p>
                                    <p>6 month - $30</p>
                                    <p>12 month - $50</p>
                                </div>

                                <div class="wrapper-blocks-payment">
                                    <p class="prices-description-text">Payment card number:</p>

                                    <div class="cards">
                                        <div class="wrapper-code">
                                            <p class="code-number">{{ setting('site.card') }}</p>
                                        </div>
                                    </div>

                                    <div class="wrapper-code">
                                        <p class="code-number">{{ \Illuminate\Support\Facades\Auth::user()->code }}</p>
                                    </div>
                                </div>

                                <p class="prices-description-text">In the comments to the translation, please indicate
                                    your personal code. </p>
                                <p class="text-center">Attention! If this is not done, the post will not be
                                    published.</p>
                            </div>
                        </div>

                        <div class="form-button">
                            <button class="nav-link signin" type="submit" value="Submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
@endsection


@section('scripts')
    {{--<script>--}}
        {{--$('.choose-card').on('click', function () {--}}
            {{--$('.cards').toggleClass('show-items');--}}
        {{--});--}}
    {{--</script>--}}
@endsection