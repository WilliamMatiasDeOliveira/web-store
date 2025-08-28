<?php

namespace core\classes;

use PDO;
use PDOException;

class Database{

    private $pdo;

    private function ligar(){
        // ligar a base de dados
       $this->pdo = new PDO(
            "mysql:host=".SERVER.
            ";dbname=".DATABASE,
            USER,
            PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );
        // debug
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    private function desligar(){
        // desligar a base de dados
        $this->pdo = null;
    }

    // metodo de pesquisa sql
    public function select($sql, $param = null){
        $this->ligar();

        $res = null;

        // comunicar
        try {
            if(!empty($param)){
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($param);
                $res = $stmt->fetchAll(PDO::FETCH_CLASS);
            }else{
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

}
