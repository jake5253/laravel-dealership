@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of Makes
                        <div class="pull-right"><a href="{{ route('adminMakesCreate') }}">
                                <button class="btn btn-xs btn-success">Add Make</button>
                            </a></div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($makes as $make)
                                <tr>
                                    <td>{{ $make->id }}</td>
                                    <td>{{ $make->name }}</td>
                                    @if (!empty($make->type))
                                        <td>{{ $make->type->name }}</td>
                                    @endif
                                    <td class="text-right">
                                        <a href="{{ route('adminMakesEdit', ['id' => $make->id] ) }}">
                                            <button class="btn btn-xs btn-primary">Edit</button>
                                        </a>
                                        <a href="" data-toggle="modal" data-target="{{"#".$make->id}}">
                                            <button class="btn btn-xs btn-danger">Delete</button>
                                        </a>
                                        <div id="{{$make->id}}" class="modal fade" role="dialog">
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
                                                        <h4>{{$make->name}}</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('adminMakesDelete', ['id' => $make->id] ) }}">
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
                        {!! $makes->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
