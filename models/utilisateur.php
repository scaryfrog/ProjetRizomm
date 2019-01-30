<?php
  class Utilisateurs
  {
      private $id_utilisateur;
      private $numero_badge;
      private $nom;
      private $prenom;
      private $acces;

      public function __construct(){}

    public function setId_utilisateur($id_utilisateur)
      {
        $this->id_utilisateur=$id_utilisateur;
      }

    public function getId_utilisateur()
      {
       return $this->id_utilisateur;
      }

    public function setNumero_badge($badge)
      {
        $this->numero_badge=$badge;
      }

    public function getNumero_badge()
      {
       return $this->numero_badge;
      }

    public function setNom($initNom)
      {
        $this->nom=$initNom;
      }

    public function getNom()
      {
       return $this->nom;
      }  

    public function setPrenom($initPrenom)
      {
        $this->prenom=$initPrenom;
      }

    public function getPrenom()
      {
       return $this->prenom;
      }

    public function setAcces($initAcces)
      {
        $this->acces=$initAcces;
      }

    public function getAcces()
      {
       return $this->acces;
      }


public static function display_all2()
     {
      $list=[];
      $db=Db::getInstance();
      $req=$db->query('SELECT * FROM utilisateurs WHERE numero_badge != "RELEVE_AUTO" ');
      foreach ($req->fetchAll() as $temp) 
      {
        $utilisateur= new Utilisateurs();
        $utilisateur->setId_utilisateur($temp['id_utilisateur']);
        $utilisateur->setNumero_badge($temp['numero_badge']);
        $utilisateur->setNom($temp['nom']);
        $utilisateur->setPrenom($temp['prenom']);
        $utilisateur->setAcces($temp['acces']);

        $list[]=$utilisateur;
      }

      return $list;
     }             
                    

  public function create_User()
      {
         $db = Db::getInstance();
          $req = $db->query("INSERT INTO  utilisateurs (numero_badge, nom, prenom, acces) VALUES('".$this->numero_badge."','".$this->nom."','".$this->prenom."','".$this->acces."')"); 
      }

   public static  function FindById($id) 
    {
       $db=Db::getInstance();
       $id=intval($id);
       $req= $db->prepare('SELECT * FROM utilisateurs WHERE id_utilisateur=:id');
       $req->execute(array('id' =>$id));
       $temp=$req->fetch();
       $utilisateur= new Utilisateurs();
       $utilisateur->setId_utilisateur($temp['id_utilisateur']);
       $utilisateur->setNumero_badge($temp['numero_badge']);
       $utilisateur->setNom($temp['nom']);
       $utilisateur->setPrenom($temp['prenom']);
       $utilisateur->setAcces($temp['acces']);
       return $utilisateur;
    }      

 public static  function FindByName($name)
    {
       $db=Db::getInstance();
       $name=strtolower($name);
       $req= $db->prepare("SELECT * FROM utilisateurs WHERE nom LIKE '%".$name."%' ");
       $req->execute();

       $list = [];
       foreach ($req->fetchAll() as $temp) 
       {
         $utilisateur= new Utilisateurs();
         $utilisateur->setId_utilisateur($temp['id_utilisateur']);
         $utilisateur->setNumero_badge($temp['numero_badge']);
         $utilisateur->setNom($temp['nom']);
         $utilisateur->setPrenom($temp['prenom']);
         $utilisateur->setAcces($temp['acces']);

           $list[]=$utilisateur;
          
       }
      return $list;
    }

    public function search()
      {
        if(!isset($_POST['search']))
          return call('pages', 'error');
        $historique= Utilisateurs::FindByName($_POST['search']);
        require_once('views/utilisateurs/index.php');
      }


 public  function update()
     {
      $db = Db::getInstance();
      $req = $db->query("UPDATE utilisateurs SET numero_badge='".$this->numero_badge."',nom='".$this->nom."',prenom='".$this->prenom."',acces='".$this->acces."' WHERE id_utilisateur= ".$this->id_utilisateur);
     }      

    public function remove()
      {
        $db=Db::getInstance();
        $req = $db->query("DELETE FROM utilisateurs WHERE id_utilisateur=$this->id_utilisateur");
      }      

  }
?>