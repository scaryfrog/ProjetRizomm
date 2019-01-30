<?php
class Flux 
{
  private $id_flux;
  private $type;
  private $prix_kilo;

  public function __construct(){}

  public function getId_flux()
    {
      return $this->id_flux;
    }

  public function setId_flux($init_id_flux)
    {
      $this->id_flux=$init_id_flux;
    }  

  public function setType($type)
    {
      $this->type=$type;
    }

  public function getType()
    {
      return $this->type;
    }

  public function setPrix_kilo($init_prix_kilo)
    {
      $this->prix_kilo=$init_prix_kilo;
    }    

  public function getPrix_kilo()
    {
      return $this->prix_kilo;
    }

  public  function Create_flux()
     {
         $db = Db::getInstance();
          $req = $db->query("INSERT INTO  flux (type, prix_kilo) VALUES('".$this->type."','".$this->prix_kilo."')");
     }    

  public static function display_all()
    {
      $db = Db::getInstance();
      $req= $db->prepare("SELECT * FROM flux");
      $req->execute();
      $list = [];
      foreach ($req->fetchAll() as $temp) 
        {

          $flux = new Flux();
          $flux->setId_flux($temp['id_flux']);
          $flux->setType($temp['type']);
          $flux->setPrix_kilo($temp['prix_kilo']);
          $list[] = $flux;
        }
  
      return $list;
    }

   public static  function FindById($id) 
    {
       $db=Db::getInstance();
       $id=intval($id);
       $req= $db->prepare('SELECT * FROM flux WHERE id_flux=:id');
       $req->execute(array('id' =>$id));
       $temp=$req->fetch();
       $flux = new Flux();
       $flux->setId_flux($temp['id_flux']);
       $flux->setType($temp['type']);
       $flux->setPrix_kilo($temp['prix_kilo']);

       return $flux;
    }    

 public  function update_flux()
     {
      $db = Db::getInstance();
      $req = $db->query("UPDATE flux SET type='".$this->type."',prix_kilo='".$this->prix_kilo."' WHERE id_flux= $this->id_flux ");
     }
        

 public  function remove_flux()
     {
      $db = Db::getInstance();
      $req = $db->query("DELETE FROM flux WHERE id_flux= $this->id_flux ");
     }     
    
}
?>
