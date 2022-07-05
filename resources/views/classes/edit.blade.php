
@extends('layouts.master')
@section('tittle','Index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('classes.update', ['class' => $class->id]) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      name: 
                      <input type="text" class="form-control" name="name" value="{{ old('name', $class->name) }}">
                      @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      Description: <textarea type="text" class="form-control" id="editor" name="description">{{ old('description', $class->description) }}</textarea>
                      @if ($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Update Category</button>
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

@endsection