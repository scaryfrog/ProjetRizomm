<?php
  require_once('models/historique.php');
  require_once('models/poubelle.php');

  class HistoriquesController
  {
     public function index()
      {
        $historique = Historique::display_all();
        require_once('views/historiques/index.php');
      }

     public function add()
      {
        $modeles = Poubelle::display_all();
        require_once('views/historiques/add.php');
      }

     public function save()
      {
        $historique = new Historique();
        $historique->setNumero_badge($_POST['numeroBadge']);
        $historique->setId_poubelle($_POST['idPoubelle']);
        $historique->setType_flux($_POST['flux']);
        $historique->setPoids_flux($_POST['poids']);

        $historique->create_historical();
        $this->index();
      }  

     public function edit()
      {
        if(!isset($_GET['id']))
          return call('pages', 'error');
        $historique = Historique::FindById($_GET['id']);
        $modeles = Poubelle::display_all();
        require_once('views/historiques/edit.php');
      }

     public function update()
      {
        $historique = new Historique();
        $historique->setNumero_badge($_POST['numBadge']);
        $historique->setType_flux($_POST['flux']);
        $historique->setPoids_flux($_POST['Poids']);
        $historique->update();
        $this->index();
     } 

     public function delete()
      {
        if(!isset($_GET['id']))
          return call('pages', 'error');
        $historique = Historique::FindById($_GET['id']);
        require_once('views/historiques/delete.php');
      }  

     public function remove()
      {
        $historique = Historique::FindById($_POST['id']);
        $historique->remove();
        $this->index();
      }  

     public function searchf()
      {
        console_log($_POST['searchf']);
        if(!isset($_POST['searchf']))
          return call('pages', 'error');
        $historique = Historique::FindByType_flux($_POST['searchf']);
        require_once('views/historiques/index.php');
      }

      public function searchb()
      {
        if(!isset($_POST['searchb']))
          return call('pages', 'error');
        $historique = Historique::FindByType_bat($_POST['searchb']);
        require_once('views/historiques/index.php');
      }                                                                      
  } 

?>