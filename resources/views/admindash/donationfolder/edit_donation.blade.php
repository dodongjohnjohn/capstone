@extends('admindash.admin')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Edit Donation</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('donation.update', $donation->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="listers_name">Lister's name:</label>
                            <input type="text" id="listers_name" name="listers_name" value="{{ $donation->listers_name }}" required class="form-control">
                        </div> 

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="{{ $donation->name }}" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $donation->email }}" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="amount">Donation Amount:</label>
                            <input type="number" id="amount" name="amount" value="{{ $donation->amount }}" required class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{ route('donation.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
