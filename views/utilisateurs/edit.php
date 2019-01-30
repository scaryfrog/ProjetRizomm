<div class="row">
	<div class="box">
		<div class="col-lg-12"> <hr>
		  <h2 class="intro-text text-center">
		  	 <strong> Modification d'un collecteur</strong>
		  </h2> <hr>

		  <form role="form" method="post" action="?controller=utilisateurs&action=update">
		  	 <div class="row">
		  	 	<div class="form-group col-sm-12">
		  	 	     <label> Numéro de badge</label>
		  	 	     <input type="text" name="numBadge" class="form-control" value="<?php echo $utilisateur->getNumero_badge(); ?>">	
		  	 	</div>

		  	 	<div class="form-group col-sm-12">
		  	 	     <label> Nom</label>
		  	 	     <input type="text" name="nom" class="form-control" value="<?php echo $utilisateur->getNom(); ?>">	
		  	 	</div>	

		  	 	<div class="form-group col-sm-12">
		  	 	     <label> Prénom</label>
		  	 	     <input type="text" name="prenom" class="form-control" value="<?php echo $utilisateur->getPrenom(); ?>">	
		  	 	</div>	

		  	 	<div class="form-group col-sm-12">
                <label> Niveau d'accès : </label>
                <input type="radio" name="niveau" value="1"  <?php echo $utilisateur->getAcces() == 1  ? 'checked="checked"' : ''; ?> >  1 - Opérateur 
                <input type="radio" name="niveau" value="2" <?php echo $utilisateur->getAcces() == 2  ? 'checked="checked"' : ''; ?>>   2 - Administrateur

		  	 	</div>			  	 			  	 		  	 	

		  	 	<div class="clearfix"></div>
		  	 	<div class="form-group col-lg-12">
		  	 		<input type="hidden" name="id" value="<?php echo $utilisateur->getId_utilisateur(); ?>">
		  	 		<button type="submit" class="btn btn-default"> Modifier </button>
		  	 	</div>
		  	 </div>
		  </form>
		</div>
	</div>
</div>