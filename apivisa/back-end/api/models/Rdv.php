<?php

class Rdv{
    private  $id;
    private  $date;
    private  $horaire;
    // type de consultation
    private  $typeVisa;
    private  $typeDoc;
    private  $depart;
    private  $arrive;
    private  $reference;

    public function setId($id){
        $this->id = $id;
    }

    public function setDate($date){
        $this->date = $date;
     }

     public function setTypeVisa($typeVisa){
        $this->typeVisa = $typeVisa;
     }
     public function setTypeDoc($typeDoc){
        $this->typeDoc = $typeDoc;
     }
     public function setDepart($depart){
        $this->depart = $depart;
     }
     public function setArrive($arrive){
        $this->arrive = $arrive;
     }

     public function setHoraire($horaire){
        $this->horaire = $horaire;
     }

     public function setReference($reference){
        $this->reference = $reference;
     }

     public function ajouterRdv()
    {
        $qr='INSERT into rendezvous (horaire,date,typeVisa,typeDoc,depart,arrive,reference) values(? ,? ,?,?,? ,?,?)';
        $res=DB::connect()->prepare($qr);
        if($res->execute([
            $this->horaire,
            $this->date,
            $this->typeVisa,
            $this->typeDoc,
            $this->depart,
            $this->arrive,
            $this->reference
        ])){
            return ['message' => 'ok'];
        }
        else{
            return ['message' => 'no'];
        }

    }

     public function afficherRdv($ref)
    {
        $qr='SELECT * from rendezvous where reference="'.$ref.'" ORDER by date , horaire ';
        $res=DB::connect()->prepare($qr);
        $res->execute();

        return $res->fetchAll(PDO::FETCH_ASSOC);

    }
    
  
    public function afficherHr($date)
    {
        $qr='SELECT horaire from rendezvous where date="'.$date.'"' ;
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll(PDO::FETCH_COLUMN);
    }

     public function modifierRdv()
    {
     
        $qr="UPDATE rendezvous SET date='$this->date',horaire='$this->horaire',typeVisa='$this->typeVisa',typeDoc='$this->typeDoc',depart='$this->depart',arrive='$this->arrive' WHERE id=".(int)$this->id;
        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no ip';
        }
    }

    public function editRdv()
    {
        $qr='SELECT * from rendezvous where id='.(int)$this->id;
        $res=DB::connect()->query($qr);
       if( $row=$res->fetch(PDO::FETCH_ASSOC)){
       
        return $row;
        
       }
       else{
        return array("message"=>"pas de rendez-vous avec cette cle");
       }
        
        //    $res->close();
           $res=null;
      
    }


     public function supprimerRdv()
    {
            $qr="DELETE from rendezvous where id=".(int)$this->id;
            $res=DB::connect()->query($qr);
    }


}



?>