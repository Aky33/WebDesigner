@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card" style="margin-bottom: 25px">
                    <div class="card-header">
                        {{ trans('headers.language') }}
                    </div>
                    
                    <div class="card-body">
                        <a href="{{ route('langSelect', ['locale' => 'cs']) }}">
                            {{ trans('langs.czech') }}
                        </a>
                        <a href="{{ route('langSelect', ['locale' => 'en']) }}">
                            {{ trans('langs.english') }}
                        </a>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection