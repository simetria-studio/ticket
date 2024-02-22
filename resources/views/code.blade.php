@extends('layouts.default')


@section('content')
    <div class="my-3">
        <button type="button" class="btn btn-primary" id="imprimir">IMPRIMIR</button>
    </div>
    <div class="row">
        @foreach ($imagens as $key => $imagem)
            <div class="col-4 my-2">
                <p>Validade: {{ date('d/m/Y', strtotime($data)) }}</p>
                <img src="data:image/svg+xml;base64,{{ base64_encode($imagem) }}" alt="Código de Barras">
            </div>
        @endforeach

        <div class="conteudo d-none">
            @include('pdf', get_defined_vars())
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.getElementById('imprimir').addEventListener('click', function() {
            const conteudo = document.querySelector('.conteudo').innerHTML;
            const janela = window.open('', '', 'width=800, height=600');
            janela.document.write('<html><head>');
            janela.document.write('<title>Imprimir</title>');
            janela.document.write('</head><body>');
            janela.document.write(conteudo);
            janela.document.write('</body></html>');
            janela.document.close();
            janela.print();
        });
    </script>
@endsection
