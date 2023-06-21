@extends('admindash.admin')


@section('menu-content')
<div class="card">
  <div class="container">
    <h1>Members content</h1>
    
    <div class="row mb-3">
      <div class="col-md-12">
          <form method="GET" action="{{ route('members') }}">
            <div class="btn-group mr-2">
              <input type="search" class="form-control me-2" placeholder="Search..." name="search" value="{{ request('search') }}" id="search-input">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
          </form>
      </div>
    </div>
    
    <div class="row mb-3">
      <div class="col-md-12">
          <div class="float-end">
              {{ $members->links('pagination::bootstrap-4', ['links' => 6]) }}
          </div>
      </div>
    </div>
    
    @if ($noResults)
      <p>No results found for "{{ request('search') }}"</p>
    @else
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Role</th>
            @if (session('user_role') === 'admin')
              <th>Action</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach ($members as $member)
            <tr>
              <td>{!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $member['name']) !!}</td>
              <td>{!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $member['address']) !!}</td>
              <td>{!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $member['phone_number']) !!}</td>
              <td>{!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $member['role']) !!}</td>
              @if (session('user_role') === 'admin')
              
              <td>
                <div style="display: inline-block;">
                  <form action="{{ route('members.delete', $member->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                </div>
              
                <div style="display: inline-block;">
                  <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                </div>
              </td>
              
                
                
              
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
  
</div>

@endsection('menu-content')
