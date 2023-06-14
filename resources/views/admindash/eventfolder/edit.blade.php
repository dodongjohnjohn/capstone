@extends('admindash.admin')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Edit & Update
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
      <form method="POST" action="{{ route('events.update', $event->id) }}">
          <div class="form-group">
              @csrf
              @method('PUT')
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" value="{{ $event->title }}"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="{{ $event->description }}"/>
          </div>
          <div class="form-group">
            <label for="date">Location</label>
            <input type="text" class="form-control" name="address" value="{{ $event->address}}"/>
        </div>
          <div class="form-group">
            <label for="date">Time</label>
            <input type="text" class="form-control" name="time" value="{{ $event->time }}"/>
        </div>
          <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" name="date" value="{{ $event->date }}"/>
          </div>
         <br/>
          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection