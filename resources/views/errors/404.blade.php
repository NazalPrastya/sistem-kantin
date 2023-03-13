<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            margin: 0;
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 50px 20px;
        }
        h1 {
            font-size: 60px;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        a {
            color: #333;
            display: block;
            text-decoration: underline;
            text-align: center;
            margin-left:auto;
            margin-right:auto;

        }
        .container img{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Oops!</h1>
        <p>We couldn't find the page you were looking for.</p>
        <img src="/img/eror.svg" width="300" alt="eror" >
        <a href="{{ url('/') }}">Go to Home</a>
    </div>
</body>
</html>
