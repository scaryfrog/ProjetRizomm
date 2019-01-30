<?php
        try
        {

            $bdd = new PDO('mysql:host=localhost;dbname=projetm1;charset=utf8', 'root', 'root');
        }
        catch(Exception $e)
        {

                die('Erreur : '.$e->getMessage());

        }


 //where http.php is the saved file
        if(isset($_GET["id"]) && isset($_GET["numero_badge"]) && isset($_GET["poids"]))
        {
            $crea = $bdd->query('INSERT INTO `historiques` (`id_transaction`, `numero_badge`, `id_poubelle`, `poids_flux`, `date_transaction`) VALUES (NULL, "'.$_GET["numero_badge"].'", '.$_GET["id"].' , '.$_GET["poids"].', CURRENT_TIMESTAMP)');
           // $reponse = $bdd->query('SELECT id_poubelle,type_flux from poubelles WHERE IP = "'.getUserIP().'"');
           // $donnees = $reponse->fetchAll();
           // $r1 = file_get_contents('http://'.getUserIP()."/reglerID?ID=".$donnees[0][0]);
           // $r2 = file_get_contents('http://'.getUserIP()."/reglerFlux?flux=".$donnees[0][1]);

            // UPDATE l'Ip si a changé
       	//Si poids supérieur au seuil de la poubelle -> Envoyer mail
       	    
            $r_seuil = $bdd->query("SELECT seuil FROM poubelles WHERE id_poubelle='".$_GET["id"]."'");
            try
            {
              $seuil = $r_seuil->fetch();
              echo floatval($_GET["poids"]);
              echo ' seuil:'.floatval($seuil[0]);
              if(floatval($_GET["poids"]) > floatval($seuil[0]))
            {
              require 'PHPMailer/PHPMailerAutoload.php';
              $mail = new PHPMailer();
              $mail->IsSmtp();
              $mail->SMTPAuth = true;
              $mail->Debugoutput='html';
              $mail->Host = "smtp.gmail.com";

              $mail->Port = 25;
              $mail->isHTML(true);
              $mail->Username = "bricenicodem.simeupouomegne@esprit.tn";
              $mail->Password = "brlmfkdkrlgzwzhq";
              $mail->setFrom('bricenicodem.simeupouomegne@esprit.tn', 'AlertePoubelles');
              $mail->Subject = "Poubelle pleine";
              $mail->Body="Poubelle ayant l'ID".$_GET["id"]." est au dessus de son seuil d'alerte. \n Poids actuel =".$_GET["poids"]."kgs";
              $mail->AddAddress('guillaume.ducatillon@isen.yncrea.fr', 'mot de passe');
              $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                  )
              );
              $mail->send();   
            }
            }
            catch (Exception $e) {
                 echo 'Exception reçue : ',  $e->getMessage(), "\n";
            } 
            


        }//balancer le n°id & type de flux

?>