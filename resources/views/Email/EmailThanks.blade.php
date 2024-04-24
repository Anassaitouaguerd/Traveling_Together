<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank You for Choosing Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .message {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }
        .signature {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            <p>Dear {{$user->name}},</p>
            <p>We would like to express our sincere gratitude for choosing our platform for your train ticket reservations. Your trust in us is greatly appreciated.</p>
            <p>Should you have any questions or require assistance at any point, please do not hesitate to reach out to our customer support team. We are here to ensure your journey is smooth and hassle-free.</p>
            <p>Thank you once again for choosing us. We look forward to serving you in the future.</p>
        </div>
        <div class="signature">
            <p>Best regards,</p>
            <p>Anass Ait Ouaguerd</p>
            <p>Travelling Together</p>
        </div>
    </div>
</body>
</html>
