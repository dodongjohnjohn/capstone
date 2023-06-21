@extends('admindash.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Donation Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('donation.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="listers_name" class="form-label">Lister's Name:</label>
                            <input type="text" id="listers_name" name="listers_name" value="{{ $name }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number:</label>
                            <input type="text" id="phone_number" name="phone_number" required class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label for="amount" class="form-label">Donation Amount:</label>
                            <input type="number" id="amount" name="amount" required class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
