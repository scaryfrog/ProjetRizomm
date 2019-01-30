<div class="row">
	<div class="box">
	  <div class="col-lg-12">
	  	 <hr>
	  	 <h2 class="intro-text text-center">
	  	 	<strong> Suppression d'une poubelle</strong>
	  	 </h2>
	  	 <hr>
	  	 <form role="form" method="post" action="?controller=poubelles&action=remove">
	  	 	<div class="row">
	  	 		<p> Etes vous sur de vouloir supprimer la poubelle ce batiment ?
	  	 		<?php echo $poubelle->getBatiment(); ?>
	  	 		</p>
	  	 		<div class="clearfix"> </div>
	  	 		<div class="form-group col-lg-12">
	  	 			<input type="hidden" name="id" value="<?php echo $poubelle->getId_poubelle(); ?>">
	  	 			<button type="submit" class="btn btn-danger"> Supprimer</button>
	  	 			<a class="btn btn-success" href="?controller=poubelles&action=index">Annuler</a>
	  	 		</div>
	  	 	</div>
	  	 </form>
	  </div>	
	</div>
</div>