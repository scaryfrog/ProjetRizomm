<div class="row">
	<div class="box">
	   <div class="col-lg-12">
          <hr> <h2 class="intro-text text-center">
          	      <strong> Liste des des collecteurs</strong>
               </h2> <hr>  <br>
          <div class="row">
          	 <div class="col-sm-6">
          	 	<a class="pull-left btn btn-default"  href="?controller=utilisateurs&action=add"> Ajouter un nouvel utilisateur</a>
          	 </div> 
          </div> <br>


          <div class="table-responsive">
          	<table class="table table-striped"> 
	          	<thead>
	          	  <tr>
	          		<th>Numéro de badge</th> <th>Nom</th> <th>Prénom</th> <th>Niveau d'accès</th>
	          	  </tr>  
	          	</thead>
	        <tbody>
	          <?php foreach ($utilisateur as $users) 
	        	{
	        	 ?>
	        	  <tr>
	        	    <td> <?php echo $users->getNumero_badge(); ?></td>	
	        		<td> <?php echo $users->getNom(); ?></td>
	        		<td> <?php echo $users->getPrenom(); ?></td>
	        		<td> <?php echo $users->getAcces(); ?></td>
	        		<td>
	        		<a class="btn btn-primary" href="?controller=utilisateurs&action=edit&id=<?php echo $users->getId_utilisateur(); ?>"> Modifier</a>

	        		<a class="btn btn-danger" href="?controller=utilisateurs&action=delete&id=<?php echo $users->getId_utilisateur(); ?>"> Supprimer</a>
	        		</td>
	              </tr>
	          <?php    		
	        	}
	        	 ?> 
	        </tbody>  		
          	</table>
          </div>
	   </div>
	</div>
</div>

<div class="col-sm-6">
	<form action="?controller=utilisateurs&action=search" method="post">
		 <div class="input-group">
		 	 <input type="text" name="search" class="form-control" placeholder="Recherche par nom">
		 	 <span class="input-group-btn">
		 	 	<button type="submit" class="btn btn-default"> Rechercher</button>
		 	 </span>
		 </div>
	</form>
</div>    