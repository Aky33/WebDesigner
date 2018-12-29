@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['action' => 'PostController@createSave']) }}
                {{ Form::token() }}
            
                <div class="card" style="margin-bottom: 25px">
                    <div class="card-header">
                        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('forms.title')]) }}
                    </div>
                    
                    <div class="card-body">
                        {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => trans('forms.content')]) }}
                    </div>
                    
                    <div class="card-footer">
                        {{ Form::submit(trans('forms.submit'), ['class' => 'btn-action form-control']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection