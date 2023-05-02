<?php

/** 
 * @Desc: Controller da página posts. Possui funções de construção da página, 
 * mostrar posts individualmente, cadastro de posts, edição e exclusão
 */
class Posts extends Controller
{

    public function __construct()
    {
        if (!Session::isLogged()) {
            URL::redirect('usuarios/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $data = [
            'posts' => $this->postModel->getAllPosts()
        ];
        $this->view('posts/index', $data);
    }

    public function cadastrar()
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)) {
            $data = [
                'titulo' => $form['titulo'],
                'texto' => $form['texto'],
                'usuario' => $_SESSION['user_id']
            ];

            if (in_array("", $form)) {
                if (empty($form['titulo'])) {
                    $data['titulo_error'] = 'Preencha o campo titulo';
                }
                if (empty($form['texto'])) {
                    $data['texto_error'] = 'Preencha o campo texto';
                }
            } else {
                if ($this->postModel->insert($data)) {
                    Session::message('post', 'Post cadastrado com sucesso');
                    URL::redirect('posts');
                } else {
                    die("Erro ao armazenar post");
                }

            }
        } else {
            $data = [
                'titulo' => '',
                'texto' => '',
                'titulo_error' => '',
                'texto_error' => ''
            ];
        }

        $this->view('posts/cadastrar', $data);
    }

    public function show($id)
    {
        $post = $this->postModel->getPostById($id);

        $data = [
            'post' => $post
        ];

        $this->view('posts/show', $data);
    }

    public function editar($id)
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)) {
            $data = [
                'id' => $id,
                'titulo' => $form['titulo'],
                'texto' => $form['texto']
            ];

            if (in_array("", $form)) {
                if (empty($form['titulo'])) {
                    $data['titulo_error'] = 'Preencha o campo titulo';
                }
                if (empty($form['texto'])) {
                    $data['texto_error'] = 'Preencha o campo texto';
                }
            } else {
                if ($this->postModel->update($data)) {
                    Session::message('post', 'Post atualizado com sucesso');
                    URL::redirect('posts');
                } else {
                    die("Erro ao atualizar post");
                }

            }
        } else {
            $post = $this->postModel->getPostById($id);

            if (($post->usuarioId != $_SESSION['user_id']) && $_SESSION['permissao'] !== 1) {
                Session::message('post', 'Você não possui autorização para editar este post', 'alert alert-danger');
                URL::redirect('posts');
            }

            $data = [
                'id' => $post->postId,
                'titulo' => $post->titulo,
                'texto' => $post->conteudo,
                'titulo_error' => '',
                'texto_error' => ''
            ];
        }

        $this->view('posts/editar', $data);
    }

    public function deletar($id)
    {
        $post = $this->postModel->getPostById($id);

        if (($post->usuarioId != $_SESSION['user_id']) && $_SESSION['permissao'] !== 1) {
            Session::message('post', 'Você não possui autorização para deletar este post', 'alert alert-danger');
            URL::redirect('posts');
        } else {
            if ($this->postModel->delete($id)) {
                Session::message('post', 'Post deletado com sucesso!');
                URL::redirect('posts');
            } else {
                die("Erro ao tentar apagar o post");
            }
        }
    }
}