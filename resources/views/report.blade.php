@extends('admindash.admin')
@section('menu-content')


<div id="back" class="container-fluid px-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 my-2 justify-content-center">
        <div class="col-md-6 col-lg-4 text-center">
            <a href="#user">
                <div class="p-3 alert-warning shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2 text-dark">{{ $totalMembers }}</h3>
                        <p class="fs-5 text-dark">Users</p>
                    </div>
                    <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4 text-center">
            <a href="#donation">
                <div class="p-3 alert alert-primary shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2 text-primary">PHP{{ number_format($totalDonations, 2) }}</h3>
                        <p class="fs-5 text-primary">Donation</p>
                    </div>
                    <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4 text-center">
            <a href="#attendance">
                <div class="p-3 alert-success shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2 text-success">{{ $attendancePercentage }}</h3>
                        <p class="fs-5 text-success">Attendance</p>
                    </div>
                    <i class="fa fa-list-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
    </div>
</div>
<div id="donation" class="container">
    <div class="card-body">
      <h3>Donation Analytics Report</h3>
      <p>Total Donations: PHP{{ number_format($totalDonations, 2) }}</p>
      <canvas id="donationChart" width="400" height="200"></canvas>
    </div>
  </div>

<hr>

<div class="container-fluid px-4">
    <div class="row">
        <div id="user" class="container p-3">
          <h3>Members Report</h3>
          <p>Total Account: {{ count($members) }}</p>
          <h5>
            <span class="badge bg-success">Admin</span>: {{ $members->where('role', 'admin')->count() }}
            <span class="badge bg-primary">Manager</span>: {{ $members->where('role', 'manager')->count() }}
            <span class="badge bg-warning text-dark">User</span>: {{ $members->where('role', 'user')->count() }}
          </h5>
          <div class="btn-group mb-3">
            <button class="btn btn-primary" onclick="printReport('user')">
                <i class="fa fa-print"></i> Print
            </button>
        </div>
        <br />
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-shadow">
                <thead>
                  <tr>
                    <th><strong>Name</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Address</strong></th>
                    <th><strong>Phone Number</strong></th>
                    <th><strong>Status</strong></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($members as $member)
                  <tr>
                    <td>{{ $member['name'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ $member['address'] }}</td>
                    <td>{{ $member['phone_number'] }}</td>
                    <td>
                      @if ($member['role'] === 'admin')
                      <span class="badge bg-success">Admin</span>
                      @elseif ($member['role'] === 'manager')
                      <span class="badge bg-primary">Manager</span>
                      @else
                      <span class="badge bg-warning text-dark">User</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
            </div>
        </div>
      </div>
      
    </div>
  </div>
<hr>
<div id="attendance" class="container p-3">
    <div class="card-body">
        <div class="btn-group">
            <button class="btn btn-primary" onclick="printReport('attendance')">
                <i class="fa fa-print"></i> Print
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><strong>Title</th>
                        <th><strong>Description</th>
                        <th><strong>Address</th>
                        <th><strong>Time</th>
                        <th><strong>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr>
                        <td>{!! str_ireplace(request('search'), '<mark>'.request('search').'</mark>', $event['title']) !!}</td>
                        <td>{!! str_ireplace(request('search'), '<mark>'.request('search').'</mark>', $event['description']) !!}</td>
                        <td>{!! str_ireplace(request('search'), '<mark>'.request('search').'</mark>', $event['address']) !!}</td>
                        <td>{{ $event['time'] }}</td>
                        <td>{{ $event['date'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<hr>


<div class="container">
    <!-- Your page content goes here -->

    <!-- Sticky button -->
    <a href="#back">
    <div class="fixed-bottom" style="padding-left: 95%;">
        <button type="button" class="btn btn-primary" style="margin-bottom: 5%; background-color: rgba(0, 0, 0, 0.5); border-radius: 10%; font-size: 24px;"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></button>
    </div>
</a>
</div>


  
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var donationData = @json($donations);

        // Extract the month from the created_at field and create an array of months
        var months = donationData.map(function(donation) {
            var date = new Date(donation.created_at);
            return date.toLocaleString('default', { month: 'long' });
        });

        var amounts = donationData.map(donation => donation.amount);

        var ctx = document.getElementById('donationChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Donation Amount',
                    data: amounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Adjust the bar chart orientation
                responsive: true,
                maintainAspectRatio: false, // Allow chart to resize based on container size
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>

<script>
    function printReport(reportId) {
        const report = document.getElementById(reportId).innerHTML;
        const printWindow = window.open('', '', 'height=500,width=800');
        printWindow.document.write('<html><head><title>Print Report</title>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(report);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

@endsection