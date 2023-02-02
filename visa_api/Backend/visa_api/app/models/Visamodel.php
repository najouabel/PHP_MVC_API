<?php

class Visamodel{
  private $conn;
  private $table = 'visa';
  public $id;
  public $nom;
  public $prenom;
  public $date_ns;
  public $nationalite;
  public $situation;
  public $adresse;
  public $type_visa;
  public $date_depart;
  public $date_arriver;
  public $num_document;
  public $type_document;

  public function __construct() {
    $database = new Database();
    $this->conn = $database->connect();
  }

  public function read() {
    // Create query
    $query = 'SELECT * FROM ' . $this->table . ';';
    
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_single(){
    // Create query
    $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1,$this->id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $this->nom    = $row['nom'];
    $this->prenom     = $row['prenom'];
    $this->date_ns      = $row['date_ns'];
    $this->nationalite   = $row['nationalite'];
    $this->situation     = $row['situation'];
    $this->adresse       = $row['adresse'];
    $this->type_visa     = $row['type_visa'];
    $this->date_depart   = $row['date_depart'];
    $this->date_arriver  = $row['date_arriver'];
    $this->num_document  = $row['num_document'];
    $this->type_document = $row['type_document'];
  }

  public function create(){
    //Create query
    $query = 'INSERT INTO '. $this->table .' (nom, prenom, date_ns, nationalite, situation, adresse, type_visa, date_depart, date_arriver, num_document, type_document) VALUES (:nom,:prenom,:date_ns,:nationalite,:situation,:adresse,:type_visa,:date_depart,:date_arriver,:num_document,:type_document);';
    
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    
    //Bind params

    $stmt->bindParam(':nom',$this->nom);
    $stmt->bindParam(':prenom',$this->prenom);
    $stmt->bindParam(':date_ns',$this->date_ns);
    $stmt->bindParam(':nationalite',$this->nationalite);
    $stmt->bindParam(':situation',$this->situation);
    $stmt->bindParam(':adresse',$this->adresse);
    $stmt->bindParam(':type_visa',$this->type_visa);
    $stmt->bindParam(':date_depart',$this->date_depart);
    $stmt->bindParam(':date_arriver',$this->date_arriver);
    $stmt->bindParam(':num_document',$this->num_document);
    $stmt->bindParam(':type_document',$this->type_document);

    if($stmt->execute()){
      return true;
    }

    
    // printf("Error : %s.\n",$stmt->error);

    return false;
  }

  public function update(){
    $query = 'UPDATE visa 
              SET 
              nom= :nom ,
              prenom= :prenom,
              date_ns= :date_ns,
              nationalite= :nationalite,
              situation= :situation,
              adresse= :adresse,
              type_visa= :type_visa,
              date_depart= :date_depart,
              date_arriver= :date_arriver,
              num_document= :num_document,
              type_document= :type_document WHERE id = :id';
    
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id',$this->id);
    $stmt->bindParam(':nom',$this->nom);
    $stmt->bindParam(':prenom',$this->prenom);
    $stmt->bindParam(':date_ns',$this->date_ns);
    $stmt->bindParam(':nationalite',$this->nationalite);
    $stmt->bindParam(':situation',$this->situation);
    $stmt->bindParam(':adresse',$this->adresse);
    $stmt->bindParam(':type_visa',$this->type_visa);
    $stmt->bindParam(':date_depart',$this->date_depart);
    $stmt->bindParam(':date_arriver',$this->date_arriver);
    $stmt->bindParam(':num_document',$this->num_document);
    $stmt->bindParam(':type_document',$this->type_document);

    //Execute query

    if($stmt->execute()){
      return true;
    }
    // printf("Error : %s.\n",$stmt->error);

    return false;
  }

  public function delete(){
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    $stmt = $this->conn->prepare($query);
    
    //Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':id',$this->id);

    if($stmt->execute()){
      return true;
    }

    // printf("Error : %s.\n",$stmt->error);

    return false;
  }
}

