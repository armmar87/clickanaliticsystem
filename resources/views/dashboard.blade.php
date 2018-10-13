@extends('adminlte::page')

@section('title', 'Click Analytic')

@section('content_header')
    <div class="col-xs-12">
        <h2>Dashboard</h2>
    </div>
@stop

@section('content')
    <div class="col-xs-12">
        <h3 class="box-title">Sites</h3>
        <div class="form-group col-xs-6">
            <select class="form-control" id="selectSites">
                @foreach($sites as $site)
                    <option value="{{$site->id}}"
                            @if($loop->first) selected @endif>{{$site->site_page}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="form-group col-xs-12">
        <canvas id="myChart" width="800" height="300"></canvas>
    </div>
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('js')
    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        let chart = {!! $chart !!}
        chartInit(chart)
    </script>
@stop
