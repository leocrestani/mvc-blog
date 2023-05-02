<?php

/** 
 * @Desc: Biblioteca que fornece a conexão com o banco de dados e a mantém.
 * Fornece também funções úteis que são utilizadas pelos models.
 */
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '1234';
    private $db = 'mvcblog';
    private $port = '3306';
    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db;
        $options = [
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function result()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function resultArray()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    /** 
     * @Desc: Solução que encontrei para a criação do dump do banco de dados.
     * Não é eficiente, em bases grandes pode demorar muito e gerar problemas.
     * Porém não utiliza nenhuma aplicação externa e não requer configuração adicional.
     * Possívelmente substituível com msqldump, se disponível
     */
    public function backup_tables($tables = '*')
    {
        $data = "";

        if ($tables == '*') {
            $tables = array();
            $result = $this->dbh->prepare('SHOW TABLES');
            $result->execute();
            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                $tables[] = $row[0];
            }
        } else {
            $tables = is_array($tables) ? $tables : explode(',', $tables);
        }

        foreach ($tables as $table) {
            $resultcount = $this->dbh->prepare('SELECT count(*) FROM ' . $table);
            $resultcount->execute();
            $num_fields = $resultcount->fetch(PDO::FETCH_NUM);
            $num_fields = $num_fields[0];

            $result = $this->dbh->prepare('SELECT * FROM ' . $table);
            $result->execute();
            $data .= 'DROP TABLE ' . $table . ';';

            $result2 = $this->dbh->prepare('SHOW CREATE TABLE ' . $table);
            $result2->execute();
            $row2 = $result2->fetch(PDO::FETCH_NUM);
            $data .= "\n\n" . $row2[1] . ";\n\n";

            for ($i = 0; $i < $num_fields; $i++) {
                while ($row = $result->fetch(PDO::FETCH_NUM)) {
                    $data .= 'INSERT INTO ' . $table . ' VALUES(';
                    for ($j = 0; $j < $num_fields; $j++) {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = str_replace("\n", "\\n", $row[$j]);
                        if (isset($row[$j])) {
                            $data .= '"' . $row[$j] . '"';
                        } else {
                            $data .= '""';
                        }
                        if ($j < ($num_fields - 1)) {
                            $data .= ',';
                        }
                    }
                    $data .= ");\n";
                }
            }
            $data .= "\n\n\n";
        }

        $filename = 'db-backup-' . time() . '-' . (implode(",", $tables)) . '.sql';
        $this->writeUTF8filename($filename, $data);
        return $filename;
    }

    private function writeUTF8filename($filenamename, $content)
    {
        $f = fopen($filenamename, "w+");
        fwrite($f, pack("CCC", 0xef, 0xbb, 0xbf));
        fwrite($f, $content);
        fclose($f);
    }
}