<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOCI LAB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('js')
    <script>
        document.getElementById('gerar-pdf').addEventListener('click', function() {
            fetch('https://api.pdfshift.io/v2/convert/html', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Basic ' + btoa('YOUR_API_KEY' + ':')
                    },
                    body: JSON.stringify({
                        'source': '<html><head></head><body><h1>Hello, PDF!</h1></body></html>',
                        'landscape': false,
                        'use_print': false,
                        'margins': {
                            'unit': 'in',
                            'top': 1,
                            'bottom': 1,
                            'left': 0.5,
                            'right': 0.5
                        },
                        'format': 'A4',
                        'encoding': 'utf-8'
                    })
                })
                .then(response => response.blob())
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'pagina.pdf';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .catch(error => console.error('Erro:', error));
        });
    </script>
</body>

</html>
