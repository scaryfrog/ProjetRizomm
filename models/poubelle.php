<?php
  class Poubelle
  {
    private $id_poubelle;
    private $batiment;
    private $ilot;
    private $type_flux;
    private $seuil;
    private $ip;

    public function __construct(){}

    public function setId_poubelle($id_poubelle)
    {
      $this->id_poubelle=$id_poubelle;
    }

     public function getId_poubelle()
    {
     return $this->id_poubelle;
    }

     public function setBatiment($batiment)
    {
      $this->batiment=$batiment;
    }

     public function getBatiment()
    {
     return $this->batiment;
    }

    public function setIlot($ilot)
    {
      $this->ilot=$ilot;
    }

    public function getIlot()
    {
     return $this->ilot;
    }

    public function setType_flux($type_flux)
    {
      $this->type_flux=$type_flux;
    }

    public function getType_flux()
    {
     return $this->type_flux;
    }    

    public function setSeuil($init_seuil)
    {
      $this->seuil=$init_seuil;
    }

    public function getSeuil()
    {
     return $this->seuil;
    }
    public function setIP($ip)
    {
      $this->ip=$ip;
    }

    public function getIP()
    {
     return $this->ip;
    }              


  public  function Create_trash_can()
     {
         $db = Db::getInstance();
          $req = $db->query("INSERT INTO  poubelles (batiment, ilot, type_flux, seuil) VALUES('".$this->batiment."','".$this->ilot."','".$this->type_flux."','".$this->seuil."','".$this->ip."')");
     }

   public static function display_all()
     {
      $list=[];
      $db=Db::getInstance();
      $req=$db->query('SELECT * FROM poubelles');
      foreach ($req->fetchAll() as $temp) 
      {
        $poubelle= new Poubelle();
        $poubelle->setId_poubelle($temp['id_poubelle']);
        $poubelle->setBatiment($temp['batiment']);
        $poubelle->setIlot($temp['ilot']);
        $poubelle->setType_flux($temp['type_flux']);
        $poubelle->setSeuil($temp['seuil']);
        $poubelle->setIP($temp['IP']);
        $list[]=$poubelle;
      }

      return $list;
     }  


   public static  function FindById($id) 
    {
       $db=Db::getInstance();
       $id=intval($id);
       $req= $db->prepare('SELECT * FROM poubelles WHERE id_poubelle=:id');
       $req->execute(array('id' =>$id));
       $temp=$req->fetch();
       $poubelle = new Poubelle();
       $poubelle->setId_poubelle($temp['id_poubelle']);
       $poubelle->setBatiment($temp['batiment']);
       $poubelle->setIlot($temp['ilot']);
       $poubelle->setType_flux($temp['type_flux']);
       $poubelle->setSeuil($temp['seuil']);
       $poubelle->setIP($temp['IP']);
       return $poubelle;
    }

 public static  function FindByBatiment($batiment)
    {
       $db=Db::getInstance();
       $batiment=strtolower($batiment);
       $req= $db->prepare("SELECT * FROM poubelles WHERE batiment LIKE '%".$batiment."%' ");
       $req->execute();

       $list = [];
       foreach ($req->fetchAll() as $temp) 
       {
           $poubelle = new Poubelle();
           $poubelle->setId_poubelle($temp['id_poubelle']);
           $poubelle->setBatiment($temp['batiment']);
           $poubelle->setIlot($temp['ilot']);
           $poubelle->setType_flux($temp['type_flux']);
           $poubelle->setSeuil($temp['seuil']);
           $poubelle->setIP($temp['IP']);
           $list[]=$poubelle;
          
       }
      return $list;
    }

    public static function GetAllFlux()
    {
       $db=Db::getInstance();
       $req= $db->prepare("SELECT type_flux FROM poubelles");
       $req->execute();
       $list = [];
       foreach ($req->fetchAll() as $temp) 
       {
           if(!in_array($temp[0], $list))
           {
              $list[]=$temp[0];
           }
          
       }
      return $list;
    }


    public static  function FindByFlux($flux)
    {
       $db=Db::getInstance();
       $req= $db->prepare("SELECT * FROM poubelles WHERE type_flux LIKE '%".$flux."%' ");
       $req->execute();

       $list = [];
       foreach ($req->fetchAll() as $temp) 
       {
           $poubelle = new Poubelle();
           $poubelle->setId_poubelle($temp['id_poubelle']);
           $poubelle->setBatiment($temp['batiment']);
           $poubelle->setIlot($temp['ilot']);
           $poubelle->setType_flux($temp['type_flux']);
           $poubelle->setSeuil($temp['seuil']);
           $poubelle->setIP($temp['IP']);
           $list[]=$poubelle;
          
       }
      return $list;
    }

 public  function update()
     {
      $db = Db::getInstance();
      $req = $db->query("UPDATE poubelles SET batiment='".$this->batiment."',ilot='".$this->ilot."',type_flux='".$this->type_flux."',seuil='".$this->seuil."' WHERE id_poubelle= $this->id_poubelle ");
      $r3 = file_get_contents('http://'.$this->ip."/reglerFlux?flux=".$this->type_flux);
     }
        

 public  function remove()
     {
      $db = Db::getInstance();
      $req = $db->query("DELETE FROM poubelles WHERE id_poubelle= $this->id_poubelle ");
     }      
  }



?>