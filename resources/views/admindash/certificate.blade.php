	@extends('admindash.admin')
	@section('menu-content')

	<style type="text/css">
		body {
			font-family: Arial, sans-serif;
			padding: 20px;
			background-color: #f5f5f5;
		}
		h1 {
			font-size: 30px;
			margin-bottom: 20px;
			text-align: center;
		}
		p {
			font-size: 18px;
			margin-bottom: 10px;
			text-align: center;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
		}
	</style>
	<div class="container">
		<h1>Certificate of Attendance</h1>
		<p>This certificate is presented to</p>
		<p><strong>attendance name</strong></p>
		<p>for attending the event</p>
		<p><strong>event name</strong></p>
		<p>on </p>

		<a href="#" id="printButton">Print Certificate</a>
	</div>

	<script>
		document.getElementById('printButton').addEventListener('click', function() {
			window.print();
		});
	</script>

	@endsection('menu-content')
