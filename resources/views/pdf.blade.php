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
            width: 16cm;
       
        }


        .container {
            width: 100%;
        }

        .col-4 {
            width: 33mm;
            /* Largura de 33mm */
            height: 17mm;
            /* Altura de 17mm */
            margin: 3mm 8mm !important;
            /* Espaçamento de 3mm em todos os lados */
            float: left;
            page-break-inside: avoid;
            margin-top: 3mm !important;
            /* Ajuste o espaçamento superior se necessário */
        }

        .data {
            text-align: center;
            font-size: 10px;
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
                    <p class="data">Validade: {{ date('d/m/Y', strtotime($data)) }}</p>
                    <img src="data:image/svg+xml;base64,{{ base64_encode($imagem) }}" alt="Código de Barras">
                </div>
            @endforeach
        </div>
    </page>
</body>

</html>
