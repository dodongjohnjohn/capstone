@extends('admindash.admin')

@section('menu-content')
<div class="row justify-content-center mb-4">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">{{ $userData['name'] }}</h3>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    {{ $qrCode }}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>User ID:</strong> {{ session('user_id') }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $userData['email'] }}</li>
                    <li class="list-group-item"><strong>Address:</strong> {{ $userData['address'] }}</li>
                    <li class="list-group-item"><strong>Phone Number:</strong> {{ $userData['phone_number'] }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ route('qr-code.download') }}" class="btn btn-primary float-right">Download QR Code</a>
            </div>
        </div>
    </div>
</div>
@endsection
