<?php
  class Visa extends Controller{
    public function __construct(){
      $this->Visamomdel = $this->model('Visamomdel');
    }

    public function index(){
      header('Access-Control-Allow-Origin: *');
      header('Content-Type: application/json');

      $result = $this->Visamodel->read();

      //Get row count
      $num = $result->rowCount();


      if($num > 0){
        $visa_arr = array();
        $visa_arr['data']= array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $visa_item = array(
            'id'             => $id,
            'nom'     => $nom,
            'prenom'      => $prenom,
            'date_ns'       => $date_ns,
            'nationalite'    => $nationalite,
            'situation'      => $situation,
            'adresse'        => $adresse,
            'type_visa'      => $type_visa,
            'date_depart'    => $date_depart,
            'date_arriver'   => $date_arriver,
            'num_document'   => $num_document,
            'type_document'  => $type_document,
          );

          //Push to data
          array_push($visa_arr['data'],$visa_item);
        }

          //turn to json & output

          echo json_encode($visa_arr);
      }else{
        //No visa
        echo json_encode(
          array('message'=>'No visas found')
        );
      }
    }

    public function readsingle($id){
      header('Access-Control-Allow-Origin: *');//public access
      header('Content-Type: application/json');

      $this->Visamomdel->id = $id;

      $this->Visamomdel->read_single();

      //Create array

      $visa_arr = array(
        'id'             => $id,
        'nom'     => $this->Visamomdel->nom,
        'prenom'      => $this->Visamomdel->prenom,
        'date_ns'       => $this->Visamomdel->date_ns,
        'nationalite'    => $this->Visamomdel->nationalite,
        'situation'      => $this->Visamomdel->situation,
        'adresse'        => $this->Visamomdel->adresse,
        'type_visa'      => $this->Visamomdel->type_visa,
        'date_depart'    => $this->Visamomdel->date_depart,
        'date_arriver'   => $this->Visamomdel->date_arriver,
        'num_document'   => $this->Visamomdel->num_document,
        'type_document'  => $this->Visamomdel->type_document,
      );

      
      //Make JSON
      print_r(json_encode($visa_arr));

    }

    public function create(){
      //Headers
      header('Access-Control-Allow-Origin: *');
      header('Content-Type: application/json');
      header('Access-Control-Allow-Methods: POST');
      header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

      $data = json_decode(file_get_contents("php://input"));


      $this->Visamomdel->nom    = $data->nom;
      $this->Visamomdel->prenom     = $data->prenom;
      $this->Visamomdel->date_ns      = $data->date_ns;
      $this->Visamomdel->nationalite   = $data->nationalite;
      $this->Visamomdel->situation     = $data->situation;
      $this->Visamomdel->adresse       = $data->adresse;
      $this->Visamomdel->type_visa     = $data->type_visa;
      $this->Visamomdel->date_depart   = $data->date_depart;
      $this->Visamomdel->date_arriver  = $data->date_arriver;
      $this->Visamomdel->num_document  = $data->num_document;
      $this->Visamomdel->type_document = $data->type_document;

      if ($this->Visamomdel->create()) {
        echo json_encode(array('message' => 'visa created'));
      }else{
        echo json_encode(array('message' => 'visa Not created'));
      }
    }

    public function update(){
      //Headers
      header('Access-Control-Allow-Origin: *');//public access
      header('Content-Type: application/json');
      header('Access-Control-Allow-Methods: PUT');
      header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
      $data = json_decode(file_get_contents("php://input"));

      //Set ID tp update
      $this->Visamomdel->id = $data->id;


      $this->Visamomdel->nom    = $data->nom;
      $this->Visamomdel->prenom     = $data->prenom;
      $this->Visamomdel->date_ns      = $data->date_ns;
      $this->Visamomdel->nationalite   = $data->nationalite;
      $this->Visamomdel->situation     = $data->situation;
      $this->Visamomdel->adresse       = $data->adresse;
      $this->Visamomdel->type_visa     = $data->type_visa;
      $this->Visamomdel->date_depart   = $data->date_depart;
      $this->Visamomdel->date_arriver  = $data->date_arriver;
      $this->Visamomdel->num_document  = $data->num_document;
      $this->Visamomdel->type_document = $data->type_document;

      //Update visa

      if ($this->Visamomdel->update()) {
        echo json_encode(array('message' => 'visa Updated'));
      }else{
        echo json_encode(array('message' => 'visa Not Updated'));
      }
    }

    public function delete(){
      //Headers
      header('Access-Control-Allow-Origin: *');//public access
      header('Content-Type: application/json');
      header('Access-Control-Allow-Methods: DELETE');
      header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

      $data = json_decode(file_get_contents("php://input"));

      //Set ID tp update
      $this->Visamomdel->id = $data->id;


      //delete visa

      if ($this->Visamomdel->delete()) {
        echo json_encode(array('message' => 'visa deleted'));
      }else{
        echo json_encode(array('message' => 'visa Not deleted'));
      }
    }
  }