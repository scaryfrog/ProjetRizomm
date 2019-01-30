<?php
 require_once('models/flux.php');


class FluxController
{
    public function save_flux()
      {
        //intance e la classe modele
        $flux= new Flux();
        $flux->setType($_POST['type']);
        $flux->setPrix_kilo($_POST['prix_kilo']);

        //appel de la methode create de la class Flux
        $flux->Create_flux();

        //redirection vers l'affichage
        $this->index();
      }

     public function add_flux()
      {
        require_once('views/flux/add.php');
      }

     public function index() 
      {
        $flux=Flux::display_all();
        require_once('views/flux/index.php');
      }

    public function edit_flux()
      {
        if(!isset($_GET['id']))
          return call('pages', 'error');
        $flux= Flux::FindById($_GET['id']);
        require_once('views/flux/edit.php');
      }

    public function update_flu()
      { 
        $flux= Flux::FindById($_POST['id']);
        $flux->setType($_POST['type']);
        $flux->setPrix_kilo($_POST['prix_kilo']);
        $flux->update_flux();
         $this->index();
      }

    public function delete()
      {
        if(!isset($_GET['id']))
          return call('pages', 'error');
        $flux= Flux::FindById($_GET['id']);
        require_once('views/flux/delete.php');
      } 

    public function remove()
      {
        $flux= Flux::FindById($_POST['id']);
        $flux->remove_flux();
        $this->index();
      }      
   }
?>