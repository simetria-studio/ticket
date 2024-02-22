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
        $data = $dados['data'];

        // Gera os números sequenciais com sufixo e prefixo
        $codigos = $this->gerarNumerosSequenciais($primeiro, $ultimo, $sufixo, $prefixo, 3);

        // Gera as imagens dos códigos de barras
        $imagens = [];
        foreach ($codigos as $codigo) {
            $imagens[] = DNS1D::getBarcodeSVG($codigo, 'C39', 2, 70);
        }

        // Cria uma nova instância do Dompdf
        $pdf = new Dompdf();


        $html = view('pdf', get_defined_vars())->render();


        return view('code', get_defined_vars());


    }


    public function gerarNumerosSequenciais($primeiro, $ultimo, $sufixo, $prefixo, $repeticoes)
    {
        $numeros = [];
    
        // Itera de $primeiro até $ultimo
        for ($i = $primeiro; $i <= $ultimo; $i++) {
            // Repete o número conforme especificado
            for ($j = 0; $j < $repeticoes; $j++) {
                // Adiciona o prefixo, o número e o sufixo ao array
                $numeros[] = $prefixo . $i . $sufixo;
            }
        }
    
        return $numeros;
    }
}
