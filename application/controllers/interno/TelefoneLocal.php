<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TelefoneLocal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('TelefoneLocal_Model', 'telefoneLocais');
        $this->load->model('Local_Model', 'locais');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        redirect('interno/local');
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
        $dados['locais'] = $this->locais->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/telefoneLocal/new', $dados);
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->telefoneLocais->insert($dados)) {
            $mensagem = "Telefone cadastrado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Telefone não foi cadastrado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/local');
    }

    public function atualizar($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // encontra dados a partir do id
        $dados['telefoneLocal'] = $this->telefoneLocais->findAlt($id);
        $dados['locais'] = $this->locais->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/telefoneLocal/up', $dados);
        $this->load->view('include/footer');
    }

    public function grava_atualizacao($id) {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à alteração ou não do dado no banco
        if ($this->telefoneLocais->update($dados, $id)) {
            $mensagem = "Telefone alterado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Telefone não foi alterado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/local');
    }

    public function excluir($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // retorno para usuário em relação à exclusão ou não do dado no banco
        if ($this->telefoneLocais->delete($id)) {
            $mensagem = "Telefone excluído com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Telefone não foi excluído.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/local');
    }

}
