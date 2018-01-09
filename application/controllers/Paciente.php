<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller {

    public function index() {
        $this->load->model('usuario_model', 'usuarios');
        $this->load->model('procedimento_model', 'procedimentos');

        $dados['paciente'] = $this->usuarios->find($this->session->userdata('id'));
        $dados['procedimentos'] = $this->procedimentos->selectUsuario($this->session->userdata('id'));

        $this->load->view('include/header');
        $this->load->view('include/nav_paciente');
        $this->load->view('paciente/home', $dados);
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
        $this->load->view('include/nav_paciente');
        $this->load->view('paciente/detail_usuario', $dados);
        $this->load->view('include/footer');
    }

    public function profissional($idUsuario) {
        $this->load->model('empregado_model', 'empregados');
        $this->load->model('empregado_local_model', 'empregados_locais');
        $this->load->model('empregado_especialidade_model', 'empregados_especialidades');

        $idProf = $this->empregados->find($idUsuario)->id;
        $dados['profissional'] = $this->empregados->findProfissional($idProf);
        $dados['locais'] = $this->empregados_locais->find($idProf);
        $dados['especialidades'] = $this->empregados_especialidades->find($idProf);

        $this->load->view('include/header');
        $this->load->view('include/nav_paciente');
        $this->load->view('paciente/detail_profissional', $dados);
        $this->load->view('include/footer');
    }

    public function local($id) {
        $this->load->model('local_model', 'locais');
        $this->load->model('telefoneLocal_model', 'telefonesLocais');
        
        $dados['local'] = $this->locais->findLocal($id);
        $dados['telefones'] = $this->telefonesLocais->find($id);

        $this->load->view('include/header');
        $this->load->view('include/nav_paciente');
        $this->load->view('paciente/detail_local', $dados);
        $this->load->view('include/footer');
    }

}
