<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Credentials</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    
    <p>Your operator credentials have been created successfully:</p>
    
    <p>Email: {{ $user->email }}</p>
    <p>Password: {{ $password }}</p>
    
    <p>You can use these credentials to login to your account.</p>
    
    <p>Thank you!</p>
</body>
</html>
