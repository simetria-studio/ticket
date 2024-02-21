<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Milon\Barcode\DNS1D;
use ZendPdf\PdfDocument;
use Zend\Barcode\Barcode;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        // Recebe os dados da requisição
        $dados = $request->all();

        // Extrai os valores recebidos
        $primeiro = $dados['primeiro'];
        $ultimo = $dados['ultimo'];
        $sufixo = $dados['sufixo'];
        $prefixo = $dados['prefixo'];

        // Gera os números sequenciais com sufixo e prefixo
        $codigos = $this->gerarNumerosSequenciais($primeiro, $ultimo, $sufixo, $prefixo);

        // Gera as imagens dos códigos de barras
        $imagens = [];
        foreach ($codigos as $codigo) {
            $imagens[] = DNS1D::getBarcodeSVG($codigo, 'C39', 2, 70);
        }

        // Cria uma nova instância do Dompdf
        $pdf = new Dompdf();

        // Renderiza a view 'pdf' com os dados dos códigos de barras
        $html = view('pdf', ['imagens' => $imagens])->render();


        return view('code', ['imagens' => $imagens] );

        // return $html;

        // // Carrega o HTML gerado no Dompdf
        // $pdf->loadHtml($html);

        // // Define o tamanho e a orientação do papel
        // $pdf->setPaper('A4', 'portrait');

        // // Renderiza o PDF
        // $pdf->render();

        // // Retorna a resposta HTTP com o conteúdo do PDF
        // return $pdf->stream('codigos_de_barras.pdf');
    }


    public function gerarNumerosSequenciais($primeiro, $ultimo, $sufixo, $prefixo)
    {
        $numeros = [];

        // Itera de $primeiro até $ultimo
        for ($i = $primeiro; $i <= $ultimo; $i++) {
            // Adiciona o prefixo, o número e o sufixo ao array
            $numeros[] = $prefixo . $i . $sufixo;
        }

        return $numeros;
    }
}
