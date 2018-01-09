<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

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

    public function usuariosPorIdade() {
        // carrega a model
        $this->load->model('Usuario_model', 'usuarios');

        // obtém os registros a serem exibidos no relatório
        $dados = $this->usuarios->selectIdade();

        // define o título do relatório
        $this->pdf->setTitulo(utf8_decode('Relatório de Usuários por Idade'));

        // define as colunas a serem exibidas
        $this->pdf->setColunas(array(
            'Idade' => 15,
            'Id' => 10,
            'Nome' => 70,
            'CPF' => 35,
            'E-mail' => 70));

        // uso do contador de páginas
        $this->pdf->AliasNbPages();
        // adiciona uma página
        $this->pdf->AddPage();

        // percorre as linhas obtidas
        foreach ($dados as $linha) {
            $this->pdf->Cell(15, 8, date_diff(date_create($linha->dataNasc), date_create('today'))->y);
            $this->pdf->Cell(10, 8, $linha->id);
            $this->pdf->Cell(70, 8, utf8_decode($linha->nome) . ' ' . utf8_decode($linha->sobrenome));
            $this->pdf->Cell(35, 8, substr($linha->cpf, 0, 3) . '.' . substr($linha->cpf, 3, 3) . '.'
                    . substr($linha->cpf, 6, 3) . '-' . substr($linha->cpf, 9, 2));
            $this->pdf->Cell(70, 8, utf8_decode($linha->email), 0, 1);
        }

        // gera o relatório
        $this->pdf->Output();
    }

    public function usuariosPorConvenio() {
        // carrega a model
        $this->load->model('Usuario_Convenio_model', 'usuariosConvenio');

        // obtém os registros a serem exibidos no relatório
        $dados = $this->usuariosConvenio->selectConvenio();

        // define o título do relatório
        $this->pdf->setTitulo(utf8_decode('Relatório de Usuários por Convênio'));

        // define as colunas a serem exibidas
        $this->pdf->setColunas(array(
            utf8_decode('Convênio') => 30,
            'Id' => 10,
            'Nome' => 60,
            'CPF' => 35,
            'E-mail' => 60));

        // uso do contador de páginas
        $this->pdf->AliasNbPages();
        // adiciona uma página
        $this->pdf->AddPage();

        // percorre as linhas obtidas
        foreach ($dados as $linha) {
            $this->pdf->Cell(30, 8, $linha->convenio);
            $this->pdf->Cell(10, 8, $linha->idUsuario);
            $this->pdf->Cell(60, 8, utf8_decode($linha->nome) . ' ' . utf8_decode($linha->sobrenome));
            $this->pdf->Cell(35, 8, substr($linha->cpf, 0, 3) . '.' . substr($linha->cpf, 3, 3) . '.'
                    . substr($linha->cpf, 6, 3) . '-' . substr($linha->cpf, 9, 2));
            $this->pdf->Cell(60, 8, utf8_decode($linha->email), 0, 1);
        }

        // gera o relatório
        $this->pdf->Output();
    }

    public function empregadosPorCargo() {
        // carrega a model
        $this->load->model('Empregado_model', 'empregados');

        // obtém os registros a serem exibidos no relatório
        $dados = $this->empregados->selectCargo();

        // define o título do relatório
        $this->pdf->setTitulo(utf8_decode('Relatório de Empregados por Cargo'));

        // define as colunas a serem exibidas
        $this->pdf->setColunas(array(
            'Cargo' => 45,
            'Id' => 10,
            'Nome' => 60,
            'Registro' => 50,
            utf8_decode('Salário') => 15));

        // uso do contador de páginas
        $this->pdf->AliasNbPages();
        // adiciona uma página
        $this->pdf->AddPage();

        // percorre as linhas obtidas
        foreach ($dados as $linha) {
            $this->pdf->Cell(45, 8, utf8_decode($linha->cargo));
            $this->pdf->Cell(10, 8, $linha->idUsuario);
            $this->pdf->Cell(60, 8, utf8_decode($linha->nome) . ' ' . utf8_decode($linha->sobrenome));
            $this->pdf->Cell(50, 8, $linha->tipo . ' ' . $linha->registro);
            $this->pdf->Cell(15, 8, number_format($linha->salario, 2, ',', '.'), 0, 1);
        }

        // gera o relatório
        $this->pdf->Output();
    }

    public function numEmpregadosPorLocal() {
        // carrega a model
        $this->load->model('Local_model', 'locais');

        // obtém os registros a serem exibidos no relatório
        $dados = $this->locais->countEmpregados();

        // define o título do relatório
        $this->pdf->setTitulo(utf8_decode('Relatório de Número de Empregados por Local'));

        // define as colunas a serem exibidas
        $this->pdf->setColunas(array(
            'Id' => 10,
            'Local' => 50,
            'Empresa' => 60,
            'CNPJ' => 40,
            utf8_decode('Nº Empregados') => 20));

        // uso do contador de páginas
        $this->pdf->AliasNbPages();
        // adiciona uma página
        $this->pdf->AddPage();

        // percorre as linhas obtidas
        foreach ($dados as $linha) {
            $this->pdf->Cell(10, 8, $linha->idLocal);
            $this->pdf->Cell(50, 8, $linha->local);
            $this->pdf->Cell(60, 8, $linha->empresa);
            $this->pdf->Cell(40, 8, substr($linha->cnpj, 0, 2) . '.' . substr($linha->cnpj, 2, 3) . '.' .
                    substr($linha->cnpj, 5, 3) . '/' . substr($linha->cnpj, 8, 4) . '-' .
                    substr($linha->cnpj, 12, 2));
            $this->pdf->Cell(20, 8, $linha->numLocal, 0, 1);
        }

        // gera o relatório
        $this->pdf->Output();
    }

    public function procedimentosPorPaciente() {
        // carrega a model
        $this->load->model('Procedimento_model', 'procedimentos');

        // obtém os registros a serem exibidos no relatório
        $dados = $this->procedimentos->selectPorUsuario();

        // define o título do relatório
        $this->pdf->setTitulo(utf8_decode('Relatório de Procedimentos por Paciente'));

        // define as colunas a serem exibidas
        $this->pdf->setColunas(array(
            'Id' => 10,
            'Paciente' => 60,
            'CPF' => 35,
            'E-mail' => 55,
            'Procedimento' => 30));

        // uso do contador de páginas
        $this->pdf->AliasNbPages();
        // adiciona uma página
        $this->pdf->AddPage();

        // percorre as linhas obtidas
        foreach ($dados as $linha) {
            $this->pdf->Cell(10, 8, $linha->idPaciente);
            $this->pdf->Cell(60, 8, utf8_decode($linha->nome . ' ' . $linha->sobrenome));
            $this->pdf->Cell(35, 8, substr($linha->cpf, 0, 3) . '.' . substr($linha->cpf, 3, 3) . '.'
                    . substr($linha->cpf, 6, 3) . '-' . substr($linha->cpf, 9, 2));
            $this->pdf->Cell(55, 8, $linha->email);
            $this->pdf->Cell(30, 8, utf8_decode($linha->tipo), 0, 1);
        }

        // gera o relatório
        $this->pdf->Output();
    }

    public function procedimentosPorProfissional() {
        // carrega a model
        $this->load->model('Procedimento_model', 'procedimentos');

        // obtém os registros a serem exibidos no relatório
        $dados = $this->procedimentos->selectPorProfissional();

        // define o título do relatório
        $this->pdf->setTitulo(utf8_decode('Relatório de Procedimentos por Profissional de Saúde'));

        // define as colunas a serem exibidas
        $this->pdf->setColunas(array(
            'Id' => 10,
            'Profissional Encarregado' => 60,
            'CPF' => 35,
            'E-mail' => 55,
            'Procedimento' => 30));

        // uso do contador de páginas
        $this->pdf->AliasNbPages();
        // adiciona uma página
        $this->pdf->AddPage();

        // percorre as linhas obtidas
        foreach ($dados as $linha) {
            $this->pdf->Cell(10, 8, $linha->idPaciente);
            $this->pdf->Cell(60, 8, utf8_decode($linha->nome . ' ' . $linha->sobrenome));
            $this->pdf->Cell(35, 8, substr($linha->cpf, 0, 3) . '.' . substr($linha->cpf, 3, 3) . '.'
                    . substr($linha->cpf, 6, 3) . '-' . substr($linha->cpf, 9, 2));
            $this->pdf->Cell(55, 8, $linha->email);
            $this->pdf->Cell(30, 8, utf8_decode($linha->tipo), 0, 1);
        }

        // gera o relatório
        $this->pdf->Output();
    }

    public function procedimentosPorData() {
        // carrega a model
        $this->load->model('Procedimento_model', 'procedimentos');

        // obtém os registros a serem exibidos no relatório
        $dados = $this->procedimentos->selectPorData();

        // define o título do relatório
        $this->pdf->setTitulo(utf8_decode('Relatório de Procedimentos Realizados por Data'));

        // define as colunas a serem exibidas
        $this->pdf->setColunas(array(
            'Data' => 25,
            'Id' => 10,
            'Procedimento' => 35,
            'Profissional Encarregado' => 60,
            'Paciente' => 60));

        // uso do contador de páginas
        $this->pdf->AliasNbPages();
        // adiciona uma página
        $this->pdf->AddPage();

        // percorre as linhas obtidas
        foreach ($dados as $linha) {
            $this->pdf->Cell(25, 8, date_format(date_create($linha->data), 'd/m/Y'));
            $this->pdf->Cell(10, 8, $linha->id);
            $this->pdf->Cell(35, 8, utf8_decode($linha->tipo));            
            $this->pdf->Cell(60, 8, utf8_decode($linha->nomeProf . ' ' . $linha->sobrenomeProf));
            $this->pdf->Cell(60, 8, utf8_decode($linha->nome . ' ' . $linha->sobrenome), 0, 1);
        }

        // gera o relatório
        $this->pdf->Output();
    }
}
