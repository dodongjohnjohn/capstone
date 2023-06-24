@extends('admindash.admin')

@section('content')

<div class="card push-top">
  <div class="card-header">
    Add Event
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      <br />
    @endif
    <form method="post" action="{{ route('save_event') }}" id="eventForm">
      <!-- Update the action attribute to point to the appropriate route -->

      <div class="container d-flex justify-content-between">
        <div class=" flex-grow-1 mr-2">
          <div class="card-body">
            <div>
              <div class="form-group">
                @csrf
                <label for="organizer">Organizer</label>
                <input type="text" class="form-control" name="organizer" readonly value="{{ auth()->user()->name }}" />
              </div>
              <!-- Add the hidden input field for the organizer -->
              <input type="hidden" name="organizer" value="{{ auth()->user()->name }}">
              
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" />
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="address">Location</label>
                <input type="text" class="form-control" name="address" />
              </div>
              <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" name="time" />
              </div>
              <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" />
              </div>
              <br>
           
            </div>
          </div>
        </div>
    
      <br>
      
        <div class="flex-grow-1">
          <h3>Send SMS </h3>
          <div class="card-body">
            <table class="members-table table align-middle mb-0 bg-white ">
              <thead class="bg-light">
                <tr>
                  <th>Name</th>
                  <th>Phone Number</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($members as $member)
                @if ($member->role !== 'admin') <!-- CONDITION NI CJA TO CHECK IF ANG ROLE IS ADMIN SO EXCLUDED NA CJA SA PAG SEND UG SMS -->
                <tr>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="{{ $member->phone_number }}"
                        id="phone_{{ $member->id }}" name="phone_numbers[]">
                      <label class="form-check-label" for="phone_{{ $member->id }}">
                        {{ $member->name }}
                      </label>
                    </div>
                  </td>
                  <td>{{ $member->phone_number }}</td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="pagination pagination-circle float-end">
            {{ $members->appends(['query' => request('query')])->links('pagination::bootstrap-5') }}
          </div>

        </div>
      </div>

      <div style="height: 20px;"></div> <!-- Add a div with a specific height for spacing -->

      <div class="d-grid text-center">
        <div class="position-relative">
            <button type="submit" class="btn btn-primary" id="submitBtn">{{ __('Submit') }}</button>
            <div id="preloader" class="position-absolute top-50 start-50 translate-middle" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    </form>
  </div>
</div>
<script>
        document.getElementById('eventForm').addEventListener('submit', function() {
            document.getElementById('submitBtn').setAttribute('disabled', 'disabled');
            document.getElementById('preloader').style.display = 'block';
        });
    </script>
@endsection
