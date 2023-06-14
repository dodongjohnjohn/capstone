@extends('admindash.admin')

@section('menu-content')
    <div class="container">
        <div class="row">
            @foreach ($members as $member)
                <div class="col-md-4">
                    <div class="card m-2 p-2">
                        <div class="card-header">{{ $member->name }}</div>
                        <div class="card-body">
                            Current Role: {{ $member->role }}<br>
                            <input type="hidden" value="{{ $member->phone_number }}">
                            <form method="POST" action="{{ route('changeRole', ['id' => $member->id]) }}" style="display: inline;">
                                @csrf
                                @method('PUT')

                                <select name="role" id="role" class="form-select" onchange="this.form.submit()">
                                    <option value="" selected disabled>Select role</option>
                                    <option value="2" {{ $member->role == 2 ? 'selected' : '' }}>staff</option>
                                    <option value="1" {{ $member->role == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="0" {{ $member->role == 0 ? 'selected' : '' }}>User</option>
                                </select>
                            </form>

                            <form method="POST" action="{{ route('toggleAccountConfirmation') }}" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $member->id }}">
                                
                                <label for="accountConfirmation_{{ $member->id }}">Account Confirmation</label>
                                <select name="accountConfirmation" id="accountConfirmation_{{ $member->id }}" class="form-select" onchange="this.form.submit()">
                                    <label for=""></label>
                                    <option value="" selected disabled>Account Confirmation</option>
                                    <option value="access" {{ $member->account_confirmation == 'access' ? 'selected' : '' }}>Access</option>
                                    <option value="no access" {{ $member->account_confirmation == 'no access' ? 'selected' : '' }}>No Access</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
