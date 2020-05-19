@extends('layouts.app')

@section('content')
  <button type="button" class="btn btn-primary"><a href="{{ url('News')}}" style="color: #fff">Add</a></button>
@foreach($post  as $data)


<a href="{{  url('/detail/'.$data->id_post) }}"><h1>{{$data->title}}</h1></a>
<h4>Tác Giả  :  {{$data->name}}</h4>
<h5>{{$data->time}}</h5>

  @endforeach


@endsection