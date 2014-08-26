<!DOCTYPE html>
<html lang="en">
<head>
	<title> Juan Holiday API </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- stylesheets -->
	<link href="/assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="container text-center">
		<h1>
			Juan Holiday API <br />
			<small> A holiday API for the Philippines</small>
		</h1>

		<p> This API lets you check holidays within the provided date </p>

		<hr>

		<h3> Usage </h3>

		<p> To obtain a list of holidays, simply make a GET request to: <code>http://juanholiday.sourcescript.ph/v1/api</code> </p>

		<div class="row">

			<div class="col-md-6">
				<h4 class="bold-heading"> By Range </h4>
				Make a GET request to:
				<p> <kbd>//juanholiday.sourcescript.ph</kbd></p>
				<p> <kbd> /api/?from=&amp;to=</kbd> </p>
				<p> <code>from</code> and <code>to</code> must be in format <code>Y-m-d</code> <br /> <small> (e.g., 2014-11-23) </small> </p>
			</div>

			<div class="col-md-6">
				<h4 class="bold-heading"> By Y/M/D </h4>
				Make a GET request to:
				<p> <kbd>//juanholiday.sourcescript.ph </kbd> </p>
				<p> <kbd> /api/{year}/{month}/{day} </kbd> </p>
				<p> <code>year</code> must be in format <code>YYYY</code> <br /> <small> (e.g., 2014) </small> </p>
				<p> <code>month</code> can come in <em>any</em> format</p>
				<p> <code>day</code> <em>must</em> be in number format <br /><small> (e.g., 11) </small> </p>
			</div>

		</div>

		<hr >

		<h3> Response: </h3>

		By default, a JSON would be given as response.

		<footer>
			Made with <i class="glyphicon glyphicon-heart heart"></i> by <a href="//sourcescript.ph" class="sourcescript"> SourceScript </a>.
		</footer>

	</div>

	<!-- scripts -->
	<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
