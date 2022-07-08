<?php

class TableRows extends RecursiveIteratorIterator {
    private $db;
    
    public function __construct($it) {
    $this->db = new Database();
    parent::__construct($it, self::LEAVES_ONLY);
  }

  public function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  public function beginChildren() {
    echo "<tr>";
  }

  public function endChildren() {
    echo "</tr>" . "\n";
  }


public function queryWorkers(){
  $sql = "SELECT name, username, email FROM usuarios";
  $query = $this->db->pdo->prepare($sql);
  $query->execute();
  $result = $query->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($query->fetchAll())) as $key=>$val) {
    echo $val;
  }

}

public function search($data){
  $search = "";
  $search = $data['search'];
  $search = '%' . $search . '%';
  $sql = "SELECT * FROM usuarios LIKE :search";
  $query = $this->db->PDO->prepare($sql);
  $query->bindParam(':search',$search);
  $query->execute();
  $result = $query->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($query->fetchAll())) as $key => $val){
    echo $val;
  }
}
}

?>