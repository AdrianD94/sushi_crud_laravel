@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Book
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('sky.update', $sky->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Sky Name:</label>
              <input type="text" class="form-control" name="name" value="{{$sky->name}}"/>
          </div>
          <div class="form-group">
              <label for="price">Sky Price :</label>
              <input type="text" class="form-control" name="price" value="{{$sky->price}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Book Quantity :</label>
              <input type="text" class="form-control" name="quantity" value="{{$sky->quantity}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Sky</button>
      </form>
  </div>
</div>
@endsection
