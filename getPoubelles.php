<?php		
        try

        {

            $bdd = new PDO('mysql:host=localhost;dbname=projetm1;charset=utf8', 'root', 'root');

        }

        catch(Exception $e)

        {

                die('Erreur : '.$e->getMessage());

        }
        $reponse = $bdd->query('SELECT id_poubelle,batiment,ilot,type_flux,IP,seuil from poubelles');
        $idList = array();




        while($result = $reponse->fetch()) {
            array_push($idList,[$result[0],$result[1],$result[2],$result[3],$result[4],$result[5] ] );
        }
        print_r(json_encode($idList));					  
?>