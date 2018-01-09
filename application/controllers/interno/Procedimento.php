<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Procedimento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('Procedimento_Model', 'procedimentos');
        $this->load->model('TipoProcedimento_Model', 'tiposProcedimento');
        $this->load->model('Usuario_Model', 'usuarios');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        // carrega todos os dados da tabela no banco
        $dados['procedimentos'] = $this->procedimentos->select();        
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/procedimento/list', $dados);
        if ($this->session->logado_admin_sis) {
            $dados['tiposProcedimentos'] = $this->tiposProcedimento->select();
            $this->load->view('interno/tipoProcedimento/list', $dados);
        }        
        $this->load->view('include/footer');
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
        $dados['tiposProcedimento'] = $this->tiposProcedimento->select();
        $dados['pacientes'] = $this->usuarios->select();
        $dados['profissionais'] = $this->usuarios->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/procedimento/new', $dados);
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->procedimentos->insert($dados)) {
            $mensagem = "Procedimento cadastrado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Procedimento não foi cadastrado.";
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
        $dados['procedimento'] = $this->procedimentos->find($id);
        $dados['tiposProcedimento'] = $this->tiposProcedimento->select();
        $dados['pacientes'] = $this->usuarios->select();
        $dados['profissionais'] = $this->usuarios->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/procedimento/up', $dados);
        $this->load->view('include/footer');
    }

    public function grava_atualizacao($id) {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à alteração ou não do dado no banco
        if ($this->procedimentos->update($dados, $id)) {
            $mensagem = "Procedimento alterado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Procedimento não foi alterado.";
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
        if ($this->procedimentos->delete($id)) {
            $mensagem = "Procedimento excluído com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Procedimento não foi excluído.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/procedimento');
    }

}
