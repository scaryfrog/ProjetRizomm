<div class="row">
	<div class="box">
		<div class="col-lg-12">
			<h2 class="intro-text text-center">
				<strong> Modifier de l'historique</strong>
			</h2>
			<hr>
			<form role="form" method="post" action="?controller=historiques&action=update">
				<div class="row">
					<div class="form-group col-sm-12">
						<label>Numéro de badge</label>
						<input type="text" name="numBadge" class="form-control" value="<?php echo $historique->getNumero_badge(); ?>">
					</div>

					<div class="form-group col-sm-12">
						<label>Poids collecté</label>
						<input type="text" name="Poids" class="form-control" value="<?php echo $historique->getPoids_fulx(); ?>">
					</div>	

					<div class="form-group col-sm-12">
						<label>Id poubelle</label>
						<select name="id_modele" id="modele"> 
						<?php foreach ($poubelle as $poubel) 
						  {
							?>
							<option value="<?php echo $poubel->getId_poubelle() ?>;" 
                              
                              <?php 
                               if($poubel->getId_poubelle()==$historique->getId_poubelle()) echo 'selected' ?>>
    
                               <?php echo $poubel->getBatiment(); ?>
							</option>
					    <?php		
						  }
						    ?>  
						</select>
					</div>

					<div clearfix>	</div>  
				 <div class="form-group col-lg-12">
				 	<input type="hidden" name="id" value="<?php echo $historique->getId_transaction(); ?>">
				 	<button><input type="submit" class="btn btn-default"> Modifier</button>
				 </div>															
				</div>
			</form>
		</div>
	</div>
</div>