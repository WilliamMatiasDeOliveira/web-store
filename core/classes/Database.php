<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database
{

    private $pdo;

    private function ligar()
    {
        // ligar a base de dados
        $this->pdo = new PDO(
            "mysql:host=" . SERVER .
                ";dbname=" . DATABASE,
            USER,
            PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );
        // debug
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // desliga a conexão
    private function desligar()
    {
        // desligar a base de dados
        $this->pdo = null;
    }

    // metodo de pesquisa sql
    public function select($sql, $param = null)
    {

        // veifica se é uma instrução select
        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception("Não é uma instrução SELECT");
        }


        $this->ligar();

        $res = null;

        // comunicar
        try {
            if (!empty($param)) {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($param);
                $res = $stmt->fetchAll(PDO::FETCH_CLASS);
            } else {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            return false;
        }

        // desconectar da base de dados
        $this->desligar();
        // retorna o objeto
        return $res;
    }

    // metodo de inserção sql
    public function insert($sql, $param = null)
    {

        // veifica se é uma instrução select
        if (!preg_match("/^INSERT/i", $sql)) {
            throw new Exception("Não é uma instrução INSERT");
        }


        $this->ligar();

        // comunicar
        try {
            if (!empty($param)) {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($param);
            } else {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
        } catch (PDOException $e) {
            return false;
        }

        // desconectar da base de dados
        $this->desligar();
    }

    // metodo de atualização sql
    public function update($sql, $param = null)
    {

        // veifica se é uma instrução select
        if (!preg_match("/^UPDATE/i", $sql)) {
            throw new Exception("Não é uma instrução UPDATE");
        }


        $this->ligar();

        // comunicar
        try {
            if (!empty($param)) {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($param);
            } else {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
        } catch (PDOException $e) {
            return false;
        }

        // desconectar da base de dados
        $this->desligar();
    }

    // metodo de deleção sql
    public function delete($sql, $param = null)
    {

        // veifica se é uma instrução delete
        if (!preg_match("/^DELETE/i", $sql)) {
            throw new Exception("Não é uma instrução DELETE");
        }


        $this->ligar();

        // comunicar
        try {
            if (!empty($param)) {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($param);
            } else {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
        } catch (PDOException $e) {
            return false;
        }

        // desconectar da base de dados
        $this->desligar();
    }
    // verifica se é uma instrução diferente de crud
    public function generic($sql, $param = null)
    {

        // veifica se é uma instrução select
        if (preg_match("/^(SELECT|DELETE|UPDATE|INSERT)/i", $sql)) {
            throw new Exception("Não é uma instrução GENERICA");
        }


        $this->ligar();

        // comunicar
        try {
            if (!empty($param)) {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($param);
            } else {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
            }
        } catch (PDOException $e) {
            return false;
        }

        // desconectar da base de dados
        $this->desligar();
    }
}
