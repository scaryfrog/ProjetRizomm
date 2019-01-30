<div class="row">
     <div class="box">
        <div class="col-lg-12">
          <hr>
          <h2 class="intro-text text-center"> 
               <strong> Ajout d'une Poubelle</strong>
          </h2>
          
          <hr>

          <form role="form" method="post" action="?controller=poubelles&action=save" >
            <div class="row">
              <div class="form-group col-sm-12">
                <label> Batiment</label>
                <input type="text" name="batiment" class="form-control"> 
              </div>

              <div class="form-group col-sm-12">
                <label> Ilot</label>
                <input type="text" name="ilot" class="form-control"> 
              </div>

              <div class="form-group col-sm-12">
                <label> Type de flux</label>
                <select name="flux" class="form-control">
                  <?php 
                  foreach ($uniqueflux as $flux)
                      {
                          echo('<option value="'.$flux.'"">'.$flux.' </option>');

                       } ?>
                </select> 
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