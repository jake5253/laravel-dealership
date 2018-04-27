@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-20">
                <div class='border-top margin-top'>
                    <div class="col-md-10">
                        <section id="about">
                            <div class="row">
                                <div class="col-md-8">
                                    <div style="margin-top:20px; width:100%;" class="panel-info">
                                        <div class="panel clearfix">
                                            <strong>We offer the following services! </strong><br/>
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
                </div>
            </div>
        </div>
    </div>


@endsection
