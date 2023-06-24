@extends('admindash.admin')

@section('menu-content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card">
            <div class="card shadow">
              <div class="card-body">
                <form id="attendance-form" method="post" action="{{ route('attendance.store') }}">
          @csrf
          <div class="mb-3">
            <label for="event_id" class="form-label">Event ID:</label>
            <input type="text" class="form-control col-md-2" id="event_id" name="event_id" value="{{ $event->id }}" readonly>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control col-md-3" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="time" class="form-label">Time:</label>
            <input type="time" class="form-control col-md-2" id="time" name="time" required>
          </div>
          <div class="mb-3">
            <label for="time_type" class="form-label">Time Type:</label>
            <select class="form-control col-md-3" id="time_type" name="time_type" required>
              <option value="">Select Time Type</option>
              <option value="time_in">Time-In</option>
              <option value="time_out">Time-Out</option>
            </select>
          </div>
          <br>
          <div class="d-grid">
            <div class="position-relative">
              <button type="submit" class="btn btn-primary" id="submitBtn">{{ __('Submit') }}</button>
              <div id="preloader" class="position-absolute top-50 start-50 translate-middle" style="display: none;">
                <div class="spinner-border text-black" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('menu-content')

@section('scripts')
<script>
  document.getElementById('attendance-form').addEventListener('submit', function() {
    document.getElementById('submitBtn').setAttribute('disabled', 'disabled');
    document.getElementById('preloader').style.display = 'block';
  });
</script>
@endsection
