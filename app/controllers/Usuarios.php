<?php

/** 
 * @Desc: Controller de Usuários. Possui as funções de criação de novos usuários, 
 * execução de login, criação e término de sessão
 */
class Usuarios extends Controller
{

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function cadastrar()
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)) {
            $data = [
                'name' => $form['name'],
                'email' => $form['email'],
                'password' => $form['password'],
                'password_conf' => $form['password_conf']
            ];

            if (in_array("", $form)) {
                if (empty($form['name'])) {
                    $data['name_error'] = 'Preencha o campo nome';
                }
                if (empty($form['email'])) {
                    $data['email_error'] = 'Preencha o campo e-mail';
                }
                if (empty($form['password'])) {
                    $data['password_error'] = 'Preencha o campo senha';
                }
                if (empty($form['password_conf'])) {
                    $data['password_conf_error'] = 'Confirme a senha';
                }
            } else {
                if (Validation::validateName($form['name'])) {
                    $data['name_error'] = 'Nome informado inválido';
                } elseif (Validation::validateEmail($form['email'])) {
                    $data['email_error'] = 'O e-mail informado é inválido';
                } elseif ($this->usuarioModel->verifyEmail($form['email'])) {
                    $data['email_error'] = 'O e-mail informado já está cadastrado.';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_error'] = 'A senha deve conter no mínimo 6 caracteres';
                } elseif ($form['password'] != $form['password_conf']) {
                    $data['password_conf_error'] = 'Senhas diferentes';
                } else {
                    $data['password'] = password_hash($form['password'], PASSWORD_DEFAULT);
                    if ($this->usuarioModel->insert($data)) {
                        Session::message('usuario', 'Cadastro realizado com sucesso');
                        URL::redirect('usuarios/login');
                    } else {
                        die("Erro ao armazenar usuario");
                    }
                }
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'password_conf' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'password_conf_error' => ''
            ];
        }

        $this->view('usuarios/cadastrar', $data);
    }

    public function login()
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)) {
            $data = [
                'email' => $form['email'],
                'password' => $form['password']
            ];

            if (in_array("", $form)) {
                if (empty($form['email'])) {
                    $data['email_error'] = 'Preencha o campo e-mail';
                }
                if (empty($form['password'])) {
                    $data['password_error'] = 'Preencha o campo senha';
                }
            } else {
                if (Validation::validateEmail($form['email'])) {
                    $data['email_error'] = 'O e-mail informado é inválido';
                } else {
                    $user = $this->usuarioModel->verifyLogin($form['email'], $form['password']);
                    if ($user) {
                        $this->createSession($user);
                    } else {
                        Session::message('usuario', 'Usuario ou senha invalidos', 'alert alert-danger');
                    }
                }
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];
        }

        $this->view('usuarios/login', $data);
    }

    private function createSession($user)
    {
        $_SESSION['permissao'] = $user->permissao;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->nome;
        $_SESSION['user_email'] = $user->email;

        URL::redirect('posts');
    }

    public function sair()
    {
        unset($_SESSION['permissao']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);

        session_destroy();

        URL::redirect('usuarios/login');
    }
}