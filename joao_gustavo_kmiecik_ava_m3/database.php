<?php

// criando a classe 'Database'
class Database
{
    private $lastInsertID;
    private $connection;

    function __construct()
    {
        $this->connect_db();
    }


    public function connect_db()
    {
        // atribuindo os parâmetros de conexão ao
        // atributo 'connection' da classe 'Database'
        $this->connection = mysqli_connect(
            'localhost',
            'root',
            '',
            'db_locadoraweb',
            3306
        );
        // testando se ocorreu um erro na conexão
        if (mysqli_connect_error()) {
            die("Falha na conexão com o banco! "
                . mysqli_connect_error()
                . mysqli_connect_errno());
        }
    }


    public function read($table)
    {
        $sql = "SELECT * FROM $table;";
        $res = mysqli_query($this->connection, $sql);
        return $res;
    }

    public function getRegister($table, $id = null)
    {
        $sql = "SELECT * FROM $table WHERE id = $id;";
        $res = mysqli_query($this->connection, $sql);
        return $res;
    }

    function create($table = null, $data = null)
    {
        $colunas = null;
        $valores = null;
        foreach ($data as $key => $valor) {
            $colunas .= trim($key, "'") . ",";
            $valores .= "'$valor',";
        }
        // remove a ultima virgula
        $colunas = rtrim($colunas, ',');
        $valores = rtrim($valores, ',');

        $sql = "insert into $table($colunas) values ($valores);";
        try {
            $this->connection->query($sql);
            $lastInsertId = $this->connection->insert_id;
            $_SESSION['message'] = 'Registro cadastrado com sucesso!';
            $_SESSION['type'] = 'success';
            return true;
        } catch (Exception $e) {
            $_SESSION['message'] = 'Não foi possível realizar a operação!';
            $_SESSION['type'] = 'danger';
            return false;
        }
    }

    function update($table = null, $chavePrimaria = null, $id = null, $data = null)
    {
        $items = null;
        foreach ($data as $key => $valor) {
            $items .= trim($key, "'") . "='$valor',";
        }
        // remove a ultima virgula
        $items = rtrim($items, ',');
        $sql = "update $table set $items where $chavePrimaria = $id;";
        try {
            $this->connection->query($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        $res = mysqli_query($this->connection, $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function sanitize($var)
    {
        $res = mysqli_real_escape_string($this->connection, $var);
        return $res;
    }
}

$database = new Database();
