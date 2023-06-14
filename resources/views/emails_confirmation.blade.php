@extends('main')
@section('content')

<body>
    <h1>Email Confirmation</h1>
    
    <p>Hello, {{ $user->name }}!</p>
    
    <p>Please click on the following link to confirm your email:</p>
    <a href="{{ route('confirm.email', ['token' => $confirmation_token]) }}">Confirm Email</a>
    
    <p>If you did not request this email, you can safely ignore it.</p>
</body>
@endsection
