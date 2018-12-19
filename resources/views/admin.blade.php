@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 25px">
                <div class="card-header">
                    <span class="h3">{{ __('Users') }}</span>
                    <span class="" style="float: right">
                        <a href="{{ route('createUser') }}" style="margin-right: 5px">
                            <img src="{{ asset('images/personIcon.png') }}" alt="Create" class="icon">
                        </a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Username</td>
                                <td>Admin</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if($user->admin)
                                            {{ __('true') }}
                                        @else
                                            {{ __('false') }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                                <span class="caret"></span></button>
                                            <div class="dropdown-menu">
                                                @if($user->admin)
                                                    <input type="submit" class="dropdown-item" form="privilegia{{ $user->id }}" value="{{ __('Take admin privilegia') }}"> 
                                                @else
                                                    <input type="submit" class="dropdown-item" form="privilegia{{ $user->id }}" value="{{ __('Give admin privilegia') }}"> 
                                                @endif
                                                <input type="submit" class="dropdown-item" form="password{{ $user->id }}" value="{{ __('Reset password') }}"> 
                                                <input type="submit" class="dropdown-item" form="delete{{ $user->id }}" value="{{ __('Delete') }}"> 
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @foreach($users as $user)
                {{ Form::open(['action' => ['AdminController@changePrivilegia', $user->id], 'id' => 'privilegia'.$user->id]) }}
                {{ Form::token() }}
                {{ Form::close() }}
                
                {{ Form::open(['action' => ['AdminController@resetPassword', $user->id], 'id' => 'password'.$user->id]) }}
                {{ Form::token() }}
                {{ Form::close() }}
                
                {{ Form::open(['action' => ['AdminController@delete', $user->id], 'id' => 'delete'.$user->id]) }}
                {{ Form::token() }}
                {{ Form::close() }}
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection