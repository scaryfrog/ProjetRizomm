<div class="row">
	<div class="box">
	   <div class="col-lg-12">
	   	 <hr>
	   	 <h2 class="intro-text text-center">
	   	 	<strong>Ajout d'un historique</strong>
	   	 </h2>
	   	 <hr>

	   	 <form role="form" method="post" action="?controller=historiques&action=save">
	   	 	<div class="row">
	   	 		<div class="form-group col-sm-12">
	   	 			<label>Numéro de badge</label>
	   	 			<input type="text" name="numeroBadge" class="form-control">
	   	 		</div>

	   	 		<div class="form-group col-sm-12">
	   	 			<label>Id de la poubelle</label>
	   	 			<input type="number" name="idPoubelle" class="form-control">
	   	 		</div>

	   	 		<div class="form-group col-sm-12">
	   	 			<label>Type de flux</label>
	   	 			<input type="text" name="flux" class="form-control">
	   	 		</div>	

	   	 		<div class="form-group col-sm-12">
	   	 			<label>Poids du flux</label>
	   	 			<input type="text" name="poids" class="form-control">
	   	 		</div>


	   	 		 <div class="clearfix"> </div>	
	   	 		 <div class="form-group col-lg-12">
	   	 		 	<button type="submit" class="btn btn-default"> Enregistrer</button>
	   	 		 </div>    	 			   	 		   	 		
	   	 	</div>
	   	 </form>   
	   </div>	
	</div>
</div>