@extends('admindash.admin')

@section('menu-content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Donations</h1>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('create.donation')}}" class="btn btn-primary float-end"><i class="fa fa-plus"></i></a>
                        <div class="btn-group mr-2">
                            <form action="{{ route('donation.index') }}" method="GET" class="d-flex">
                                <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                    aria-label="Search" id="search-input" value="{{ request('search') }}">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                   
                </div>

                @if ($donations->isEmpty())
                    <p>No results found for "{{ request('search') }}"</p>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>lister's name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Date</th>
                                @if (Auth::check() && Auth::user()->isAdmin())
                                    <th>Edit</th>
                                    <th>Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $search = request('search');
                            @endphp
                            @foreach ($donations as $donation)
                                <tr>
                                    <td>{!! str_ireplace($search, '<mark>'.$search.'</mark>', e($donation->listers_name)) !!}</td>
                                    <td>{!! str_ireplace($search, '<mark>'.$search.'</mark>', e($donation->name)) !!}</td>
                                    <td>{!! str_ireplace($search, '<mark>'.$search.'</mark>', e($donation->email)) !!}</td>
                                    <td>{!! str_ireplace($search, '<mark>'.$search.'</mark>', e($donation->amount)) !!}</td>
                                    <td>{!! str_ireplace($search, '<mark>'.$search.'</mark>', e($donation->created_at)) !!}</td>
                                    @if (Auth::check() && Auth::user()->isAdmin())
                                        <td>
                                            <a href="{{ route('donation.edit', $donation->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            @if (Auth::check() && Auth::user()->isAdmin())
                                            <form action="{{ route('donation.destroy', $donation->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        <div class="float-end mt-3">
                            {{ $donations->appends(request()->query())->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Select the search input field
        const searchInput = document.getElementById('search-input');

        // Listen for keyup events on the search input field
        searchInput.addEventListener('keyup', function(event) {
            // Check if the input field is empty
            if (event.target.value === '') {
                // Reload the page without the search parameter
                window.location.href = "{{ route('donation.index') }}";
            }
        });
    </script>
@endsection
