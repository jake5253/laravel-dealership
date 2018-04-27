@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of type
                        <div class="pull-right"><a href="{{ route('adminTypesCreate') }}">
                                <button class="btn btn-xs btn-primary">Create new type</button>
                            </a></div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('adminTypesEdit', ['id' => $type->id] ) }}">
                                            <button class="btn btn-xs btn-primary">Edit</button>
                                        </a>
                                        <a href="" data-toggle="modal" data-target="{{"#".$type->id}}">
                                            <button class="btn btn-xs btn-danger">Delete</button>
                                        </a>
                                        <div id="{{$type->id}}" class="modal fade" role="dialog">
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
                                                        <p>Do you sure want to delete this make?</p><br>
                                                        <h4>{{$type->name}}</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('adminTypesDelete', ['id' => $type->id] ) }}">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
