@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Sky
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
      <form method="post" action="{{ route('sky.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Sky Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">Price :</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="quantity">Quantity :</label>
              <input type="text" class="form-control" name="quantity"/>
          </div>
          <button type="submit" class="btn btn-primary">Create Sky</button>
      </form>
  </div>
</div>
@endsection
