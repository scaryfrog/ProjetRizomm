<div class="row">
	<div class="box">
	   <div class="col-lg-12">
          <hr> <h2 class="intro-text text-center">
          	      <strong> Liste des flux</strong>
               </h2> <hr>  <br>
          <div class="row">
          	 <div class="col-sm-6">
          	 	<a class="pull-left btn btn-default"  href="?controller=flux&action=add_flux"> Créer un nouveau flux</a>
          	 </div> 
          </div> <br>


          <div class="table-responsive">
          	<table class="table table-striped"> 
	          	<thead>
	          		<tr>
	          		 <th> Type </th> <th>prix par kilo</th> 
	          		</tr>  
	          	</thead>
	        <tbody>
	          <?php foreach ($flux as $flu)    
	        	{
	        	 ?>
	        	  <tr>	
	        	    <td> <?php echo $flu->getType(); ?></td>
	        		<td> <?php echo $flu->getPrix_kilo(); ?></td>
	        		<td>
	        		<a class="btn btn-primary" href="?controller=flux&action=edit_flux&id=<?php echo $flu->getId_flux(); ?>"> Modifier</a>

	        		<a class="btn btn-danger" href="?controller=flux&action=delete&id=<?php echo $flu->getId_flux(); ?>"> Supprimer</a>
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