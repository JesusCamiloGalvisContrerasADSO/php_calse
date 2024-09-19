<?php

class Modelo {
  protected $id;
  protected $table;
  protected $db;
  
  public function __construct($id, $table, PDO $connection)
  {
    $this->id = $id;
    $this->table = $table;
    $this-> db = $connection;
  }

  public function getAll(){
    $stm = $this->db->prepare("select * from {$this->table}");
    $stm->execute();
    return $stm->fetchAll();
  }

  public function getById($id){
    $stm = $this->db->prepare("select * from {$this->table} where id = :id");
    $stm->bindValue(":id", $id);
    $stm->execute();
    return $stm->fetch();
  }

  // public function getUpdate($id){
  //   $stm = $this->db->prepare("update users set nombre = :nombre where id = :id");
  //   $stm->bindValue();
  // }

  public function store($data){
    $sql = "INSERT INTO  users (";

    foreach($data as $key => $a){
      if($a == '') continue;
      
        $sql .= "{$key},";
    };
    $sql = trim($sql, ',');
    $sql .= ") VALUES (";

    foreach($data as $key => $a){

      if($a == '') continue;

        $sql .= ":{$key},";
    };
    $sql = trim($sql, ',');
    $sql .= ")";

    $stm = $this->db->prepare($sql);

    foreach ($data as $key => $value){
      if($value == '') continue;
      
        $stm->bindValue(":{$key}", $value);
    }

    // die($sql);
    $stm->execute();

    echo($sql);
    // die();
    // $sql = "insert into  users (firts_name, last_name, email, phone, dni) Values ('Jesus', 'Galvis', 'jgalvs38@gmail.com', '3209079545', 1099738376);";
    
    echo "<pre>";
    var_dump($data);
    echo "</pre>";


    // Capturar el último ID insertado
    $lastId = $this->db->lastInsertId();
    return $lastId;


  }

  public function update($id, $data){
    
    $sql = " UPDATE users SET ";

    foreach($data as $key => $value){
      $sql .= "{$key} = :{$key}, ";
    }
    $sql = trim($sql, ', ');
    $sql .= " WHERE id = :id";
    $stm = $this->db->prepare($sql);

    foreach ($data as $key => $value){
      $stm->bindValue(":{$key}", $value);
    }
    
    $stm->bindValue(":id", $id);
    
    $stm->execute();

    return true;

  }

  public function delete($id){
    
    $sql = " DELETE FROM users WHERE id = :id";
    $stm = $this->db->prepare($sql);
    $stm->bindValue(":id", $id);
    
    $stm->execute();

    echo($sql);


  }


  }