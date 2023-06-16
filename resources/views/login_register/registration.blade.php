@extends('main')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card opacity" style="background: rgba(255, 255, 255, 0.178); backdrop-filter: blur(10px);">
        <div class="card-header">Register Here</div>
        <div class="card-body">
          <form method="POST" action="data_insert" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input placeholder="Enter Name" type="text" name="name" class="form-control" required />
              @if($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name')}}</span>
              @endif
            </div>
            <br>
            <div class="form-group">
              <input placeholder="Enter Address" type="text" name="address" class="form-control" required />
              @if($errors->has('address'))
              <span class="text-danger">{{ $errors->first('address')}}</span>
              @endif
            </div>
            <br>
            <div class="form-group">
              <input placeholder="Enter Email" type="text" name="email" class="form-control" required />
              @if($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email')}}</span>
              @endif
            </div>
            <br>
            <div class="form-group">
              <input placeholder="Enter Password (e.g., Password1!)" type="password" name="password" class="form-control" required pattern="(?=.*\d)(?=.*[A-Z])(?=.*\W+)(?!.*\s).*$" />
              @if($errors->has('password'))
              <span class="text-danger">{{ $errors->first('password')}}</span>
              @endif
            </div>
            <br>
            <div class="form-group">
              <input placeholder="Enter Phone Number" type="text" name="phone_number" class="form-control" required />
              @if($errors->has('phone_number'))
              <span class="text-danger">{{ $errors->first('phone_number')}}</span>
              @endif
            </div>
            <br>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection