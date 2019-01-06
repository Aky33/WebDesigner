@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 25px">
                <div class="card-header">
                    <span class="h3">{{ trans('headers.menu') }}</span>
                </div>

                <div class="card-body">
                    <div class="margin-bottom">
                        <a href="{{ route('posts.home') }}">
                            <button class="btn btn-action btn-menu">
                                <h4>{{ trans('nav.posts') }}</h4>
                            </button>
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('pics.home') }}">
                            <button class="btn btn-action btn-menu">
                                <h4>{{ trans('nav.images') }}</h4>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection