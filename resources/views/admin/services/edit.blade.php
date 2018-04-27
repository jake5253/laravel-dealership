@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Services</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Service</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->name }}</td>
                                    <td class="pull-right">
                                        <a href="" data-toggle="modal" data-target="{{"#".$service->id}}">
                                            <button class="btn btn-xs btn-danger">Delete</button>
                                        </a>
                                        <div id="{{$service->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title">Warning!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you sure want to delete this service?</p><br>
                                                        <h4>{{$service->name}}</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('adminServicesDelete', ['id' => $service->id] ) }}">
                                                            <button type="button" class="btn btn-danger">Yes</button>
                                                        </a>
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">No
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <hr>
                {{ Form::model($services, ['route' => ['adminServicesUpdate'], 'method' => 'put']) }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('add_service', 'New Service') !!}
                    <div class="form-controls">
                        {{ Form::text('name', null, ['class'=>'form-control']) }}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                {{ Form::submit('Add', ['class'=>'btn btn-primary']) }}
                <a href="{{ route('admin')}}">Cancel</a>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
