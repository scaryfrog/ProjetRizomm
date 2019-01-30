<?php		
        try
        {

            $bdd = new PDO('mysql:host=localhost;dbname=projetm1;charset=utf8', 'root', 'root');
        }
        catch(Exception $e)
        {

                die('Erreur : '.$e->getMessage());

        }
        $reponse = $bdd->query('SELECT acces from utilisateurs WHERE numero_badge="'.$_GET["num_badge"].'"');
        $donnees = $reponse->fetchAll();
        if(count($donnees)==0){echo 0;}
        else {echo(  $donnees[0][0]   );}
        					  
?>