<div class="row">
	<div class="box">
	  <div class="col-lg-12">
	  	 <hr>
	  	 <h2 class="intro-text text-center">
	  	 	<strong> Suppression d'un type de flux</strong>
	  	 </h2>
	  	 <hr>
	  	 <form role="form" method="post" action="?controller=flux&action=remove">
	  	 	<div class="row">
	  	 		<p> Etes vous sur de vouloir supprimer le flux <strong><?php echo $flux->getType(); ?> </strong> ?
	  	 		
	  	 		</p>
	  	 		<div class="clearfix"> </div>
	  	 		<div class="form-group col-lg-12">
	  	 			<input type="hidden" name="id" value="<?php echo $flux->getId_flux(); ?>">
	  	 			<button type="submit" class="btn btn-danger"> Supprimer</button>
	  	 			<a class="btn btn-success" href="?controller=flux&action=index">Annuler</a>
	  	 		</div>
	  	 	</div>
	  	 </form>
	  </div>	
	</div>
</div>