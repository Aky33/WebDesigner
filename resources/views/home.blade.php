@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="card" style="margin-bottom: 25px">
                    <div class="card-header">
                        <span class="h3">{{ $post->title }}</span>
                        <span class="" style="float: right">
                            <a href="{{ route('edit', ['id' => $post->id]) }}" style="margin-right: 5px">
                                <img src="{{ public_path('images/editIcon.png') }}" alt="Edit">
                            </a>
                            <a>
                                <input type="image" form="delete{{ $post->id }}" src="{{ public_path('images/deleteIcon.png') }}" alt="Delete">                            
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
