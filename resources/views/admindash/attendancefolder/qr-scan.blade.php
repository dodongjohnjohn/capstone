@extends('admindash.admin')

@section('menu-content')
<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="mb-4">Scan QR Code</h1>
        <p class="mb-5">Scan the QR code to record attendance for <strong>{{ $event->title }}</strong></p>

        <div class="row">
            <div class="col-md-8 mb-5">
                <div id="qr-video"></div>
                <video id="preview"></video>
            </div>

            <div class="col-md-4">
                <h5>Instructions:</h5>
                <ul>
                    <li>Point the camera at the QR code</li>
                    <li>Make sure there is enough light</li>
                    <li>Hold the camera steady</li>
                </ul>

                <form id="attendance-form" method="post" action="{{ route('attendance.scanQR') }}">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="text" value="" class="form-control" id="time" name="time" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="time_type">Time Type:</label>
                        <select class="form-control" id="time_type" name="time_type" required>
                            <option value="">Select Time Type</option>
                            <option value="time_in">Time-In</option>
                            <option value="time_out">Time-Out</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="asset/js/instascan.min.js"></script>



<script>
    // Get the video element
    const video = document.getElementById('preview');

    // Get the input field elements
    const inputName = document.getElementById('name');
    const inputTime = document.getElementById('time');

    // Create a new Instascan.Scanner object and attach it to the video element
    const scanner = new Instascan.Scanner({ video: video });

    // Listen for "scan" events
    scanner.addListener('scan', function(content) {
        try {
            // Parse the scanned content as JSON
            const data = JSON.parse(content);

            // If the data contains a "name" field, update the input field value
            if (data.hasOwnProperty('name')) {
                inputName.value = data.name;
                inputTime.value = getCurrentTime(); // Set current time
                alert(`Data received: ${data.name}`);
            }
        } catch (error) {
            console.error(error);
        }
    });

    // Start the scanner
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });

    // Helper function to get the current time
    function getCurrentTime() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const amOrPm = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = (hours % 12) || 12;
        const formattedTime = padZero(formattedHours) + ':' + padZero(minutes) + ' ' + amOrPm;
        return formattedTime;
    }

    // Helper function to pad zeros for single-digit numbers
    function padZero(number) {
        return number.toString().padStart(2, '0');
    }
</script>
@endsection
