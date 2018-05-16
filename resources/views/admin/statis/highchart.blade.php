@extends('layouts.app')
@section('content')
    <h1><i class="fa fa-pie-chart"></i> Chart Nilai</h1><hr>

        <div id="chart" style="width:100%"></div>
        @piechart('Nilai', 'chart')
    <hr>
@stop