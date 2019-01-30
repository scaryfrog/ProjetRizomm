<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />  
<title></title> 
<link rel="stylesheet" href="public/css/authentification.css">
</head>
<body>
 
    <form id="authform" class="taille-form" method="POST"  action="?controller=administrateurs&action=connexion">
      <h2><i class="fa fa-user-o" aria-hidden="true"></i>S'identifier</h2>
      <div class="taille-form">
        <label >Nom d'utilisateur</label>
        <input type="text" name="email" />
      </div>
      <div>
        <label >Mot de passe</label>
        <input type="password" name="password" />
      </div>
      <div>
        <input type="submit" value="S'identifier" name="goAuth" />
      </div>
         <center> <a href="?controller=administrateurs&action=passwordForgot">mot de passe oublié</a> </center>
    </form>
</body>
</html>