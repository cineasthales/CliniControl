<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        if ($this->session->logado_paciente == true) {
            redirect('paciente');
        } else if ($this->session->logado_empregado == true ||
                $this->session->logado_admin_emp == true ||
                $this->session->logado_admin_sis == true) {
            redirect('interno/home');
        } else {
            $this->load->view('include/header_ext');
            $this->load->view('login');
            $this->load->view('include/footer');
        }
    }

    public function logar() {
// carrega a model com os métodos da tabela usuarios
        $this->load->model('usuario_model', 'usuarios');

// obtém os dados do form
        $user = $this->input->post('user');
        $senha = $this->input->post('senha');

        $verifica = $this->usuarios->check($user, md5($senha), $user, md5($senha));

        if (isset($verifica)) {
            $sessao['id'] = $verifica->id;
            $sessao['nome'] = $verifica->nome;
            $sessao['nivel'] = $verifica->nivel;
            if ($verifica->nivel == 0) {
                $sessao['logado_paciente'] = true;
                $sessao['logado_empregado'] = false;
                $sessao['logado_admin_emp'] = false;
                $sessao['logado_admin_sis'] = false;
            } else if ($verifica->nivel == 1) {
                $this->load->model('empregado_model', 'empregados');
                $sessao['id_empregado'] = $this->empregados->find($verifica->id);
                $sessao['logado_paciente'] = false;
                $sessao['logado_empregado'] = true;
                $sessao['logado_admin_emp'] = false;
                $sessao['logado_admin_sis'] = false;
            } else if ($verifica->nivel == 2) {
                $sessao['logado_paciente'] = false;
                $sessao['logado_empregado'] = false;
                $sessao['logado_admin_emp'] = true;
                $sessao['logado_admin_sis'] = false;
            } else if ($verifica->nivel == 3) {
                $sessao['logado_paciente'] = false;
                $sessao['logado_empregado'] = false;
                $sessao['logado_admin_emp'] = false;
                $sessao['logado_admin_sis'] = true;
            }
            $this->session->set_userdata($sessao);
        } else {
            $mensagem = "Nome de usuário, e-mail e/ou senha incorretos.";
            $tipo = 0;
            $this->session->set_flashdata('mensagem', $mensagem);
            $this->session->set_flashdata('tipo', $tipo);
        }
        redirect('home');
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function cadastrar() {
        $this->session->sess_destroy();
        $this->load->model('cargo_model', 'cargos');
        $dados['cargos'] = $this->cargos->selectProf();
        $this->load->view('include/header_ext');
        $this->load->view('cadastro', $dados);
        $this->load->view('include/footer');
    }

    public function grava_cadastro() {
        $recaptchaResponse = $this->input->post('g-recaptcha-response');
        $secret = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data1 = array('secret' => $secret, 'response' => $recaptchaResponse);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $status = json_decode($response, true);
        if ($status['success']) {
            $this->load->model('endereco_model', 'enderecos');
            $dadosEndereco['cep'] = $this->input->post('cep');
            $dadosEndereco['logradouro'] = $this->input->post('logradouro');
            $dadosEndereco['numero'] = $this->input->post('numero');
            $dadosEndereco['complemento'] = $this->input->post('complemento');
            $dadosEndereco['cidade'] = $this->input->post('cidade');
            $dadosEndereco['estado'] = $this->input->post('estado');

            if ($this->enderecos->insert($dadosEndereco)) {
                $this->load->model('usuario_model', 'usuarios');
                $dadosUsuario['idEndereco'] = $this->enderecos->last()->id;
                $dadosUsuario['email'] = $this->input->post('email');
                $dadosUsuario['nomeUsuario'] = $this->input->post('nomeUsuario');
                $dadosUsuario['senha'] = $this->input->post('senha');
                $dadosUsuario['senha'] = md5($dadosUsuario['senha']);
                $dadosUsuario['nivel'] = 2;
                $dadosUsuario['nome'] = $this->input->post('nome');
                $dadosUsuario['sobrenome'] = $this->input->post('sobrenome');
                $dadosUsuario['cpf'] = $this->input->post('cpf');
                $dadosUsuario['dataNasc'] = $this->input->post('dataNasc');
                $dadosUsuario['ativo'] = 1;

                if ($this->usuarios->insert($dadosUsuario)) {
                    $this->load->model('empregado_model', 'empregados');
                    $dadosEmpregado['idUsuario'] = $this->usuarios->last()->id;
                    $dadosEmpregado['salario'] = 0;
                    $dadosEmpregado['registro'] = $this->input->post('registro');
                    $dadosEmpregado['idCargo'] = $this->input->post('idCargo');

                    if ($this->empregados->insert($dadosEmpregado)) {
                        $this->load->model('empresa_model', 'empresas');
                        $dadosEmpresa['razaoSocial'] = $this->input->post('razaoSocial');
                        $dadosEmpresa['nomeFantasia'] = $this->input->post('nomeFantasia');
                        $dadosEmpresa['cnpj'] = $this->input->post('cnpj');
                        $dadosEmpresa['ativo'] = 1;

                        if ($this->empresas->insert($dadosEmpresa)) {
                            $this->load->model('administrador_model', 'administradores');
                            $dadosAdministrador['idEmpregado'] = $this->empregados->last()->id;
                            $dadosAdministrador['idEmpresa'] = $this->empresas->last()->id;

                            if ($this->administradores->insert($dadosAdministrador)) {
                                $mensagem = "Dados cadastrados com sucesso.";
                                $tipo = 1;
                            } else {
                                $mensagem = "Dados de administrador não foram cadastrados.";
                                $tipo = 0;
                            }
                        } else {
                            $mensagem = "Dados de empresa não foram cadastrados.";
                            $tipo = 0;
                        }
                    } else {
                        $mensagem = "Dados profissionais não foram cadastrados.";
                        $tipo = 0;
                    }
                } else {
                    $mensagem = "Dados de usuário não foram cadastrados.";
                    $tipo = 0;
                }
            } else {
                $mensagem = "Dados de endereço não foram cadastrados.";
                $tipo = 0;
            }
        } else {
            $mensagem = "CAPTCHA inválido.";
            $tipo = 0;
        }

        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);

        redirect(base_url('home'));
    }

    public function senha() {
        $this->session->sess_destroy();
        $this->load->view('include/header_ext');
        $this->load->view('senha_recuperacao');
        $this->load->view('include/footer');
    }

    public function senha_alteracao() {

        $this->load->model('recuperar_senha_model', 'recuperar_senha');
        $codigo = $this->input->get('codigo');
        $verificar = $this->recuperar_senha->findToken($codigo);


        if ($verificar) {
            $this->load->view('include/header_ext');
            $this->load->view('senha_alteracao');
            $this->load->view('include/footer');
        } else {
            $this->load->view('include/header_ext');
            $this->load->view('senha_alteracao_n');
            $this->load->view('include/footer');
        }
    }

    public function email() {
        $email = $this->input->post('email');

        $mensagem = "As instruções de alteração de senha foram enviadas para $email";
        $tipo = 1;

        $this->session->set_flashdata('mensagem', $mensagem);
        $this->session->set_flashdata('tipo', $tipo);

        $this->load->model('recuperar_senha_model', 'recuperar_senha');
        $verificar = $this->recuperar_senha->findEmail($email);



        if ($verificar) {
            $codigo = base64_encode($email);
            $data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));

            $mensagem = '<p>Recebemos uma tentativa de recuperação de senha para este e-mail, caso não tenha sido você,
					desconsidere este e-mail, caso contrário clique no link abaixo<br /> 
					<a href="localhost/clinicontrol/home/senha_alteracao?codigo=' . $codigo . '">Recuperar Senha</a></p>';
            $email_remetente = 'igorsillva@hotmail.com.br';

            $headers = "MIME-Version: 1.1\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
            $headers .= "From: $email_remetente\n";
            $headers .= "Return-Path: $email_remetente\n";
            $headers .= "Reply-To: $email\n"
            ;

            $inserir = $this->recuperar_senha->insert(array('codEmail' => $codigo, 'dataVal' => $data_expirar));

            if ($inserir) {
                if (mail("$email", "Assunto", "$mensagem", $headers, "-f$email_remetente")) {
                    echo 'Enviamos um e-mail com um link para recuperação de senha, para o endereço de e-mail informado!';
                }
            }

            redirect(base_url('home'));
        }
    }

    public function alterar() {

        $email = base64_decode($this->input->post('token'));
        $senha = md5($this->input->post('senha'));
        $this->load->model('recuperar_senha_model', 'recuperar_senha');
        $this->recuperar_senha->update(array('senha' => $senha), $email);
        redirect(base_url('home'));
    }

}
