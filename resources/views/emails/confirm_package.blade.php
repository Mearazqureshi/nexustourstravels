<html>
<body>
    <h1>Dear, {{ $user->name }}</h1>
    <p style="text-align:justify;">Your package has benn confirmed.</p><br>
	<p style="text-align:justify;">Source City: {{ $book_package->source_city }}</p>
	<p style="text-align:justify;">Departure City: {{ $book_package->departure_city }}</p>
	<p style="text-align:justify;">Number of person with you: {{ $book_package->no_of_person }}</p>
	<p style="text-align:justify;">Journey Date: {{ date('d-m-Y',strtotime($book_package->journey_date)) }}</p>
	<p style="text-align:justify;">Total: {{ $book_package->total }}</p>

	<br><br>
    <p style="text-align:justify;">Thank you</p>
</body>
</html>