@extends('main_user')

@section('donation-content')
<style>
    .donor-name {
        border-bottom: 1px solid #ccc;
        max-width: 200px; /* Adjust the max-width value as needed */
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .donation-total {
        font-weight: bold;
        margin-top: 20px;
    }
    .donor-name:hover {
        cursor: pointer;
    }
    @media (max-width: 767px) {
        .col-md-3 {
            margin-bottom: 20px;
        }
    }
</style>

    <div class="container">
        <h1 class="text-center">Donations</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <h5 class="mb-3 fw-bold">Donor Names</h5>
                        @foreach ($donations as $donation)
                            <p class="donor-name">{{ $donation->name }}</p>
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        <h5 class="mb-3 fw-bold">Donation Amounts</h5>
                        @foreach ($donations as $donation)
                            <p class="donor-name">{{ $donation->amount }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <p class="donation-total">Total: {{ $totalDonations }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 mt-3">
                {{ $donations->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
