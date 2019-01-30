<?php

class Analyse
{
    public static  function getHistorique()
      {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT historiques.id_transaction, historiques.numero_badge, historiques.id_poubelle, historiques.type_flux, historiques.poids_flux, historiques.date_transaction, poubelles.batiment FROM historiques INNER JOIN poubelles ON historiques.id_poubelle=poubelles.id_poubelle');
             foreach ($req->fetchAll() as $temp) 
             {
               $historique = new Historique();
               $historique->setId_transaction($temp['id_transaction']);
               $historique->setNumero_badge($temp['numero_badge']);
               $historique->setId_poubelle($temp['id_poubelle']);
               $historique->setType_flux($temp['type_flux']);
               $historique->setPoids_fulx($temp['poids_flux']);

               //$historique->nom_modele=$temp['libelle'];
               $list[] = $historique;
             }
             return $list;
      }

    public static function getPoubelles()
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
        $list[]=$poubelle;
      }

      return $list;
     }        

}

?>