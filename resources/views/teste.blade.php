<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
</head>
<body>

    <style>
        body {
            width: 100vw;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .box {
            display: block;
            width: 200px;
            height: 200px;
            background-color: cornflowerblue;
            position: relative;
        }

        button {
            position: absolute;
            right: -10px;
            bottom: -10px;
        }
    </style>

    <div class="box">
        <button>X</button>
    </div>
    
</body>
</html>