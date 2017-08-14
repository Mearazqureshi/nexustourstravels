<html>
<body>
    <h1>Dear, {{ $user->name }}</h1>
    <p style="text-align:justify;">Your vehicle has benn confirmed.</p><br>
	<p style="text-align:justify;">From: {{ $book_vehicle->from }}</p>
	<p style="text-align:justify;">To: {{ $book_vehicle->to }}</p>
	<p style="text-align:justify;">Killo meter: {{ $book_vehicle->km }}</p>
	<p style="text-align:justify;">Number of days: {{ $book_vehicle->no_of_days }}</p>
	<p style="text-align:justify;">Hire Date: {{ date('d-m-Y',strtotime($book_vehicle->hire_date)) }}</p>
	<p style="text-align:justify;">Total: {{ $book_vehicle->total }}</p>

	<br><br>
    <p style="text-align:justify;">Thank you</p>
</body>
</html>