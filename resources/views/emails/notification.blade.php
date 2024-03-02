<!DOCTYPE html>
<html>
<head>
    <title>Welcome to {{ config('app.name') }}</title>
</head>
<body>
    <h1>Welcome to {{ config('app.name') }}</h1>
    <p>Thank you for joining our community, {{ $name }}. We're excited to have you on board.</p>
    <p>Your username is: {{ $username }}</p>
    <p>Your password is: {{ $password }}</p>
    <p>Please make sure to change your password upon your first login for security reasons.</p>
</body>
</html>
