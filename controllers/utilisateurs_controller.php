<?php
 require_once('models/utilisateur.php');

   class UtilisateursController
   {
    public function save()
      {
        //intance e la classe modele
        $utilisateur= new Utilisateurs();
        $utilisateur->setNumero_badge($_POST['numBadge']);
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setPrenom($_POST['prenom']);
        $utilisateur->setAcces($_POST['niveau']);        

        //appel de la methode create de la class model
        $utilisateur->create_User();

        //redirection vers l'affichage
        $this->index();
      }

     public function add()
      {
        require_once('views/utilisateurs/add.php');
      }

     public function index()
      {
        $utilisateur=Utilisateurs::display_all2();
        require_once('views/utilisateurs/index.php');
      }

    public function search()
      {
        if(!isset($_POST['search']))
          return call('pages', 'error');
        $utilisateur= Utilisateurs::FindByName($_POST['search']);
        require_once('views/utilisateurs/index.php');
      }

    public function edit()
      {
        if(!isset($_GET['id']))
          return call('pages', 'error');
        $utilisateur= Utilisateurs::FindById($_GET['id']);
        require_once('views/utilisateurs/edit.php');
      }

    public function update()
      {
        $utilisateur= Utilisateurs::FindById($_POST['id']);
        $utilisateur->setNumero_badge($_POST['numBadge']);
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setPrenom($_POST['prenom']);
        $utilisateur->setAcces($_POST['niveau']);
        $utilisateur->update();         
         $this->index();
      }

    public function delete()
      {
        if(!isset($_GET['id']))
          return call('pages', 'error');
        $utilisateur= Utilisateurs::FindById($_GET['id']);
        require_once('views/utilisateurs/delete.php');
      } 

    public function remove()
      {
        $utilisateur= Utilisateurs::FindById($_POST['id']);
        $utilisateur->remove();
        $this->index();
      }      
   }
?>