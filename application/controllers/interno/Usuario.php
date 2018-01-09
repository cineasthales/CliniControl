<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // carrega a model
        $this->load->model('Usuario_Model', 'usuarios');
        $this->load->model('Usuario_Convenio_Model', 'usuarioConvenios');
        $this->load->model('Usuario_Telefone_Model', 'usuarioTelefones');
        $this->load->model('Endereco_Model', 'enderecos');
    }

    public function index() {
        // verifica se usuário está logado
        $this->verificaSessao();
        // carrega todos os dados da tabela no banco
        $dados['usuarios'] = $this->usuarios->select();
        $dados['usuarios_convenios'] = $this->usuarioConvenios->select();
        $dados['usuarios_telefones'] = $this->usuarioTelefones->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/usuario/list', $dados);
        $this->load->view('interno/usuario_telefone/list', $dados);
        $this->load->view('interno/usuario_convenio/list', $dados);
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
        $dados['enderecos'] = $this->enderecos->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/usuario/new', $dados);
        $this->load->view('include/footer');
    }

    public function grava_inclusao() {
        // carrega dados do formulário
        $dados = $this->input->post();
        // retorno para usuário em relação à inclusão ou não do dado no banco
        if ($this->usuarios->insert($dados)) {
            $mensagem = "Usuário cadastrado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Usuário não foi cadastrado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/usuario');
    }

    public function atualizar($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        $dados['usuario'] = $this->usuarios->find($id);
        $dados['enderecos'] = $this->enderecos->select();
        // carrega as views
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/usuario/up', $dados);
        $this->load->view('include/footer');
    }

    public function grava_atualizacao($id) {
        // carrega dados do formulário
        $dados = $this->input->post();
        $dados['senha'] = md5($dados['senha']);
        // retorno para usuário em relação à alteração ou não do dado no banco
        if ($this->usuarios->update($dados, $id)) {
            $mensagem = "Usuário alterado com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Usuário não foi alterado.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/usuario');
    }

    public function excluir($id) {
        // verifica se usuário está logado
        $this->verificaSessao();
        // retorno para usuário em relação à exclusão ou não do dado no banco
        if ($this->usuarios->delete($id)) {
            $mensagem = "Usuário excluído com êxito.";
            $tipo = 1;
        } else {
            $mensagem = "Usuário não foi excluído.";
            $tipo = 0;
        }
        // insere mensagem e tipo em dados flash
        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);
        // redireciona para a página da lista de dados
        redirect('interno/usuario');
    }

}
