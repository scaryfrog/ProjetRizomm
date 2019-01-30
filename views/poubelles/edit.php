<div class="row">
	<div class="box">
		<div class="col-lg-12"> <hr>
		  <h2 class="intro-text text-center">
		  	 <strong> Modification d'une poubelle</strong>
		  </h2> <hr>

		  <form role="form" method="post" action="?controller=poubelles&action=update">
		  	 <div class="row">
		  	 	<div class="form-group col-sm-12">
		  	 	     <label> Batiment</label>
		  	 	     <select name="batiment" class="form-control" >	
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
		  	 	</div>

		  	 	<div class="form-group col-sm-12">
		  	 	     <label> Ilot</label>
		  	 	     <input type="text" name="ilot" class="form-control" value="<?php echo $poubelle->getIlot(); ?>">	
		  	 	</div>	

		  	 	<div class="form-group col-sm-12">
		  	 	     <label> Type de flux</label>
		  	 	     <select  name="flux" class="form-control">
		  	 	     <?php 
						$db = Db::getInstance();
					    $req= $db->prepare("SELECT * FROM flux");
					    $req->execute();
					    foreach ($req->fetchAll() as $temp) 
					        {
					        	echo'<option value="'.$temp['type'].'">'.$temp['type'].'</option>';

					        }
					?>
					</select>	
		  	 	</div>
		  	 	<div class="form-group col-sm-12">
		  	 	     <label> Seuil de la poubelle</label>
		  	 	     <input type="number" name="seuil" class="form-control" value="<?php echo $poubelle->getSeuil(); ?>">	
		  	 	</div>			  	 				  				  	 		  	 	

		  	 	<div class="clearfix"></div>
		  	 	<div class="form-group col-lg-12">
		  	 		<input type="hidden" name="id" value="<?php echo $poubelle->getId_poubelle(); ?>">
		  	 		<button type="submit" class="btn btn-default"> Modifier </button>
		  	 	</div>
		  	 </div>
		  </form>
		</div>
	</div>
</div>