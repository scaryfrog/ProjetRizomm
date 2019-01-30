<div class="row">
	<div class="box">
		<div class="col-lg-12"> <hr>
		  <h2 class="intro-text text-center">
		  	 <strong> Modification d'un flux</strong>
		  </h2> <hr>

		  <form role="form" method="post" action="?controller=flux&action=update_flu">
		  	 <div class="row">
		  	 	<div class="form-group col-sm-12">
		  	 	     <label> Type</label>
		  	 	     <input type="text" name="type" class="form-control" value="<?php echo $flux->getType(); ?>">	
		  	 	</div>

		  	 	<div class="form-group col-sm-12">
		  	 	     <label> Prix par kilo</label>
		  	 	     <input type="number", step="any" name="prix_kilo" class="form-control" value="<?php echo $flux->getPrix_kilo(); ?>">	
		  	 	</div>			  	 				  	 		  	 	

		  	 	<div class="clearfix"></div>
		  	 	<div class="form-group col-lg-12">
		  	 		<input type="hidden" name="id" value="<?php echo $flux->getId_flux(); ?>">
		  	 		<button type="submit" class="btn btn-default"> Modifier </button>
		  	 	</div>
		  	 </div>
		  </form>
		</div>
	</div>
</div>