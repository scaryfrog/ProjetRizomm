<?php
  class Historique
  {
      private $id_transaction;
      private $numero_badge;
      private $id_poubelle;
      private $type_flux;
      private $poids_flux;

      public function __construct(){}

    public function setId_transaction($id)
      {
        $this->id_transaction=$id;
      }

    public function getId_transaction()
      {
       return $this->id_transaction;
      }

    public function setNumero_badge($badge)
      {
        $this->numero_badge=$badge;
      }

    public function getNumero_badge()
      {
       return $this->numero_badge;
      }

    public function setId_poubelle($id_p)
      {
        $this->id_poubelle=$id_p;
      }

    public function getId_poubelle()
      {
       return $this->id_poubelle;
      }

    public function getType_flux()
    {
      return $this->type_flux;
    }  
    public function setType_flux($type_flux)
    {
      $this->type_flux = $type_flux;
    }  


    public function setPoids_flux($poids)
      {
        $this->poids_flux=$poids;
      }

    public function getPoids_flux()
      {
       return $this->poids_flux;
      }      

    public static  function display_all()
      {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT historiques.id_transaction, historiques.numero_badge, historiques.id_poubelle, historiques.poids_flux, historiques.date_transaction, poubelles.batiment, poubelles.type_flux FROM historiques INNER JOIN poubelles ON historiques.id_poubelle=poubelles.id_poubelle');
             foreach ($req->fetchAll() as $temp) 
             {
               $historique = new Historique();
               $historique->setId_transaction($temp['id_transaction']);
               $historique->setNumero_badge($temp['numero_badge']);
               $historique->setId_poubelle($temp['id_poubelle']);
               $historique->setPoids_flux($temp['poids_flux']);
               $historique->setType_flux($temp['type_flux']);
               //$historique->nom_modele=$temp['libelle'];
               $list[] = $historique;
             }
             return $list;
      }                     

    public   function create_historical()  
      {
        $db = Db::getInstance();
        $req = $db->query("INSERT INTO historiques (numero_badge, id_poubelle, poids_flux) VALUES('".$this->numero_badge."','".$this->id_poubelle."','".$this->poids_flux."')");
      }

   public static  function FindById($id) 
    {
       $db=Db::getInstance();
       $id=intval($id);
       $req= $db->prepare('SELECT * FROM historiques WHERE id_transaction=:id');
       $req->execute(array('id' =>$id));
       $temp=$req->fetch();
       $historique = new Historique();
       $historique->setId_transaction($temp['id_transaction']);
       $historique->setNumero_badge($temp['numero_badge']);
       $historique->setId_poubelle($temp['id_poubelle']);
       $historique->setPoids_flux($temp['poids_flux']);
       return $historique;
    }      


public static  function FindByType_Bat($bat)
    {
       $db=Db::getInstance();
       $bat=strtolower($bat);
       $req= $db->prepare("SELECT historiques.id_transaction, historiques.numero_badge, historiques.id_poubelle, historiques.type_flux, historiques.poids_flux, historiques.date_transaction, poubelles.batiment FROM historiques INNER JOIN poubelles ON historiques.id_poubelle=poubelles.id_poubelle WHERE poubelles.batiment LIKE '%".$bat."%' ");
       $req->execute();

       $list = [];
       foreach ($req->fetchAll() as $temp) 
       {
         $historique = new Historique();
         $historique->setId_transaction($temp['id_transaction']);
         $historique->setNumero_badge($temp['numero_badge']);
         $historique->setId_poubelle($temp['id_poubelle']);
         $historique->setPoids_flux($temp['poids_flux']);
         $historique->setType_flux($temp['type_flux']);
         $list[] = $historique;
          
       }
      return $list;
    }

 public  function update()
     {
      $db = Db::getInstance();
      $req = $db->query("UPDATE historiques SET numero_badge='".$this->numero_badge."',id_poubelle='".$this->id_poubelle."',,poids_flux='".$this->poids_flux."' WHERE id_transaction= ".$this->id_transaction);
     }      

    public function remove()
      {
        $db=Db::getInstance();
        $req = $db->query("DELETE FROM historiques WHERE id_transaction=".$this->id_transaction );
      }      

  }


  function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
?>