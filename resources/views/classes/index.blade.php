@extends('layouts.master')
@section('tittle','Index')
@section('content')
<div class="container ">
    <div class="row">
        <div class="col-12 pd-5">
          @if (session('success'))
                <div class="alert alert-success mt-2" role="alert">
                  {{ session('success') }}
              </div>
          @endif
          <a href="{{ route('classes.create') }}" class="btn btn-primary my-3" type="button">Create Class</a>
          <div class="table-responsive ">
            <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($classes as $class)
              <tr>
                <td>
                    {{ $class->id }}
                </td>
                <td>
                    {{ $class->name }}
                </td>
                <td>
                    {!! $class->description !!}
                </td>
                <td>
                  <a href="{{ route('classes.show', ['class' => $class->id]) }}" class="btn btn-primary" type="button">View</a>
                  <a href="{{ route('classes.edit', ['class' => $class->id]) }}" class="btn btn-info" type="button">Edit</a>
                  <form action="{{ route('classes.destroy', ['class' => $class->id]) }}" method="post" style="display:inline-block">
                    @csrf
                    @method('delete')
                    <button  class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        
        </div>
        </div>
    </div>
</div>
@endsection