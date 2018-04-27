@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Make</div>
                    <div class="panel-body">
                        {{ Form::model($make, ['route' => ['adminMakesUpdate', $make->id], 'method' => 'put']) }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Make Name:') !!}
                            <div class="form-controls">
                                {{ Form::text('name', null, ['class'=>'form-control']) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                                {!!Form::label('type_id', 'Type')!!}
                                <div class="form-controls">
                                    {!!Form::select('type_id', $types, null, ['class'=>'form-control'])!!}
                                    @if ($errors->has('type_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
                            <a href="{{ route('adminMakes')}}">Cancel</a>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
