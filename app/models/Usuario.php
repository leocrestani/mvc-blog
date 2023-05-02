<?php

/** 
 * @Desc: Model para a tabela usuario em nosso banco de dados.
 * Possui funções CRUD e algumas funções de verificação.
 */
class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function verifyEmail($email)
    {
        $this->db->query("SELECT email FROM usuario WHERE email = :e");
        $this->db->bind("e", $email);

        if ($this->db->result()) {
            return true;
        }
        return false;
    }

    public function insert($data)
    {
        $this->db->query("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
        $this->db->bind("nome", $data['name']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("senha", $data['password']);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function verifyLogin($email, $password)
    {
        $this->db->query("SELECT * FROM usuario WHERE email = :e");
        $this->db->bind("e", $email);

        if ($this->db->result()) {
            $result = $this->db->result();
            if (password_verify($password, $result->senha)) {
                return $result;
            }
        }
        return false;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM usuario");

        if ($this->db->result()) {
            $result = $this->db->resultArray();
            return $result;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM usuario WHERE id = :id");
        $this->db->bind("id", $id);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }
}