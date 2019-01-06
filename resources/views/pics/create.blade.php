@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['action' => 'ImageController@createSave', 'files' => true]) }}
                {{ Form::token() }}
            
                <div class="card" style="margin-bottom: 25px">
                    <div class="card-header">
                        {{ trans('headers.createImage') }}
                    </div>
                    
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('image', trans('forms.imageUpload')) }}
                            {{ Form::file('image', ['class' => 'form-control-file border']) }}
                        </div>
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