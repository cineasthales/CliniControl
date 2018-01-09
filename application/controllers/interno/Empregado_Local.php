<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empregado_Local extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('Empregado_Local_Model', 'empregadoLocais');
        $this->load->model('Empregado_Model', 'empregados');
        $this->load->model('Local_Model', 'locais');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        redirect('interno/empregado');
    }

    public function verificaSessao() {
        // se não estiver logado, redireciona para a página de login
        if (!$this->session->logado_admin_sis && !$this->session->logado_admin_emp) {
            redirect('home');
        }
    }

    public function incluir() {
        // verifica se usuário está logado
        $this->verificaSessao();
        $dados['empregados'] = $this->empregados->select();
        $dados['locais'] = $this->locais->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/empregado_local/new', $dados);
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->empregadoLocais->insert($dados)) {
            $mensagem = "Vínculo cadastrado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Vínculo não foi cadastrado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/empregado');
    }
    
    public function excluir($idEmpregado, $idLocal) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // retorno para usuário em relação à exclusão ou não do dado no banco
        if ($this->empregadoLocais->delete($idEmpregado, $idLocal)) {
            $mensagem = "Vínculo excluído com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Vínculo não foi excluído.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/empregado');
    }

}
