@extends('main_user')

@section('Eventcontent')


<h1 class="text-center">Event Schedule</h1>
<h4 class="text-center">Event Program</h4>

<div class="col-md-12">
  <div class="mt-2 center">
    <div class="col-md-12">
      <div class="mt-1">
        {{ $events->links('pagination::bootstrap-4', ['links' => 5]) }}
      </div>
    </div>
  </div>
  <hr>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Timeline</h6>
            <div id="content">
              <ul class="timeline">
                @foreach ($events as $event)
                <li class="event" data-date="{{ $event['date'] }} | {{ $event['time'] }}">
                  <h5 class="">{{ $event['title'] }}</h5>
                  <p class="">{{ $event['description'] }}</p>
                  <p class=""><strong>Address:</strong> {{ $event['address'] }}</p>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection('Eventcontent')
