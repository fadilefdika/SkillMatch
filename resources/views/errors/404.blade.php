<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background-color: #F3F4F6;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .title {
            font-size: 48px;
            font-weight: bold;
            color: #333;
            margin: 0;
        }
        .message {
            font-size: 18px;
            color: #555;
            margin-top: 10px;
            margin-bottom: 30px;
        }
        .btn-back-home {
            background-color: #6635F1;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            display: inline-block;
        }
        .btn-back-home:hover {
            background-color: #502bb0;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Icon Section -->
        <div class="icon-container">
            <img src="{{asset('assets/logos/logo.svg')}}" alt="logo">
        </div>

        <!-- Title and Message -->
        <h1 class="title">404</h1>
        <p class="message">Oops! We can't find the page you're looking for.</p>
        <p class="message">It seems like this page doesn't exist or has been moved.</p>

        <!-- Back to Home Button -->
        <a href="{{ url('/') }}" class="btn-back-home">Go Back Home</a>
    </div>

    <!-- Optional: Include Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
