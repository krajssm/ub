@extends('application/applayout')

@section('content')


@foreach ($applications as $key=>$value)
    The current value is {{ $value->title }}
    <br />
    <br />
@endforeach

{{$applications->links()}}


@stop
