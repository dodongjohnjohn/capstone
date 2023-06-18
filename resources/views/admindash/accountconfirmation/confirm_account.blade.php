@extends('admindash.admin')

@section('menu-content')
<div class="container">
    <div class="col-md-12">
        <div class="btn-group mr-2">
            <form action="{{ route('members.search') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="query" class="form-control me-2" placeholder="Search by name" aria-label="Search by name">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    @php
        $noResults = $members->isEmpty();
    @endphp

    @if ($noResults)
        <p>No results found for "{{ request('query') }}"</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Current Role</th>
                    <th>Role</th>
                    <th>Account Confirmation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->role }}</td>
                        <td>
                            <form method="POST" action="{{ route('changeRole', ['id' => $member->id]) }}" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <select name="role" class="form-select" onchange="this.form.submit()">
                                    <option value="" selected disabled>Select role</option>
                                    <option value="2" {{ $member->role == 2 ? 'selected' : '' }}>staff</option>
                                    <option value="1" {{ $member->role == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="0" {{ $member->role == 0 ? 'selected' : '' }}>User</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('toggleAccountConfirmation') }}" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $member->id }}">
                                <select name="accountConfirmation" class="form-select" onchange="this.form.submit()">
                                    <option value="" selected disabled>Account Confirmation</option>
                                    <option value="access" {{ $member->account_confirmation == 'access' ? 'selected' : '' }}>Access</option>
                                    <option value="no access" {{ $member->account_confirmation == 'no access' ? 'selected' : '' }}>No Access</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $members->links('pagination::bootstrap-4', ['links' => 6]) }}
    @endif
</div>
@endsection
    