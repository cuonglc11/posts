@extends('layouts.app')

@section('content')

  <form  method="post">


                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Titile</label>

                        <div class="col-md-6">
                     
                            <input id="text" type="text" class="form-control @error('email') is-invalid @enderror" name="titie" value="{{$tities}}" autocomplete="email">
                         
                       
                             
                        </div>
                    </div>	
  <textarea style="height: 22px" name="nd">
    {{$new}}
  </textarea>
  <div>
  	<input type="radio" id="male" name="main_s" value="2">
<label for="male">Bài Chính</label><br>

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