@extends('layouts.app')

@section('content')
@foreach($post  as $data)




<a href="{{  url('/detail/'.$data->id_post) }}"><h1>{{$data->title}}</h1></a>
<h4>Tác Giả  :  {{$data->name}}</h4>
<h5>{{$data->time}}</h5>
<a href="{{  url('/edit/'.$data->id_post) }}"><h1>Edit</h1></a>
  @endforeach

@endsection