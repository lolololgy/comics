<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Comic Collectie')</title>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fef3c7;
            font-family: 'Bangers', cursive;
            padding: 20px;
        }

        h1, h2 {
            color: #d00000;
            text-shadow: 2px 2px #ffea00;
        }

        a {
            color: #0057b7;
            text-decoration: none;
            font-weight: bold;
        }

        .comic-card {
            background: white;
            border: 4px solid #000;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 5px 5px #222;
        }

        form, input, select, button, label {
            display: block;
            margin: 10px 0;
            font-family: sans-serif;
        }

        button {
            background-color: #ffdd00;
            border: 2px solid #000;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
@yield('content')
</body>
</html>
