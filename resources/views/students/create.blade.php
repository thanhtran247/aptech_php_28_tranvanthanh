@extends('layouts.master')
@section('tittle','Create Student')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('students.store') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <span>First name</span>
                      <input type="text" class="form-control" name="first_name">
                      @if ($errors->has('first_name'))
                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <span>First name</span>
                        <input type="text" class="form-control" name="last_name">
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
                        <input type="text" class="form-control" name="age">
                        @if ($errors->has('age'))
                        <span class="text-danger">{{ $errors->first('age') }}</span>
                      @endif
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        Address: <textarea type="text" id="editor" class="form-control" name="address">{{ old('address') }}</textarea>
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                      @endif
                      </div>
                    </div>
                  </div>     
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        @foreach ($classes as $class)
                          <div class="form-check">
                            <input id="flexCheckCheckedcategory{{$class->id}}" class="form-check-input" 
                            type="checkbox" value="{{ $class->id }}" name="classes[]">
                            <label class="form-check-label" for="flexCheckCheckedcategory{{$class->id}}">
                              {{ $class->name }}
                            </label>
                            {{-- <select name="categories[]" id="categories" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                              @foreach($categories as $id => $category)
                                  <option value="{{ $id }}"{{ in_array($id, old('categories', [])) ? ' selected' : '' }}>{{ $category }}</option>
                              @endforeach
                          </select> --}}
                          </div>
                        @endforeach
                        @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                      </div>
                    </div>
                  </div>
                <button class="btn btn-primary" type="submit">Create Student</button>
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