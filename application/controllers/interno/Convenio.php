<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Convenio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('Convenio_Model', 'convenios');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        // carrega todos os dados da tabela no banco
        $dados['convenios'] = $this->convenios->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/convenio/list', $dados);
        $this->load->view('include/footer');
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
        $this->load->view('interno/convenio/new');
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->convenios->insert($dados)) {
            $mensagem = "Convênio cadastrado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Convênio não foi cadastrado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/convenio');
    }
    
    public function atualizar($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // encontra dados a partir do id
        $dados['convenio'] = $this->convenios->find($id);        
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/convenio/up', $dados);
        $this->load->view('include/footer');
    }

    public function grava_atualizacao($id) {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à alteração ou não do dado no banco
        if ($this->convenios->update($dados, $id)) {
            $mensagem = "Convênio alterado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Convênio não foi alterado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/convenio');
    }
    
    public function excluir($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // retorno para usuário em relação à exclusão ou não do dado no banco
        if ($this->convenios->delete($id)) {
            $mensagem = "Convênio excluído com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Convênio não foi excluído.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/convenio');
    }

}