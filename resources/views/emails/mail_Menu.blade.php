<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Creation Confirmation</title>
</head>
<body>
    <p>Hello {{ $user->name }},<br>I hope this mail finde you in greate moment</p>
    
    <p>Your menu has been successfully created.</p>
    
    <p>Here are the details:</p>
    <ul>
        <li>Name: {{ $menu->name }}</li>
        <li>Description: {{ $menu->description }}</li>
    </ul>
    <p>You can add items in it</p>
    
    <p>Thank you!</p>
</body>
</html>
