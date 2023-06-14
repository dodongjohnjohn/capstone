@extends('admindash.admin')

@section('menu-content')
    <div class="event-card">
        <h1>Attendance content</h1>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="btn-group mr-2">
            <form action="{{ route('attendance.search') }}" method="GET" class="d-flex">
              <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" id="search-input">
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
          </div>
            <div class="float-end">
                {{ $events->links('pagination::bootstrap-4', ['links' => 6]) }}
            </div>
        </div>
    </div>
    @php
    $noResults = count($events) == 0;
@endphp

@if ($noResults)
    <p>No results found for "{{ request('search') }}"</p>
@else
    <div class="row">
        @foreach ($events as $event)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{!! str_ireplace(request('search'), '<mark>'.request('search').'</mark>', $event['title']) !!}</h5>
                        <input type="hidden" name="" value="{{ $event['id'] }}" />
                        <p class="card-text">{!! str_ireplace(request('search'), '<mark>'.request('search').'</mark>', $event['description']) !!}</p>
                        <p class="card-text">{!! str_ireplace(request('search'), '<mark>'.request('search').'</mark>', $event['address']) !!}</p>
                        <p class="card-text">{{ $event['time'] }} | {{ $event['date'] }}</p>
                        <a href="{{ route('view.attendance', ['eventId' => $event->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('add.attendance', ['eventId' => $event->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                        <a href="{{ route('qr.scan', ['eventId' => $event->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-qrcode"></i></a>

                        @if (Auth::check() && Auth::user()->isAdmin())
                         <form action="{{ route('attendance.destroy', ['id' => $event->id]) }}" method="POST" class="d-inline">
                            @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                         </form>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
<script>
    // Select the search input field
    const searchInput = document.getElementById('search-input');
  
    // Listen for keyup events on the search input field
    searchInput.addEventListener('keyup', function(event) {
      // Check if the input field is empty
      if (event.target.value === '') {
        // Reload the page without the search parameter
        window.location.href = "{{ route('attendance.search') }}";
      }
    });
</script>
@endsection
