
@extends('layouts.master')
@section('tittle','Index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pd-5">
          @if (session('success'))
                <div class="alert alert-success mt-2" role="alert">
                  {{ session('success') }}
              </div>
          @endif
          @if (session('error'))
                <div class="alert alert-danger mt-2" role="alert">
                  {{ session('error') }}
              </div>
          @endif
          <a href="{{ route('students.create') }}" class="btn btn-primary my-3" type="button">Create Student</a>
          <div class="table-responsive align-self-center" >
            <table class="table align-items-center ">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">AGE</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
              <tr>
                <td>
                    {{ $student->id }}
                </td>
                <td>
                    {{ $student->first_name }}
                </td>
                <td>
                    {{ $student->last_name }}
                </td>
                <td>
                    {{ $student->age }}
                </td>
                <td>
                    {!! $student->address !!}
                </td>
           
                
                
                <td>
                  <a href="{{ route('students.show', ['student' => $student->id]) }}" class="btn btn-primary" type="button">View</a>
                  <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="btn btn-info" type="button">Edit</a>
                  <form action="{{ route('students.destroy', ['student' => $student->id]) }}" method="post" style="display:inline-block">
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