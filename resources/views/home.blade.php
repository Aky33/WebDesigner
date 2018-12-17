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
                                <img src="{{ public_path('images/edit.jpg') }}" alt="Edit" class="icon">
                            </a>
                            <a href="{{ route('delete', ['id' => $post->id]) }}">
                                <img src="{{ public_path('images/delete.jpg') }}" alt="Delete" class="icon">
                            </a>
                        </span>
                    </div>
                    
                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
