@extends('layouts.app')

@section('content')

<form method="post" enctype="multipart/form-data">
              <label for="email" class="col-md-4 col-form-label text-md-right">video</label>

    <input type="file" name="file">
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