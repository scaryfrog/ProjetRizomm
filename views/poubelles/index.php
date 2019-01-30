<div class="row">
	<div class="box">
	   <div class="col-lg-12">
          <hr> <h2 class="intro-text text-center">
          	      <strong> Liste des des poubelles</strong>
               </h2> <hr>  <br>
          <div class="row">
<!-- Plus utilisé (ajout poubelle manuel)   	 
			<div class="col-sm-6">
          	 	<a class="pull-left btn btn-default"  href="?controller=poubelles&action=add"> Créer une nouvelle poubelle</a>
          	 </div> -->
		<div class="col-sm-4">
			<form action="?controller=poubelles&action=search" method="post">
				 <div class="input-group">
				 	<select name="search" class="form-control" >	
		  	 	     	<?php 
						$db = Db::getInstance();
					      $req= $db->prepare("SELECT * FROM batiments");
					      $req->execute();
					      foreach ($req->fetchAll() as $temp) 
					        {
					        		echo'<option value="'.utf8_encode($temp['nom']).'">'.utf8_encode($temp['nom']).'</option>';

					        }
					    ?>
		  	 	     </select>
		  	 	      <span class="input-group-btn">

				 	 	<button type="submit" class="btn btn-default"> Rechercher</button>
				 	 
				 	 </span>
				 </div>
			</form>
		</div> 
		<div class="col-sm-3">
			<form action="?controller=poubelles&action=searchFlux" method="post">
				 <div class="input-group">
				 	    <select name="flux" class="form-control">
		                  <?php 
		                  foreach ($uniqueflux as $flux)
		                      {
		                          echo'<option value="'.$flux.'"">'.$flux.' </option>';

		                       }
		                    ?>
		                </select>
				 	 <span class="input-group-btn">
				 	 	<?php 
				 	 		if(count($uniqueflux) > 1)
				 	 		{
				 	 			echo'<button type="submit" class="btn btn-default"> Rechercher</button>';
				 	 		}
				 	 	?>
				 	 	
				 	 </span>
				 </div>
			</form>
		</div>
		<div class="col-sm-2">
			<form action="?controller=poubelles&action=index" method="post">
				 <div class="input-group">
				 	 <span class="input-group-btn">
				 	 	<button type="submit" class="btn btn-default"> Réinitialiser les filtres</button>
				 	 </span>
				 </div>
			</form>
		</div>  
	</div>
<br>


          <div class="table-responsive">
          	<table class="table table-striped"> 
	          	<thead>
	          		<tr>
	          		 <th> Batiment </th> <th>Ilot</th> <th>Type de flux</th><th> ID Poubelle</th><th>Seuil</th>
	          		</tr>  
	          	</thead>
	        <tbody>
	          <?php foreach ($poubelle as $poubel) 
	        	{
	        	 ?>
	        	  <tr>	
	        	    <td> <?php echo $poubel->getBatiment(); ?></td>
	        		<td> <?php echo $poubel->getIlot(); ?></td>
	        		<td> <?php echo $poubel->getType_flux(); ?></td>
	        		<td> <?php echo $poubel->getId_poubelle(); ?></td>
	        		<td> <?php echo $poubel->getSeuil(); ?></td>
	        		<td>
	        		<a class="btn btn-primary" href="?controller=poubelles&action=edit&id=<?php echo $poubel->getId_poubelle(); ?>"> Modifier</a>

	        		<a class="btn btn-danger" href="?controller=poubelles&action=delete&id=<?php echo $poubel->getId_poubelle(); ?>"> Supprimer</a>
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

   