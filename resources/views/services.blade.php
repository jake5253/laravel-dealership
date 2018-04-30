@extends('layouts.app')

@section('content')
    <div class="container">
        <section id="about">
            <div class="row">
                <div class="col-md-8">
                    <div style="margin-top:20px; width:100%;" class="panel-info">
                        <div class="panel" style=" padding:10px; display: inline-block">
                            <strong>We offer the following great services! </strong><br/>
                            <ul>
                                @foreach($services as $service)
                                    <li>{{$service->name}}</li>
                                @endforeach
                            </ul>
                            <a href="{{route('about')}}">Call or stop by today!</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
