@extends('layouts.app')

@section('content')
  <button type="button" class="btn btn-primary"><a href="{{ url('add')}}" style="color: #fff">Add Video</a></button>
  <br>
@foreach($video  as $video)
<a href="{{  url('/video/'.$video->video)}}">{{$video->video}}</a>
<br>
@endforeach

@endsection
