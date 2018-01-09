<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Local extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('Local_Model', 'locais');
        $this->load->model('TelefoneLocal_Model', 'telefoneLocais');
        $this->load->model('Empresa_Model', 'empresas');
        $this->load->model('Endereco_Model', 'enderecos');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        // carrega todos os dados da tabela no banco
        $dados['locais'] = $this->locais->select();
        $dados['telefonesLocais'] = $this->telefoneLocais->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/local/list', $dados);
        $this->load->view('interno/telefoneLocal/list', $dados);
        $this->load->view('include/footer');
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
        $dados['enderecos'] = $this->enderecos->select();
        $dados['empresas'] = $this->empresas->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/local/new', $dados);
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->locais->insert($dados)) {
            $mensagem = "Local cadastrado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Local não foi cadastrado.";
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
        $dados['local'] = $this->locais->find($id);
        $dados['enderecos'] = $this->enderecos->select();
        $dados['empresas'] = $this->empresas->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/local/up', $dados);
        $this->load->view('include/footer');
    }

    public function grava_atualizacao($id) {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à alteração ou não do dado no banco
        if ($this->locais->update($dados, $id)) {
            $mensagem = "Local alterado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Local não foi alterado.";
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
        if ($this->locais->delete($id)) {
            $mensagem = "Local excluído com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Local não foi excluído.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/local');
    }

}
