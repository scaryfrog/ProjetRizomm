<div class="row">
	<div class="box">
	  <div class="col-lg-12">
	  	 <hr>
	  	 <h2 class="intro-text text-center">
	  	 	<strong> Suppression d'un collecteur</strong>
	  	 </h2>
	  	 <hr>
	  	 <form role="form" method="post" action="?controller=utilisateurs&action=remove">
	  	 	<div class="row">
	  	 		<p> Etes vous sur de vouloir supprimer le collecteur M.<?php echo $utilisateur->getNom(); ?> ?	  	 		
	  	 		</p>
	  	 		<div class="clearfix"> </div>
	  	 		<div class="form-group col-lg-12">
	  	 			<input type="hidden" name="id" value="<?php echo $utilisateur->getId_utilisateur(); ?>">
	  	 			<button type="submit" class="btn btn-danger"> Supprimer</button>
	  	 			<a class="btn btn-success" href="?controller=utilisateurs&action=index">Annuler</a>
	  	 		</div>
	  	 	</div>
	  	 </form>
	  </div>	
	</div>
</div>