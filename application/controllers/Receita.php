<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Receita extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->verificaSessao();
        $this->load->library('Pdf');
    }

    public function verificaSessao() {
        if (!$this->session->logado_admin_sis && !$this->session->logado_admin_emp && !$this->session->logado_empregado) {
            redirect('home');
        }
    }

    public function gerar($id) {
        // carrega a model
        $this->load->model('Procedimento_model', 'procedimentos');
        $this->load->model('Empregado_model', 'empregados');

        // obtém os registros a serem exibidos no relatório
        $dados = $this->procedimentos->findReceita($id);
        $dados2 = $this->empregados->findReceita($dados->idProfissional);

        // define o título do relatório
        $this->pdf->setTitulo(utf8_decode('Receita'));

        // define as colunas a serem exibidas
        $this->pdf->setColunas(array(
            utf8_decode('Descrição') => 100));
        // uso do contador de páginas
        $this->pdf->AliasNbPages();
        // adiciona uma página
        $this->pdf->AddPage();

        // percorre as linhas obtidas
        //foreach ($dados as $linha) {
        $this->pdf->Cell(100, 8, utf8_decode($dados->tipo . ' realizado(a) em ' . 
                date_format(date_create($dados->data), 'd/m/Y') . ' às ' .
                $dados->hora), 0, 1);
        $this->pdf->Cell(100, 8, 'Paciente: ' . utf8_decode($dados->nome . ' ' . $dados->sobrenome), 0, 1);
        $this->pdf->Cell(100, 8, '', 0, 1);        
        $this->pdf->Cell(100, 8, '', 0, 1);
        $this->pdf->Cell(100, 8, '', 0, 1); 
        $this->pdf->Cell(200, 8, utf8_decode($dados->receita), 0, 1);        
        $this->pdf->Cell(100, 8, '', 0, 1);        
        $this->pdf->Cell(100, 8, '', 0, 1);
        $this->pdf->Cell(100, 8, '', 0, 1);
        $this->pdf->Cell(100, 8, '', 0, 1);
        $this->pdf->Cell(100, 8, '__________________________', 0, 1);
        $this->pdf->Cell(100, 8, utf8_decode('Dr. ' . $dados->nomeProf . ' ' . $dados->sobrenomeProf), 0, 1);
        $this->pdf->Cell(100, 8, utf8_decode($dados2->tipo) . ' ' . $dados2->registro, 0, 1);

        // gera o relatório
        $this->pdf->Output();
    }
}
