@extends('admindash.admin')

@section('menu-content')
<div><h1>Event content</h1></div>

<div class="row mb-3">
  <div class="col-md-12">
    <a href="{{ route('create')}}" class="btn btn-primary float-end"><i class="fa fa-plus"></i></a>
    <div class="btn-group mr-2">
      <form action="{{ route('event.search') }}" method="GET" class="d-flex">
        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search" id="search-input">
        <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>
  <div class="col-md-12">
    <div class="float-end mt-3">
      {{ $events->links('pagination::bootstrap-4', ['links' => 6]) }}
    </div>
  </div>
</div>

@php
    $noResults = count($events) == 0;
@endphp

@if ($noResults)
    <p>No results found for "{{ request('query') }}"</p>
@else
<div class="row event-card">
  @foreach ($events as $event)
  <div class="col-lg-4 col-md-6 mb-4">
    <div class="card ">
      <div class="card-body">
        <p class="card-text">Organizer: {!! str_ireplace(request('query'), '<mark>'.request('query').'</mark>', $event['organizer']) !!}</p>
        <h5 class="card-title">Topic: {!! str_ireplace(request('query'), '<mark>'.request('query').'</mark>', $event['title']) !!} </h5>
        <p class="card-text description">{!! str_ireplace(request('query'), '<mark>'.request('query').'</mark>', $event['description']) !!} </p>
        <p class="card-text">Venue: {!! str_ireplace(request('query'), '<mark>'.request('query').'</mark>', $event['address']) !!} </p>
        <p class="card-text">Schedule: {{$event['time']}} | {{$event['date']}}</p>
      </div>
      <div class="card-footer">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="btn btn-primary">share link</a>
        @if(Auth::user()->isAdmin())
        <form action="{{route('event.destroy',['id' => $event->id]) }}" method="POST" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this group?')">
                <i class="fa fa-trash"></i>
            </button>
        </form>
        @endif
      </div>

     
    </div>
  </div>
  @endforeach
</div>
@endif
</div>
<script>
  // Select the search input field
  const searchInput = document.getElementById('search-input');

  // Listen for keyup events on the search input field
  searchInput.addEventListener('keyup', function(event) {
    // Check if the input field is empty
    if (event.target.value === '') {
      // Reload the page without the search parameter
      window.location.href = "{{ route('event.search') }}";
    }
  });
</script>
@endsection('menu-content')

