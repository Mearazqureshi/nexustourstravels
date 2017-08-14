<html>
<body>
    <h1>Dear, {{ $user->name }}</h1>
    <p style="text-align:justify;">Your package has benn cancel for some reason.</p><br>

	<p style="text-align:justify;">Source City: {{ $book_package->source_city }}</p>
	<p style="text-align:justify;">Departure City: {{ $book_package->departure_city }}</p>
	<p style="text-align:justify;">Journey Date: {{ date('d-m-Y',strtotime($book_package->journey_date)) }}</p>
	
	<br>
	<p style="text-align:justify;">For more details contact our office. Thank you.</p>

</body>
</html>