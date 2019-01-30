<script type="text/javascript" src="public/js/charts_loader.js"></script>



<script type="text/javascript" src="public/js/bootstrap-select.js" ></script>
<script type="text/javascript" src="public/js/charts_byBat.js"></script>

<div class="row">
	<div class="box">
	   <div class="col">
          <hr> <h2 class="intro-text text-center">
          	      <strong> Historique des flux par batiment</strong>
               </h2> <hr>  <br>



					
	        
         
	   </div>
	</div>
</div>
<div class="container">
	<div class="row">
          	<div class="box">
      			 <div class="col-lg-3"> 
      			   <div class="row">
      				<div class="input-group-addon" style=""> Selection de la plage des données </div>
      				<div class="input-group input-daterange">
					    <input type="date" class="form-control" id="date_start">
					    <div class="input-group-addon"> au </div>
					    <input type="date" class="form-control" id="date_end">
					</div>
				</div>
				</div>	    
          		<div class="col-lg-3">
						<div class="input-group-addon"> Regroupement des données  </div>
						<select class="form-control" value="day "id="time_group_select" onchange="time_group_change()">
      						<option value='day' selected="selected">Par jour</option>
      						<option value='week'>Par semaine</option>
      						<option value='month'>Par mois</option>
      						<option value='year'>Par année</option>
     					</select>
				</div>
        <div class="col-lg-3">
            <div class="input-group-addon">Selection des flux à analyser</div>
            <select  class="selectpicker" multiple title="Sélectionnez les flux à analyser..." data-size="5" data-actions-box="true" id="selector_flux">               
            </select>
            
          </div>

          <div class="col-lg-3">
          <div class="input-group-addon">Inclure les relevés automatiques</div>
          
                  <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="include_auto">
                      <label class="onoffswitch-label" for="include_auto">
                          <span class="onoffswitch-inner"></span>
                          <span class="onoffswitch-switch"></span>
                      </label>
                  </div>
          </div>
        </div>
      </div>
          <br>
        <div class="box">
          	<div class="row">
          		<div class="col-lg-6" id="ramassages">
          			<h2> <span id="nb_ramassages"></span></h2>
          			<h4>ramassages effectués</h4>
          		</div>
          		<div class="col-lg-6" >
          			<div id="charts_repart"></div>
          		</div>
          	
        	</div>
      	</div>
          <div id="charts">

      	</div>
    </div>
  </div>
<br>