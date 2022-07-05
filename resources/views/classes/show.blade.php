@extends('layouts.master')
@section('tittle','SHOW')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <a href="{{ route('classes.index') }}" class="btn btn-primary my-3" type="button">View Class</a>
            <form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{{ $class->name }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                     <p>{!!$class->description!!}   </p>
                    </div>
                  </div>
                </div>

                {{-- <div class="row"> --}}
                   
                  </div>

              </form>
        </div>
    </div>
</div>
@endsection