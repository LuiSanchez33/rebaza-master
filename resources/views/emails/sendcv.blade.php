<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send CV</title>
</head>
<body>
    <div style="width: 70%;margin: 15px auto;background-color: #f1f1f1;border: 1px solid #CCCCCC;padding:15px">
        <ul style="list-style-type: none;padding-left: 0">
            <li>
                <strong>Nombre:</strong> {{ $nombre }}
            </li>
            <li>
                <strong>Correo:</strong> {{ $correo }}
            </li>
            <li>
                <strong>Mensaje:</strong>
                <blockquote>{{ $mensaje }}</blockquote>
            </li>
        </ul>
    </div>
</body>
</html>