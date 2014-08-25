<!DOCTYPE html>
<html lang="en">
<head>
	<title ng-bind="$state.data.pageTitle"> Titulo </title>
	<meta charset="utf-8">

	<!-- stylesheets -->
	<link href="/assets/css/panel.css" rel="stylesheet" type="text/css">
	<link href="/assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<base href="/panel/">
</head>

<body>
	<div class="container">
		<div ui-view></div>
	</div>

	<!-- scripts -->
	<script src="/assets/js/libs.js"></script>
	<script src="/assets/js/build.js"></script>
</body>
</html>