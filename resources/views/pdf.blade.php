<!DOCTYPE html>
<html>

<head>
    <title>Códigos de Barras</title>

</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        page[size="A4"] {
            width: 10.7cm;

        }


        .container {
            width: 100%;
        }

        .col-4 {
            width: calc(33.33% - 20px);
            float: left;
            margin: 4px !important;
            height: 64px !important;
            width: 144px !important;
            page-break-inside: avoid;
            margin-top: 25px !important;

        }
        .data{
            text-align: center;
            font-size: 12px;
        }

        img {
            width: 100%;
            height: 100%;
        }
    </style>

    <page size="A4">
        <div class="container">
            @foreach ($imagens as $key => $imagem)
                <div class="col-4">
                    <p class="data">Data: {{ date('d/m/Y', strtotime($data)) }}</p>
                    <img src="data:image/svg+xml;base64,{{ base64_encode($imagem) }}" alt="Código de Barras">
                </div>
            @endforeach
        </div>
    </page>
</body>

</html>
