<?php

/** 
 * @Desc: Controller da página Admin. Possui funções de construção, 
 * exclusão de usuários e criação de dump da base de dados
 */
class Admin extends Controller
{

    public function __construct()
    {
        if (!Session::isLogged()) {
            URL::redirect('usuarios/login');
        }
        $this->db = new Database();
        $this->usuarioModel = $this->model('Usuario');
    }

    public function index()
    {
        if ($_SESSION['permissao'] !== 1) {
            Session::message('post', 'Você não é um administrador, não pode acessar esta página.', 'alert alert-danger');
            URL::redirect('posts');
        }

        $users = $this->usuarioModel->getAll();

        $data = [
            'usuarios' => $users
        ];

        $this->view('admin/index', $data);
    }

    public function deletar($id)
    {
        if ($_SESSION['permissao'] !== 1) {
            Session::message('post', 'Você não possui autorização para estar aqui', 'alert alert-danger');
            URL::redirect('posts');
        } else {
            if ($this->usuarioModel->delete($id)) {
                Session::message('admin', 'Usuario deletado com sucesso!');
                URL::redirect('admin');
            } else {
                die("Erro ao tentar apagar o usuário");
            }
        }
    }

    public function dbdump()
    {
        $result = @$this->db->backup_tables();

        $users = $this->usuarioModel->getAll();

        $data = [
            'usuarios' => $users,
            'dbpath' => $result
        ];
        Session::message('admin', 'Backup da Base de Dados realizado com sucesso!');

        $this->view('admin/index', $data);
    }
}