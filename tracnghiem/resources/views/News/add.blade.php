@extends('layouts.app')

@section('content')

  <form  method="post">
    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Titile</label>

                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control @error('email') is-invalid @enderror" name="titie" value="{{ old('email') }}" required autocomplete="email">

                       
                             
                        </div>
                    </div>	
  <textarea style="height: 22px" name="nd">
    @if($text == '')

    @else

     <p><video controls="controls" width="300" height="150"> 
    <source src="../video/{{$text}}" type="video/mp4" /></video></p>
    @endif
  </textarea>

  <div id="demo"></div>
  <div>
  	<input type="radio" id="male" name="draft" value="1">
<label for="male">draft</label><br>

  </div>
    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Add
                                </button>
                            </div>
                        </div>
                          {{csrf_field()}}
  </form>
 



@endsection