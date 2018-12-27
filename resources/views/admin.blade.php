@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 25px">
                <div class="card-header">
                    <span class="h3">{{ trans('headers.users') }}</span>
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
                                <th>{{ trans('locale.username') }}</th>
                                <th>{{ trans('locale.admin') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if($user->admin)
                                            {{ trans('locale.true') }}
                                        @else
                                            {{ trans('locale.false') }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ trans('locale.action') }}
                                                <span class="caret"></span></button>
                                            <div class="dropdown-menu">
                                                @if($user->admin)
                                                    <input type="submit" class="dropdown-item" form="privilegia{{ $user->id }}" value="{{ trans('locale.takeAdmin') }}"> 
                                                @else
                                                    <input type="submit" class="dropdown-item" form="privilegia{{ $user->id }}" value="{{ trans('locale.giveAdmin') }}"> 
                                                @endif
                                                <input type="submit" class="dropdown-item" form="password{{ $user->id }}" value="{{ trans('locale.resetPassword') }}"> 
                                                <input type="submit" class="dropdown-item" form="delete{{ $user->id }}" value="{{ trans('locale.delete') }}"> 
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