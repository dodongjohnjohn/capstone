@extends('admindash.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Donation Form') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('donation.store') }}" id="donationForm">
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
                                <div class="position-relative">
                                    <button type="submit" class="btn btn-primary" id="submitBtn">{{ __('Submit') }}</button>
                                    <div id="preloader" class="position-absolute top-50 start-50 translate-middle" style="display: none;">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('donationForm').addEventListener('submit', function() {
            document.getElementById('submitBtn').setAttribute('disabled', 'disabled');
            document.getElementById('preloader').style.display = 'block';
        });
    </script>
@endsection
