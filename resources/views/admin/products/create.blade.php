@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Listing</div>

                    <div class="panel-body">
                        {{Form::open(['route'=>'adminProductsStore', 'files' => true])}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Product Name') !!}
                            <div class="form-controls">
                                {{ Form::text('name', null, ['class'=>'form-control']) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('photo*') ? ' has-error' : '' }}">
                            {!! Form::label('photo', 'Photos') !!}
                            <div class="form-controls">
                                {{ Form::file('photo[]', ['multiple', 'class'=>'form-control']) }}
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        @foreach ($errors->get('photo') as $error)
                                            @if ($error == "The photo field is required.")
                                                <strong>You must upload at least one photo</strong>
                                            @endif
                                        @endforeach
                                    </span>
                                @endif
                                @if ($errors->has('photo.*'))
                                    <span class="help-block">
                                         <strong>{{$errors->first('photo.*')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mileage') ? ' has-error' : '' }}">
                            {!! Form::label('mileage', 'Mileage') !!}
                            <div class="form-controls">
                                {{ Form::text('mileage', null, ['class'=>'form-control']) }}
                                @if ($errors->has('mileage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mileage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            {!! Form::label('color', 'Color') !!}
                            <div class="form-controls">
                                {{ Form::text('color', null, ['class'=>'form-control']) }}
                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            {!! Form::label('year', 'Year') !!}
                            <div class="form-controls">
                                {{ Form::text('year', null, ['class'=>'form-control']) }}
                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('transmission') ? ' has-error' : '' }}">
                            {!! Form::label('transmission', 'Transmission') !!}
                            <div class="form-controls">
                                {{ Form::text('transmission', null, ['class'=>'form-control']) }}
                                @if ($errors->has('transmission'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('transmission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('fuel_type') ? ' has-error' : '' }}">
                            {!! Form::label('fuel_type', 'Fuel Type') !!}
                            <div class="form-controls">
                                {{ Form::text('fuel_type', null, ['class'=>'form-control']) }}
                                @if ($errors->has('fuel_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fuel_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', 'Description') !!}
                            <div class="form-controls">
                                {{ Form::textarea('description', null, ['class'=>'form-control']) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            {!! Form::label('price', 'Price') !!}
                            <div class="form-controls">
                                {{ Form::text('price', null, ['class'=>'form-control']) }}
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            {!! Form::label('typ', 'Type') !!} <a href="{{route('adminTypesCreate')}}">new</a>
                            <div class="form-controls">
                                <select name="type" class="form-controls">
                                    <option value="{{old('type')}}">--Select Type--</option>
                                    @foreach ($types as $type => $value)
                                        <option value="{{ $type }}"> {{ $value }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            {!! Form::label('cate', 'Make') !!} <a href="{{route('adminCategoriesCreate')}}">new</a>
                            <div class="form-controls">
                                <select name="category_id" class="form-controls">
                                    <option value="{{old('category_id')}}">--Category--</option>
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controls">
                                {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                                <a href="{{ route('home') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection