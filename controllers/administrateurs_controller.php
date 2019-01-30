<?php
 require_once('models/administrateur.php');
class AdministrateursController 
{

public function index()
  {
     require_once('views/layout.php');
  }

public function accueil()
  {
    require_once('views/administrateurs/accueil.php');
  }

public function conn()
  {
  require_once('views/administrateurs/authentification.php');
  }  

public function connexion() 
  {
    if (isset($_POST["goAuth"]))
    {
          $reponse = Administrateurs::login($_POST['email'],$_POST['password']);
          $rep = $reponse->fetch();
          if( $rep != false)
          {
            $_SESSION['id']=$rep['user_id'];
            echo "<script>window.location.href='?controller=administrateurs&action=accueil';</script>";
          }
          else
          {
            echo "<h3> échec de connexion </h3>";
          }

    }
  }

public function passwordForgot()
  {
   require_once('views/administrateurs/confirmEmail.php'); 
  }


public function passgen() 
  {
    $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
    srand((double)microtime()*1000000);
    for($i=0; $i<8; $i++){
        @$pass .= $chaine[rand()%strlen($chaine)];
        }
    return $pass;
    }  


public function generator()  
{
  if(isset($_POST['valider']))
    {
      $password = AdministrateursController::passgen();
      $reponse= Administrateurs::FindByEmail($_POST['email']);
      $rep = $reponse->fetch();
      if($rep == false)
      {
        echo "<h3> Désolé, ce mail n'existe pas dans notre base de données! </h3>";
        return;
      }
      else
      {
        $new_pass = passgen();
        generermotPass($_POST['email'],$new_pass);
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
        $mail->setFrom('bricenicodem.simeupouomegne@esprit.tn', 'Rizomm balances connctées 2018 ');
        $mail->Subject = "mot de passe oublie";
        $mail->Body='Votre nouveau mot de passe est le suivant: '.  $new_pass;
        $mail->AddAddress($_POST['email'], 'mot de passe');
        $mail->SMTPOptions = array(
          'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
            )
        );
        if (!$mail->send()) { 
                }  
        else {
          echo "An email has been sent to you at this address : ".$_POST['email'];
          echo' <div class="login" id="login"> <a title="Login" href="?controller=administrateurs&action=conn"><span  class="hidden-xs"><h3>return to the login page</h3></span></a></div>'; 
        }
      }
          
  
  }
}

   
public function log_out()
  {
   session_destroy();
    echo "<script>window.location.href='/flux_manager?controller=administrateurs&action=conn';</script>";
  } 
  } 


     function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
?>