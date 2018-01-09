<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Telefone extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('Usuario_Telefone_Model', 'usuarioTelefones');
        $this->load->model('Usuario_Model', 'usuarios');
        $this->load->model('Telefone_Model', 'telefones');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        redirect('interno/usuario');
    }

    public function verificaSessao() {
        // se não estiver logado, redireciona para a página de login
        if (!$this->session->logado_admin_sis && !$this->session->logado_admin_emp
                && !$this->session->logado_empregado) {
            redirect('home');
        }
    }

    public function incluir() {
        // verifica se usuário está logado
        $this->verificaSessao();
        $dados['usuarios'] = $this->usuarios->select();
        $dados['telefones'] = $this->telefones->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/usuario_telefone/new', $dados);
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->usuarioTelefones->insert($dados)) {
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
        redirect('interno/usuario');
    }

    public function excluir($idUsuario, $idTelefone) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // retorno para usuário em relação à exclusão ou não do dado no banco
        if ($this->usuarioTelefones->delete($idUsuario, $idTelefone)) {
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
        redirect('interno/usuario');
    }

}
