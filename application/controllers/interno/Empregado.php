<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empregado extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('Empregado_Model', 'empregados');
        $this->load->model('Empregado_Local_Model', 'empregadoLocais');
        $this->load->model('Empregado_Adicional_Model', 'empregadoAdicionais');
        $this->load->model('Empregado_Especialidade_Model', 'empregadoEspecialidades');
        $this->load->model('Cargo_Model', 'cargos');
        $this->load->model('Usuario_Model', 'usuarios');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        // carrega todos os dados da tabela no banco
        $dados['empregados'] = $this->empregados->select();
        $dados['empregados_locais'] = $this->empregadoLocais->select();
        $dados['empregados_adicionais'] = $this->empregadoAdicionais->select();
        $dados['empregados_especialidades'] = $this->empregadoEspecialidades->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/empregado/list', $dados);
        $this->load->view('interno/empregado_local/list', $dados);
        $this->load->view('interno/empregado_adicional/list', $dados);
        $this->load->view('interno/empregado_especialidade/list', $dados);
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
        $dados['cargos'] = $this->cargos->select();
        $dados['usuarios'] = $this->usuarios->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/empregado/new', $dados);
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->empregados->insert($dados)) {
            $mensagem = "Empregado cadastrado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Empregado não foi cadastrado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/empregado');
    }

    public function atualizar($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // encontra dados a partir do id
        $dados['empregado'] = $this->empregados->findAlt($id);
        $dados['cargos'] = $this->cargos->select();
        $dados['usuarios'] = $this->usuarios->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/empregado/up', $dados);
        $this->load->view('include/footer');
    }

    public function grava_atualizacao($id) {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à alteração ou não do dado no banco
        if ($this->empregados->update($dados, $id)) {
            $mensagem = "Empregado alterado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Empregado não foi alterado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/empregado');
    }

    public function excluir($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // retorno para usuário em relação à exclusão ou não do dado no banco
        if ($this->empregados->delete($id)) {
            $mensagem = "Empregado excluído com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Empregado não foi excluído.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/empregado');
    }

}
