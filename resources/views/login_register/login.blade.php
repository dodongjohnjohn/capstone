@extends('main')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(3px);">
                <div class="card-header text-dark fw-bold fs-3">{{ __('Login') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group text-dark fw-bold text-start ">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group text-dark fw-bold text-start ">
                            <label for="password">{{ __('Password') }}</label>
                            <div class="input-group">
                                <input placeholder="Enter Password (e.g., Password1!)" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="password-toggle" style="cursor: pointer;">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                       <br>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('password-toggle').addEventListener('click', function() {
        var passwordInput = document.getElementById('password');
        var passwordToggle = document.getElementById('password-toggle');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.innerHTML = '<i class="fa fa-eye"></i>';
        } else {
            passwordInput.type = 'password';
            passwordToggle.innerHTML = '<i class="fa fa-eye-slash"></i>';
        }
    });
</script>
@endsection
