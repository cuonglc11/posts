@foreach($video as $video)
<video width="400" controls>
  <source src="{{asset('video/'.$video->video)}}" type="video/mp4">

</video>
@endforeach

