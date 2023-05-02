<?php

/** 
 * @Desc: Model para a tabela posts em nosso banco de dados.
 * Possui funções CRUD e algumas listagens adicionais específicas.
 */
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPosts()
    {
        $this->db->query("SELECT *, 
        posts.id as postId, 
        posts.created_at as postData, 
        usuario.id as usuarioId,
        usuario.created_at as usuarioData
        FROM posts 
        INNER JOIN usuario ON posts.usuario = usuario.id 
        ORDER BY postData DESC");
        return $this->db->resultArray();
    }

    public function insert($data)
    {
        $this->db->query("INSERT INTO posts (usuario, titulo, conteudo) VALUES (:usuario, :titulo, :texto)");
        $this->db->bind("usuario", $data['usuario']);
        $this->db->bind("titulo", $data['titulo']);
        $this->db->bind("texto", $data['texto']);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function update($data)
    {
        $this->db->query("UPDATE posts SET titulo = :titulo, conteudo = :texto WHERE id = :id");
        $this->db->bind("id", $data['id']);
        $this->db->bind("titulo", $data['titulo']);
        $this->db->bind("texto", $data['texto']);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function getPostById($id)
    {
        $this->db->query("SELECT *,
        posts.id as postId, 
        posts.created_at as postData, 
        usuario.id as usuarioId,
        usuario.created_at as usuarioData 
        FROM posts 
        INNER JOIN usuario ON posts.usuario = usuario.id
        WHERE posts.id = :id");
        $this->db->bind('id', $id);
        return $this->db->result();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM posts WHERE id = :id");
        $this->db->bind("id", $id);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }
}