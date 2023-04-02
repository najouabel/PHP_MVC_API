<?php
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET , POST , PUT , DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

//traitement data
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
  return true;
}
class RdvController{

    public function ajouterRdv()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

        $data = json_decode(file_get_contents("php://input"));
        $rdv=new Rdv();
        $rdv->setDate($data->date);
        $rdv->setHoraire($data->horaire);
        $rdv->setTypeVisa($data->typeVisa);
        $rdv->setTypeDoc($data->typeDoc);
        $rdv->setDepart($data->depart);
        $rdv->setArrive($data->arrive);
        $rdv->setReference($data->reference);
        $s = $rdv->ajouterRdv();
        echo json_encode($s);
    }

    public function afficherRdv($ref)
    { 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');

         if($_SERVER['REQUEST_METHOD']=='GET'){
                $rdv=new Rdv();
                $tab=$rdv->afficherRdv($ref);
                echo json_encode($tab);
         }
    }
   
    public function afficherHr($date)
    { 
        header('Access-Control-Allow-Origin: *'); 
        header('Content-Type: application/json');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

         if($_SERVER['REQUEST_METHOD']=='GET'){
        
            $rdv=new Rdv();
            $tab=$rdv->afficherHr($date);
            echo json_encode($tab);
         }
    }
    public function modifierRdv($id)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: PUT');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $data = json_decode(file_get_contents("php://input"));
        $rdv=new Rdv();
        $rdv->setId($data->id); 
        $rdv->setDate($data->date);
        $rdv->setHoraire($data->horaire);
        $rdv->setTypeVisa($data->typeVisa);
        $rdv->setTypeDoc($data->typeDoc);
        $rdv->setDepart($data->depart);
        $rdv->setArrive($data->arrive);
        $s=$rdv->modifierRdv();
        echo "done";
        // }
        
    }

    public function supprimerRdv($id)
    { 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: DELETE');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
      
        $rdv=new Rdv();
        $rdv->setId($id);
        $rdv->supprimerRdv();
        
        
    }

    public function getoneRdv($id)
    {  
        // if($_SERVER['REQUEST_METHOD']=='GET'){
            
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: GET');
      
        $rdv=new Rdv();
        $rdv->setId($id); 
        $rdvs=$rdv->editRdv();
        echo json_encode($rdvs);

        // }
    }


    
}
