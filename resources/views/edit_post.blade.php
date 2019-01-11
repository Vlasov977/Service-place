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

            <div class="register-form-wrapper new-post-wrapper">
                <form method="post" action="{{ action('PostsController@updatePost', $post->id) }}">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="form-item">
                            <p>Title of the post</p>
                            <input value="{{ $post->title }}" name="title" type="text" class="{{ $errors->has('title') ? ' is-invalid' : '' }}"/>

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
                            <textarea name="description" type="text" class="{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ $post->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item">
                            <p class="prices-description-text">Below the post was successfully published, please Deposit
                                the amount at billing. </p>
                            <div class="prices-block">
                                <p>1 month - $10</p>
                                <p>6 month - $30</p>
                                <p>12 month - $50</p>
                            </div>

                            <div class="wrapper-blocks-payment">
                                <p class="prices-description-text">Choose your payment system:</p>
                                <div class="blocks-payment">
                                    <p class="payment-item"><a href="#">P</a></p>
                                    <p class="payment-item"><a href="#">V</a></p>
                                    <p class="payment-item"><a href="#">PP</a></p>
                                    <p class="payment-item"><a href="#">V</a></p>
                                </div>
                                <div class="payment-number-card">
                                    <p class="number-card"></p>
                                </div>

                                <div class="wrapper-code">
                                    <p class="code-number">{{ $post->code }}</p>
                                </div>

                                <p class="card"></p>
                            </div>

                            <p class="prices-description-text">In the comments to the translation, please indicate your personal code. </p>
                            <p class="text-center">Attention! If this is not done, the post will not be published.</p>
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


@section('scripts')

@endsection