<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARIB - PHP Assessment</title>
    <link rel="icon" href="https://arib.com.sa/media/ne3jywqg/fav.png" type="image/x-icon">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #007acc, #005f99);
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .logo {
            width: 150px;
            margin: 0 auto 20px;
        }
        h1 {
            font-size: 2.5em;
            color: #007acc;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .features {
            text-align: left;
            margin-top: 30px;
        }
        .features h2 {
            font-size: 1.8em;
            color: #333;
            margin-bottom: 15px;
        }
        .features ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .features li {
            display: flex;
            align-items: center;
            padding: 15px;
            margin: 10px 0;
            background-color: #f0f4f8;
            border-radius: 8px;
            font-size: 1.1em;
        }
        .features li::before {
            content: '✓';
            color: #007acc;
            font-weight: bold;
            font-size: 1.2em;
            margin-right: 10px;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        .btn {
            padding: 12px 30px;
            color: #ffffff;
            background-color: #007acc;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1em;
            transition: background-color 0.3s;
            display: inline-block;
        }
        .btn:hover {
            background-color: #005f99;
        }
        h1 span {
            color: #007acc;
            font-weight: bold;
            font-style: italic;
            font-size: 1.2em;
            padding: 5px 10px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 122, 204, 0.4);
            display: inline-block;
            transform: skewX(-10deg);
        }
    </style>
</head>
<body>

<div class="container">
    <img src="https://arib.com.sa/media/xemigi1x/group-19387-1.svg" alt="ARIB Logo" class="logo">
    <h1> <span>ARIB</span> - PHP Assessment</h1>
    <p>Welcome to my PHP Assessment project! This mini portfolio demonstrates a simple employee management system built with PHP, offering features for managing employees, tasks, and departments efficiently.</p>

    <div class="features">
        <h2>Key Features</h2>
        <ul>
            <li><strong>Login Screen:</strong> Secure login using email or phone number with a complex password.</li>
            <li><strong>Employee Management:</strong> Add, edit, search, and delete employee records seamlessly.</li>
            <li><strong>Task Assignment:</strong> Allows managers to assign tasks and track progress for their employees.</li>
            <li><strong>Department Management:</strong> Manage departments with employee counts and salary summaries.</li>
        </ul>
    </div>

    <div class="button-group">
        <a href="https://github.com/Mahmoud-kamal12/arib.git" class="btn" target="_blank">View on GitHub</a>
        <a href="{{route('login')}}" class="btn" target="_blank">Go to Login</a>
    </div>
</div>

</body>
</html>
