
@extends('layouts.master')
@section('tittle','Show Student')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <a href="{{ route('students.index') }}" class="btn btn-primary my-3" type="button">View Posts</a>
            <form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="">First Name</label>
                      <input type="text" class="form-control" name="first_name" value="{{ $student->first_name }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $student->last_name }}" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">AGe</label>
                        <input type="text" class="form-control" name="age" value="{{ $student->age }}" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Address</label>
                        {!! $student->address !!}
                      </div>
                    </div>
                  </div>
                  {{-- <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Class</label>
                        <input type="text" class="form-control" name="address" value="{!! $student->class->name !!}" disabled>
                      </div>
                    </div>
                  </div> --}}
              </form>
        </div>
    </div>
</div>
@endsection
@section('ck-editor')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
        document.getElementById("editor").disabled = true;
</script>

@endsection