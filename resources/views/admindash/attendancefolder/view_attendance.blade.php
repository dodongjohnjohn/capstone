@extends('admindash.admin')

@section('menu-content')
<div><h1>Attendance record</h1></div>
<div class="row mb-3">
  <div class="col-md-12">
    <div class="btn-group mr-2">
      <form action="{{ route('attendance.viewsearch', ['eventId' => $event->id]) }}" method="GET" class="d-flex">
          <input class="form-control me-2" type="search" name="query" placeholder="Search by name" aria-label="Search" id="search-input">
          <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
  <div class="m-2 text-end"> <!-- Add the 'text-end' class for right alignment -->
    <a href="{{ route('attendance.print', ['eventId' => $event->id]) }}" class="btn btn-primary" target="_blank">Print Attendance Records</a>
  </div>
  
</div>
@if ($noResults)
<p>No results found for "{{ request('query') }}"</p>
@else

<div class="row">
    <div class="col">Time in</div>
    <div class="col">Time out</div>
</div>

@if (isset($event) && isset($groupedAttendance))
  <div class="row">
    @foreach ($groupedAttendance as $timeType => $records)
      @if (in_array($timeType, ['time_in', 'time_out']))
        <div class="col-md-6">
          <div class="card mt-4">
            <div class="card-body">
              <h5 class="card-title">{{ $event->title }} {{ ucwords(str_replace('_', ' ', $timeType)) }} Records</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Time</th>
                    @if ($timeType === 'time_out') <!-- Add a conditional statement for the 'Generate Certificate' column -->
                      <th>Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($records as $record)
                    <tr>
                      <td>{{ $record->name }}</td>
                      <td>{{ $record->time }}</td>
                      @if ($timeType === 'time_out') <!-- Display the 'Generate Certificate' button only for 'time_out' records -->
                        <td>
                          <a href="{{ route('certificate.generate', ['eventId' => $event->id, 'attendanceId' => $record->id]) }}" class="btn btn-primary">Generate Certificate</a>
                        </td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>
  
@else
  @php
    $noResults = true;
  @endphp
@endif

@endif



@endsection
