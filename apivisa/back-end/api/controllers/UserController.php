<?php

// include_once '../Database/DB.php';
// include_once '../models/User.php';

class UserController //UtilisateurController
{

    public function index(){
        header('location:http://localhost:8080');
    }

    public function addUser() //ajouterUtil
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        $data = json_decode(file_get_contents("php://input"));
        $user = new User();
       
        $user->setFirstName($data->firstname);
        $user->setLastName($data->lastname);
        $ref = $this->nbru($data->lastname); // add random number to 
        $user->setReference($ref);
        $user->setNationality($data->nationality);
        $user->setAddress($data->address);
        $user->setSituation($data->situation);
        $user->setNaissance($data->naissance);
        $tab = array("reference" => $ref,   "firstname" => $data->firstname, "lastname" => $data->lastname, "nationality" => $data->nationality,"address" => $data->address,"situation" => $data->situation,"naissance" => $data->naissance);
        $user->addUser($tab);
        echo json_encode($tab);
    }


    public function nbru($lastname)  // generate random number
    {
        $user = new User();
        $nb = $user->count();
        $ran = rand();
        return $lastname . $nb['nb'] . $ran;
    }

    public function Signin($ref)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: GET');
        $user = new User();
        $user->setReference($ref);
        $u = $user->Signin($ref);
        echo json_encode($u);
    }

}