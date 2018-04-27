@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update About Page</div>
                    <div class="panel-body">
                        {{ Form::model($about, ['route' => ['adminAboutUpdate'], 'method' => 'put', 'files' => true]) }}
                        <div class="form-group{{ $errors->has('shop_name') ? ' has-error' : '' }}">
                            {!! Form::label('shop_name', 'Shop Name') !!}
                            <div class="form-controls">
                                {{ Form::text('shop_name', $about->shop_name, ['class'=>'form-control']) }}
                                @if ($errors->has('shop_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shop_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('owner_name') ? ' has-error' : '' }}">
                            {!! Form::label('owner_name', 'Owner Name') !!}
                            <div class="form-controls">
                                {{ Form::text('owner_name', $about->owner_name, ['class'=>'form-control']) }}
                                @if ($errors->has('owner_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('owner_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email') !!}
                            <div class="form-controls">
                                {{ Form::text('email', $about->email, ['class'=>'form-control']) }}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            {!! Form::label('phone', 'Phone') !!}
                            <div class="form-controls">
                                {{ Form::text('phone', $about->phone, ['class'=>'form-control']) }}
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                            {!! Form::label('fax', 'Fax', ['rel'=>'tooltip', 'title'=>'If you do not set a fax number, field will be hidden']) !!}
                            <div class="form-controls">
                                {{ Form::text('fax', $about->fax, ['rel'=>'tooltip', 'title'=>'If you do not set a fax number, field will be hidden', 'class'=>'form-control']) }}
                                @if ($errors->has('fax'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {!! Form::label('address', 'Address') !!}
                            <div class="form-controls">
                                {{ Form::textarea('address', $about->address, ['style' => 'resize:none', 'size' => '20x2', 'class'=>'form-control']) }}
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
                            {!! Form::label('hours', 'Business Hours') !!}
                            <div class="form-controls">
                                {{ Form::textarea('hours', $about->hours, ['style' => 'resize:none', 'size' => '20x3', 'class'=>'form-control']) }}
                                @if ($errors->has('hours'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hours') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', 'Description/Mission Statement') !!}
                            <div class="form-controls">
                                {{ Form::textarea('description', $about->description, ['class'=>'form-control']) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            {!! Form::label('photo', 'Shop Photo') !!}
                            <div class="form-controls">
                                {{ Form::file('photo', ['class'=>'form-control']) }}
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                            {!! Form::label('banner', 'Banner') !!}
                            <div class="form-controls">
                                {{ Form::file('banner', ['class'=>'form-control']) }}
                                @if ($errors->has('banner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banner') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('gmap') ? ' has-error' : '' }}">
                            {!! Form::label('gmap', 'Google Map Link',['rel'=>'tooltip','title'=>'To get this value, go to Google Maps, search for address, click Share, click "Embed a map", then "COPY HTML". Paste the entire string here.']) !!}
                            <div class="form-controls">
                                {{ Form::text('gmap', $about->gmap, ['rel'=>'tooltip','title'=>'To get this value, go to Google Maps, search for address, click Share, click "Embed a map", then "COPY HTML". Paste the entire string here.', 'class'=>'form-control']) }}
                                @if ($errors->has('gmap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gmap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <iframe src="{{$about->gmap}}" width="600" height="450" frameborder="0" style="border:0"
                                allowfullscreen></iframe>
                        <hr>
                        {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
                        <a href="{{ route('admin')}}">Cancel</a>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("[rel=tooltip]").tooltip({placement: 'top'});
        });
    </script>
@endsection
