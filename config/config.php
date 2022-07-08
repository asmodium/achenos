<?php

class Database{
    public $pdo; 
    private $dbHost = "localhost";
    private $dbName ="achenos";
    private $dbUser ="root";
    private $dbPass ="";
    public function __construct(){
        if (!isset($this->pdo)) {
            try{
            $link = new PDO('mysql:dbhost='.$this->dbHost.';dbname='.$this->dbName,$this->dbUser,$this->dbPass);
            $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $link->exec('SET CHARACTER SET utf8');
            $this->pdo = $link;
            }catch(PDOException $e){
                die('Erro de conexão ao banco de dados. '.$e->getMessage());
            }
        }
    }
    public function unsetter(){
        foreach ($this as $key => $value) {unset($this->$key);}
        foreach (array_keys(get_defined_vars()) as $var) {unset(${"var"});}
        unset($var);
    }
}
?>