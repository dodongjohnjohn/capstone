@extends('admindash.admin')

@section('menu-content')
<div class="card">
    <div class="container">
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
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Schedule</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{!! str_ireplace(request('search'), '<mark>'.request('search').'</mark>', $event['title']) !!}</td>
                                <td>{!! str_ireplace(request('search'), '<mark>'.request('search').'</mark>', $event['description']) !!}</td>
                                <td>{!! str_ireplace(request('search'), '<mark>'.request('search').'</mark>', $event['address']) !!}</td>
                                <td>{{ $event['time'] }} | {{ $event['date'] }}</td>
                                <td>
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
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
