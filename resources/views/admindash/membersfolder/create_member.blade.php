@extends('admindash.admin')

@section('menu-content')
    <div class="card">
        <div class="container">
            <h1>Create Member</h1>

            <form action="" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input placeholder="Enter Password (e.g., Password1!)" type="text" name="password" class="form-control" required pattern="(?=.*\d)(?=.*[A-Z])(?=.*\W+)(?!.*\s).*$" />
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>

                <!-- Add more fields as needed -->

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
