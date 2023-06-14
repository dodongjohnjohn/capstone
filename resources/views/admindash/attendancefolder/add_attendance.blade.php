@extends('admindash.admin')

@section('menu-content')
<div class="card-body">
  <form id="attendance-form" method="post" action="{{ route('attendance.store') }}">

  @csrf
  <div class="form-group">
    <label for="event_id">Event ID:</label>
    <input type="text" class="form-control" id="event_id" name="event_id" value="{{ $event->id }}" readonly>
</div>

  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="time">Time:</label>
    <input type="time" class="form-control" id="time" name="time" required>
  </div>
  <div class="form-group">
    <label for="time_type">Time Type:</label>
    <select class="form-control" id="time_type" name="time_type" required>
      <option value="">Select Time Type</option>
      <option value="time_in">Time-In</option>
      <option value="time_out">Time-Out</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
</div>
@endsection('menu-content')
