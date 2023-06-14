
@extends('admindash.admin')
@section('menu-content')


<div class="container-fluid px-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 my-2">
        <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $totalMembers }}</h3>
                    <p class="fs-5">Users</p>
                </div>
                <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $attendancePercentage }}</h3>
                    <p class="fs-5">Attendance</p>
                </div>
                <i class="fa fa-list-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">PHP{{ number_format($totalDonations, 2) }}</h3>
                    <p class="fs-5">Donation</p>
                </div>
                <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
        <div class="col">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">25%</h3>
                    <p class="fs-5">Groups</p>
                </div>
                <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>
</div>
@endsection









