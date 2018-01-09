<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidade extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('Especialidade_Model', 'especialidades');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        // carrega todos os dados da tabela no banco
        $dados['especialidades'] = $this->especialidades->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/especialidade/list', $dados);
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
        $this->load->view('interno/especialidade/new');
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->especialidades->insert($dados)) {
            $mensagem = "Especialidade cadastrada com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Especialidade não foi cadastrada.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/especialidade');
    }
    
    public function atualizar($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // encontra dados a partir do id
        $dados['especialidade'] = $this->especialidades->find($id);
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/especialidade/up', $dados);
        $this->load->view('include/footer');
    }

    public function grava_atualizacao($id) {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à alteração ou não do dado no banco
        if ($this->especialidades->update($dados, $id)) {
            $mensagem = "Especialidade alterada com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Especialidade não foi alterada.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/especialidade');
    }
    
    public function excluir($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // retorno para usuário em relação à exclusão ou não do dado no banco
        if ($this->especialidades->delete($id)) {
            $mensagem = "Especialidade excluída com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Especialidade não foi excluída.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/especialidade');
    }

}


