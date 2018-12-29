@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 25px">
                <div class="card-header">
                    <span class="h3">{{ trans('headers.action') }}</span>
                </div>

                <div class="card-body">
                    <a href="{{ route('posts.create') }}">
                        <button class="btn btn-action">
                            {{ trans('locale.newActuality') }}
                        </button>
                    </a>
                </div>
            </div>
            
            @foreach($posts as $post)
                <div class="card" style="margin-bottom: 25px">
                    <div class="card-header">
                        <span class="h3">{{ $post->title }}</span>
                        <span class="row" style="float: right">
                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" style="margin-right: 5px">
                                <img src="{{ asset('images/editIcon.png') }}" alt="Edit" class="icon">
                            </a>
                            <a style="margin-right: 10px">
                                <input type="image" form="delete{{ $post->id }}" src="{{ asset('images/deleteIcon.png') }}" alt="Delete" class="icon">                            
                            </a>
                        </span>
                    </div>
                    
                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            
                {{ Form::open(['action' => ['PostController@delete', $post->id], 'id' => 'delete'.$post->id]) }}
                {{ Form::token() }}
                {{ Form::close() }}
            @endforeach
        </div>
    </div>
</div>
@endsection
