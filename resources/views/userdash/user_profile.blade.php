@extends('main_user')

@section('profile-content')


<div class="card" style="max-width: 300px;">
    <div class="card-header">
        <h5 class="card-title text-center">{{ $userData['name'] }}</h5>
    </div>
    <div class="card-body">
        <div class="text-center mb-1">
            {!! $qrCode !!}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>User ID:</strong> {{ session('user_id') }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $userData['email'] }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $userData['address'] }}</li>
            <li class="list-group-item"><strong>Phone Number:</strong> {{ $userData['phone_number'] }}</li>
        </ul>
    </div>
    <div class="card-footer text-center"> 
        <a href="{{ route('userdownloadqr') }}" class="btn btn-primary">Download QR Code</a> 
    </div>
</div>


@endsection
