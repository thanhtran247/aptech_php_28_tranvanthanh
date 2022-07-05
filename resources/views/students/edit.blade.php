@extends('layouts.master')
@section('tittle','Edit')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{route('students.update', ['student' => $student->id]) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <span>First Name</span>
                      <input type="text" class="form-control" name="first_name" value="{{$student->first_name}}">
                      @if ($errors->has('first_name'))
                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                  @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <span>LastName</span>
                        <input type="text" class="form-control" name="last_name" value="{{$student->last_name}}">
                        @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <span>Age</span>
                        <input type="text" class="form-control" name="age" value="{{$student->age}}">
                        @if ($errors->has('age'))
                        <span class="text-danger">{{ $errors->first('age') }}</span>
                    @endif
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="editor">Address</label>
                        <textarea class="form-control" id="editor" name="address" rows="10">{!! $student->address !!}</textarea>
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                      </div>
                    </div>
                  </div>
                <button class="btn btn-primary" type="submit">Update Student</button>
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
        
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
@endsection