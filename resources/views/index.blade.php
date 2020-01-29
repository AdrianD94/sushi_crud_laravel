@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <a href="{{ route('sky.create')}}" class="btn btn-primary" style="margin-bottom:2rem">Add</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Sky Name</td>
          <td>Price Number</td>
          <td>Quantity Price</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($skies as $sky)
        <tr>
            <td>{{$sky->id}}</td>
            <td>{{$sky->name}}</td>
            <td>{{$sky->price}}</td>
            <td>{{$sky->quantity}}</td>
            <td><a href="{{ route('sky.edit',$sky->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('sky.destroy', $sky->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
