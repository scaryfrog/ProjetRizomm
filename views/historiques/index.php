<div  class="row">
  <div class="box">
  	 <div class="col-lg-12">
  	 	<hr>
  	 	<h2 class="intro-text text-center">
  	 		<strong> Liste des historiques</strong>
  	 	</h2>
  	 	<hr>
  	 	<br>
  	 	   <!-- <div class="row">
          <div class="col-sm-6">
          <a class="pull-left btn btn-default" href="?controller=historiques&action=add"> Créer un nouveau historique</a> 
            <form action="?controller=historiques&action=searchf" method="post">
              <div class="input-group">
                <input type="text" name="searchf" class="form-control" placeholder="Recherche par flux">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">Rechercher</button>
                  </span>
              </div>
            </form>
             <form action="?controller=historiques&action=searchb" method="post">
              <div class="input-group">
                <input type="text" name="searchb" class="form-control" placeholder="Recherche par Batiment">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">Rechercher</button>
                  </span>
              </div>
            </form>
          </div>
  	 	  </div>-->
  	 	<br>
  	 	<div class="table-responsive">
  	 		<table class="table table-striped">
  	 		   <thead>
  	 		   	   <tr>
  	 		   	   	  <th>Numéro de badge</th>
  	 		   	   	  <th>Id poubelle</th>
  	 		   	   	  <th>Type de flux</th>
                  <th>Poids collecté</th>                 
  	 		   	   </tr>
  	 		   </thead>

  	 		   <tbody>
  	 		   	<?php  foreach ($historique as $hist)  
  	 		   	 {
  	 		   	?> 	<tr>
  	 		   	 		<td><?php echo $hist->getNumero_badge(); ?></td>
  	 		   	 		<td><?php echo $hist->getId_poubelle(); ?></td>
                <td><?php echo $hist->getType_flux(); ?></td>
                <td><?php echo $hist->getPoids_flux(); ?> kg</td>
  	 		   	 		<td>
                  <a class="btn btn-danger" href=" ?controller=historiques&action=delete&id=<?php echo $hist->getId_transaction(); ?>"> Supprimer
                  </a>
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

<div class="row">
	<div class="col-sm-6">
	</div> 
</div>