@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 25px">
                <div class="card-header">
                    <span class="h3">{{ trans('headers.image') }}</span>
                </div>

                <div class="card-body">
                    <a href="{{ route('pics.create') }}">
                        <button class="btn btn-action">
                            {{ trans('locale.newImage') }}
                        </button>
                    </a>
                </div>
            </div>
            
            @foreach($files as $file)
                <div class="card" style="margin-bottom: 25px">
                    <div class="card-header">
                        <span class="h3">{{ $file }}</span>
                        <span class="row" style="float: right">
                            <a style="margin-right: 10px">
                                <input type="image" form="{{ $file }}" src="{{ asset('images/deleteIcon.png') }}" alt="Delete" class="icon">                            
                            </a>
                        </span>
                    </div>
                    
                    <div class="card-body">
                        <img src="{{ \Storage::url("app/".$dir."/".$file) }}" alt="image">
                    </div>
                </div>
            
                {{ Form::open(['action' => ['ImageController@delete', $file], 'id' => $file]) }}
                {{ Form::token() }}
                {{ Form::close() }}
            @endforeach
        </div>
    </div>
</div>
@endsection
