@extends('admindash.admin')
@section('viewMembers')


        <h1>View Members</h1>



        <form method="GET" action="" enctype="multipart/form-data">
            @csrf

            <div>
                <input placeholder="{{ $members['name'] }}" type="text" name="name" />
            </div>

            <div>
                <input placeholder="{{ $members['address'] }}" type="text" name="address" />
            </div>

            <div>
                <input placeholder="{{ $members['phone_number'] }}" type="text" name="phone_number" />
            </div>

            <div>
                <button type="submit">Edit</button>
            </div>

        </form>
@endsection
