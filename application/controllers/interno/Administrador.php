<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('Administrador_Model', 'administradores');
        $this->load->model('Empregado_Model', 'empregados');
        $this->load->model('Empresa_Model', 'empresas');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        redirect('interno/empresa');
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
        $dados['empresas'] = $this->empresas->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/administrador/new', $dados);
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->administradores->insert($dados)) {
            $mensagem = "Administrador cadastrado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Administrador não foi cadastrado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/empresa');
    }

    public function excluir($idEmpresa, $idEmpregado) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // retorno para usuário em relação à exclusão ou não do dado no banco
        if ($this->administradores->delete($idEmpresa, $idEmpregado)) {
            $mensagem = "Administrador excluído com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Administrador não foi excluído.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/empresa');
    }

}
