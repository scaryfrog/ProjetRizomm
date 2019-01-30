<?php
 require_once('models/poubelle.php');
 require_once('models/flux.php');


   class PoubellesController
   {
    public function save()
      {
        //intance e la classe modele
        $poubelle= new Poubelle();
        $poubelle->setBatiment($_POST['batiment']);
        $poubelle->setIlot($_POST['ilot']);
        $poubelle->setType_flux($_POST['flux']);
        $poubelle->setSeuil($temp['seuil']);
        $poubelle->setIP($temp['IP']);
        //appel de la methode create de la class model
        $poubelle->Create_trash_can();

        //redirection vers l'affichage
        $this->index();
      }

     public function add()
      {
        $flux=Flux::get_all();
        require_once('views/poubelles/add.php');
      }

     public function index()
      {
        $poubelle=Poubelle::display_all();
        $uniqueflux=Poubelle::GetAllFlux();
        require_once('views/poubelles/index.php');
      }

    public function search()
      {
        if(!isset($_POST['search']))
          return call('pages', 'error');
        $poubelle= Poubelle::FindByBatiment($_POST['search']);
        $uniqueflux=Poubelle::GetAllFlux();
        require_once('views/poubelles/index.php');
      }

    public function searchFlux()
      {
        if(!isset($_POST['flux']))
          return call('pages', 'error');
        $poubelle= Poubelle::FindByFlux($_POST['flux']);
        $uniqueflux[0] = $_POST['flux'];
        require_once('views/poubelles/index.php');
      }

    public function edit()
      {
        if(!isset($_GET['id']))
          return call('pages', 'error');
        $poubelle= Poubelle::FindById($_GET['id']);
        $uniqueflux=Poubelle::GetAllFlux();
        require_once('views/poubelles/edit.php');
      }

    public function update()
      {
        $poubelle= Poubelle::FindById($_POST['id']);
        $poubelle->setBatiment($_POST['batiment']);
        $poubelle->setIlot($_POST['ilot']);
        $poubelle->setType_flux($_POST['flux']);
        $poubelle->setSeuil($_POST['seuil']);
        $poubelle->update();
         $this->index();
      }

    public function delete()
      {
        if(!isset($_GET['id']))
          return call('pages', 'error');
        $poubelle= Poubelle::FindById($_GET['id']);
        require_once('views/poubelles/delete.php');
      } 

    public function remove()
      {
        $poubelle= Poubelle::FindById($_POST['id']);
        $poubelle->remove();
        $this->index();
      }      
   }
?>