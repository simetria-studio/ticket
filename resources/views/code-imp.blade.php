<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @foreach ($imagens as $imagem)
        <div >
            <img src="data:image/svg+xml;base64,{{ base64_encode($imagem) }}" alt="Código de Barras">
        </div>
    @endforeach
</body>

</html>
