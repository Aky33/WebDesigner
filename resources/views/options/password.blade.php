@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ Form::open(['action' => 'UserController@passwordSave']) }}
                {{ Form::token() }}
            
                <div class="card" style="margin-bottom: 25px">
                    <div class="card-header">
                        {{ trans('headers.password') }}
                    </div>
                    
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('oldPassword', trans('forms.oldPassword')) }}
                            {{ Form::password('oldPassword', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('newPassword', trans('forms.newPassword')) }}
                            {{ Form::password('newPassword', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('newPassword_confirmation', trans('forms.newPassword')) }}
                            {{ Form::password('newPassword_confirmation', ['class' => 'form-control']) }}
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