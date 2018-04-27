@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update product</div>
                    <div class="panel-body">
                        {{ Form::open(['route'=>[ 'adminProductsUpdate', $product->id ], 'method' => 'put', 'files' => true]) }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Product Name') !!}
                            <div class="form-controls">
                                {{ Form::text('name', $product->name, ['class'=>'form-control']) }}
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
                        <div class="form-group">
                            <div class="form-controls">

                                <table class="table table-striped">
                                    <tr>
                                        @foreach ($product->productimages as $image)
                                            <th>
                                                <img class="img-responsive img-thumbnail"
                                                     src="{{ asset($image->thumbnail) }}" alt="noImage"
                                                     style="width: 200px;height: 200px"><br/>
                                                @if ($image->default == 0 )
                                                    <a href="{{ route('adminImageDefault', ['product' => $product->id, 'id' => $image->id] ) }}">
                                                        <button type="button" class="btn btn-xs btn-primary">Set as
                                                            Default
                                                        </button>
                                                    </a>
                                                @endif
                                                <a href="" data-toggle="modal" data-target="{{"#".$image->id}}">
                                                    <button class="btn btn-xs btn-danger">Delete</button>
                                                </a>
                                                <div id="{{$image->id}}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                                <h4 class="modal-title">Warning!</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do you sure want to delete this image?</p><br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ route('adminProductsImageDelete', ['id' => $image->id] ) }}">
                                                                    <button type="button" class="btn btn-danger">Yes
                                                                    </button>
                                                                </a>
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">No
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        @endforeach
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mileage') ? ' has-error' : '' }}">
                            {!! Form::label('mileage', 'Mileage') !!}
                            <div class="form-controls">
                                {{ Form::text('mileage', $product->mileage, ['class'=>'form-control']) }}
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
                                {{ Form::text('color', $product->color, ['class'=>'form-control']) }}
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
                                {{ Form::text('year', $product->year, ['class'=>'form-control']) }}
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
                                {{ Form::text('transmission', $product->transmission, ['class'=>'form-control']) }}
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
                                {{ Form::text('fuel_type', $product->fuel_type, ['class'=>'form-control']) }}
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
                                {{ Form::textarea('description', $product->description, ['class'=>'form-control']) }}
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
                                {{ Form::text('price', $product->price, ['class'=>'form-control']) }}
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
                                    <option value="{{$product->category->type->id}}">-{{$product->category->type->name}}
                                        -
                                    </option>
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
                                    <option value="{{$product->category->id}}">-{{$product->category->name}}-</option>
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
                                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                                <a href="{{ route('adminProducts') }}">Cancel</a>
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