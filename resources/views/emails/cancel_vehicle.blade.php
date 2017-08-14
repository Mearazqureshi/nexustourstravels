<html>
<body>
    <h1>Dear, {{ $user->name }}</h1>
    <p style="text-align:justify;">Your vehicle has benn cancel for some reason.</p><br>
	<p style="text-align:justify;">From: {{ $book_vehicle->from }}</p>
	<p style="text-align:justify;">To: {{ $book_vehicle->to }}</p>
	<p style="text-align:justify;">Hire Date: {{ date('d-m-Y',strtotime($book_vehicle->hire_date)) }}</p>

	
	<p style="text-align:justify;">For more details contact our office. Thank you.</p>

</body>
</html>