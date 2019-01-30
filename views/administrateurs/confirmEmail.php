<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title></title> 
<link rel="stylesheet" href="public/css/authentification.css">
</head>
<body>
 <div class="box">
    <form id="authform" method="POST"  action="?controller=administrateurs&action=generator">
      <h2><i class="fa fa-user-o" aria-hidden="true"></i>Entrez votre email</h2>
      <div>
        <input type="text" name="email" required="" />
      </div>
      <div>
        <input type="submit" value="Validate" name="valider" />
      </div>
    </form>
</div>
</body>
</html>