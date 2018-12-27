@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['action' => 'AdminController@createSave']) }}
                {{ Form::token() }}
            
                <div class="card" style="margin-bottom: 25px">
                    <div class="card-header">
                        {{ trans('headers.createUser') }}
                    </div>
                    
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('name', trans('forms.username')) }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('admin', trans('forms.admin')) }}
                            {{ Form::select('admin', [0 => 'User', 1 => 'Admin'], 0, ['class' => 'form-control']) }}
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