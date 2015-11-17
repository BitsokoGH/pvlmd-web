<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Dear, {{ $name }}!</h1>

		<div>
			<p>You have successfully registered.</p>
                        <p>Click on the link below to validate your account.</p>
                        <p><a href="{{ URL::to('confirm-registration') }}?e={{$email}}&t={{urlencode($token)}}">Click to Confirm Registration</a></p>
                        <p>Or copy this in the browser <strong>{{ URL::to('confirm-registration') }}?e={{$email}}&t={{urlencode($token)}}</strong></p>
		</div>
	</body>
</html>
