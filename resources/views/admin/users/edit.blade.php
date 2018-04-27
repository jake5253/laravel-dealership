@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update User</div>
                    <div class="panel-body">
                        {{ Form::open(['route' => ['adminUserUpdate', $user->id], 'method' => 'put']) }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name:') !!}
                            <div class="form-controls">
                                {{ Form::text('name', $user->name, ['class'=>'form-control']) }}
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email Address:') !!}
                            <div class="form-controls">
                                {{ Form::text('email', $user->email, ['class'=>'form-control']) }}
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            {!!  Form::label('current_password', 'Current Password') !!}
                            <div class="form-controls">
                                {{ Form::password('current_password', ['class'=>'form-control']) }}
                            </div>
                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password:') !!}
                            <div class="form-controls">
                                {{ Form::password('password', ['class'=>'form-control']) }}
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                            {!! Form::label('confirm_password', 'Confirm Password:') !!}
                            <div class="form-controls">
                                {{ Form::password('confirm_password', ['class'=>'form-control']) }}
                            </div>
                            @if ($errors->has('confirm_password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        {{ Form::hidden('user_id', $user->id) }}
                        {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
                        <a href="{{ route('adminUsers')}}">Cancel</a>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
