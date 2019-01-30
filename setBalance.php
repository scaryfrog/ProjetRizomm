<?php	

        function getUserIP()
        {
            // Get real visitor IP behind CloudFlare network
            if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                      $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                      $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }
            $client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = $_SERVER['REMOTE_ADDR'];

            if(filter_var($client, FILTER_VALIDATE_IP))
            {
                $ip = $client;
            }
            elseif(filter_var($forward, FILTER_VALIDATE_IP))
            {
                $ip = $forward;
            }
            else
            {
                $ip = $remote;
            }
            //return "192.168.43.142";
            return $ip;
        }

        try
        {

            $bdd = new PDO('mysql:host=localhost;dbname=projetm1;charset=utf8', 'root', 'root');
        }
        catch(Exception $e)
        {

                die('Erreur : '.$e->getMessage());

        }

         //where http.php is the saved file
        if(!isset($_GET["id"]) || $_GET["id"] == 0 || $_GET["id"] == "0")
        {
            $crea = $bdd->query("INSERT INTO `poubelles` (`id_poubelle`, `batiment`, `ilot`, `type_flux`, `IP`, `seuil`) VALUES (NULL, '', '', 'Papier', '".getUserIP()."', '100')");
            $reponse = $bdd->query('SELECT id_poubelle,type_flux from poubelles WHERE IP = "'.getUserIP().'"');
            $donnees = $reponse->fetchAll();
            $r1 = file_get_contents('http://'.getUserIP()."/reglerID?ID=".$donnees[0][0]);
            $r2 = file_get_contents('http://'.getUserIP()."/reglerFlux?flux=".$donnees[0][1]);
            return;  
        }//balancer le n°id & type de flux
        else
        {
            $reponse = $bdd->query('SELECT * FROM `poubelles` WHERE `id_poubelle` = '.$_GET["id"]);
            $donnees = $reponse->fetchAll();
            if(count($donnees) == 0)
            {
                $crea = $bdd->query("INSERT INTO `poubelles` (`id_poubelle`, `batiment`, `ilot`, `type_flux`, `IP`, `seuil`) VALUES (NULL, '', '', 'Papier', '".getUserIP()."', '100')");
                $reponse = $bdd->query('SELECT id_poubelle,type_flux from poubelles WHERE IP = "'.getUserIP().'"');
                $donnees = $reponse->fetchAll();
                $r1 = file_get_contents('http://'.getUserIP()."/reglerID?ID=".$donnees[0][0]);
                $r2 = file_get_contents('http://'.getUserIP()."/reglerFlux?flux=".$donnees[0][1]);
                return;
            }
            else {
                $r3 = file_get_contents('http://'.getUserIP()."/reglerFlux?flux=".$donnees[0][3]);

                //Update l'ip si a changé
                if(getUserIP() != $donnees[0][4])
                {
                    $r4 = $bdd->query("UPDATE 'poubelles' SET 'IP' = '".getUserIP()."' WHERE 'id_poubelle' = '".$_GET["id"]."'");
                }
                
            }
        }

        					  
?>