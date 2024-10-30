<!-- resources/views/emails/user_registered.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Community!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #333333;
        }
        p {
            color: #555555;
            line-height: 1.6;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777777;
            text-align: center;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Community, {{ $user->name }}!</h1>
        <p>We are thrilled to have you on board! Thank you for registering with us. Your email is <strong>{{ $user->email }}</strong>.</p>
        <p>As a member, you will gain access to a wealth of resources, exclusive content, and a vibrant community of like-minded individuals. We encourage you to explore and make the most of your experience!</p>
        
        <p>To get started, we invite you to log in to your account and set up your profile. This will help you connect with others and personalize your experience:</p>
        <a href="{{ url('/login') }}" class="btn">Log in to Your Account</a>

        <p>If you have any questions or need assistance, feel free to reach out to our support team at any time. We are here to help you!</p>
        <p>Once again, welcome aboard! We are excited to see you thrive in our community.</p>
        
        <div class="footer">
            <p>Best Regards,<br>Your Company Name</p>
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
