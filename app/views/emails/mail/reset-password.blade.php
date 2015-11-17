<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Dear, {{ $name }}!</h1>

		<div>
			<p>You have request to change your password</p>
                        <p>Click on the link below reset your password.</p>
                        <p><a href="{{ URL::to('set-password') }}?e={{$email}}&t={{$token}}">Click to Reset Password</a></p>
                        <p>Or copy this in the browser <strong>{{ URL::to('set-password') }}?e={{$email}}&t={{$token}}</strong></p>
		</div>
	</body>
</html>