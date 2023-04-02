<?php

class User
{

    // private $conn;  
    // private $table = 'users';
    private  $reference;
    private  $firstname;
    private  $lastname;
    private  $nationality;
    private  $address;
    private  $situation;
    private  $naissance;

    // public function __construct($db)
    // {
    //     $this->conn = $db;
    // }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function setSituation($situation)
    {
        $this->situation = $situation;
    }
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;
    }

    public function count()
    {

        $qr = "SELECT count(*) as nb from users";
        $res = DB::connect()->query($qr)->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function addUser($tab)  //ajouterU
    {

        $ref = $tab['reference'];
        $first = $tab['firstname'];
        $last = $tab['lastname'];
        $nationality = $tab['nationality'];
        $address = $tab['address'];
        $situation = $tab['situation'];
        $naissance = $tab['naissance'];
        

        // $qr='INSERT INTO users (reference, firstname, lastname, nationality) values("'.$this->reference.'","'.$this->firstname.'","'.$this->lastname.'",'.$this->nationality.'")';
        $qr = "INSERT INTO `users` ( `reference`, `firstname`, `lastname`, `nationality`, `address`, `situation`, `naissance`) values  ( '$ref'  ,'$first','$last','$nationality','$address','$situation','$naissance') ";
        // die($qr);
        $res = DB::connect()->prepare($qr);
        if ($res->execute()) {
            return 'ok';
        } else {
            return 'no';
        }
    }

    public function Signin()
    {
        $qr='SELECT * from users where reference="'.$this->reference.'"';
        $res=DB::connect()->query($qr);
       if( $row=$res->fetch(PDO::FETCH_ASSOC)){
        return $row;
        
       }
       else{
        return array("message"=>"ID is not found");
       }
        
        //    $res->close();
           $res=null; 
    }
}
