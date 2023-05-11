<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img class="img" src="{{ asset('images/icons/bg.jpg') }}" alt="">

    <div class="view_wrapper">
        <a href="file:///android_asset/shortcut.html" target="_BLANK" class="view">THIS IS DEMO</a>
    </div>

    <style>
        .img{
            height: 100vh;
            width: 100%;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            overflow: hidden;
        }
        .view_wrapper {
            display: flex;
            align-items: center;
            z-index: 999;
            position: relative;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }
        a.view {
            padding: 1rem;
            border-radius: 7px;
            outline: none;
            background: none;
            border: none;
            backdrop-filter: blur(37px);
            box-shadow: 5px 5px 15px #016f8d, -5px -5px 15px #005f9d;
            cursor: pointer;
            color: black;
            text-decoration: none;
        }
    </style>
</body>
</html>
