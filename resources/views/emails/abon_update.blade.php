<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement Update Notification</title>
</head>
<body>
    <h2>Abonnement Update Notification</h2>
    
    <p>Dear {{ $user->name }},</p>
    
    <p>We are writing to inform you that your abonnement has been updated.</p>
    
    <p><strong>Updated Plan Details:</strong></p>
    <ul>
        <li><strong>Name:</strong> {{ $plan->name }}</li>
        <li><strong>Price:</strong> {{ $plan->price }}</li>
        <li><strong>Duration in Days:</strong> {{ $plan->duration_in_days }}</li>
    </ul>
    
    <p>If you have any questions or concerns regarding this update, please feel free to contact us.</p>
    
    <p>Thank you for choosing our services.</p>
    
    <p>Best regards,<br>MOl Restaurent</p>
</body>
</html>
