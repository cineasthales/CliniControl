<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TipoProcedimento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('TipoProcedimento_Model', 'tiposProcedimento');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        redirect('interno/procedimento');
    }

    public function verificaSessao() {
        // se não estiver logado, redireciona para a página de login
        if (!$this->session->logado_admin_sis) {
            redirect('home');
        }
    }

    public function incluir() {
        // verifica se usuário está logado
        $this->verificaSessao();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/tipoProcedimento/new');
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->tiposProcedimento->insert($dados)) {
            $mensagem = "Tipo de procedimento cadastrado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Tipo de procedimento não foi cadastrado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/procedimento');
    }
    
    public function atualizar($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // encontra dados a partir do id
        $dados['tipoProcedimento'] = $this->tiposProcedimento->find($id);        
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/tipoProcedimento/up', $dados);
        $this->load->view('include/footer');
    }

    public function grava_atualizacao($id) {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à alteração ou não do dado no banco
        if ($this->tiposProcedimento->update($dados, $id)) {
            $mensagem = "Tipo de procedimento alterado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Tipo de procedimento não foi alterado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/procedimento');
    }
    
    public function excluir($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // retorno para usuário em relação à exclusão ou não do dado no banco
        if ($this->tiposProcedimento->delete($id)) {
            $mensagem = "Tipo de procedimento excluído com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Tipo de procedimento não foi excluído.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/procedimento');
    }

}

