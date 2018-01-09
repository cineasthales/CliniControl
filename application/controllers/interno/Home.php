<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('interno/home');
        $this->load->view('include/footer');
    }

    public function meusdados() {
        $this->load->model('usuario_model', 'usuarios');
        $this->load->model('endereco_model', 'enderecos');
        $this->load->model('usuario_telefone_model', 'usuarios_telefones');
        $this->load->model('usuario_convenio_model', 'usuarios_convenios');

        $dados['paciente'] = $this->usuarios->find($this->session->userdata('id'));
        $dados['endereco'] = $this->enderecos->find($dados['paciente']->idEndereco);
        $dados['telefones'] = $this->usuarios_telefones->find($this->session->userdata('id'));
        $dados['convenios'] = $this->usuarios_convenios->find($this->session->userdata('id'));

        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('paciente/detail_usuario', $dados);
        $this->load->view('include/footer');
    }

}
