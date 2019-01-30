<div class="row">
     <div class="box">
        <div class="col-lg-12">
          <hr>
          <h2 class="intro-text text-center"> 
               <strong> Ajout d'un nouveu type de flux</strong>
          </h2>
          
          <hr>

          <form role="form" method="post" action="?controller=flux&action=save_flux" >
            <div class="row">
              <div class="form-group col-sm-12">
                <label> Type</label>
                <input type="text" name="type" class="form-control"> 
              </div>

              <div class="form-group col-sm-12">
                <label> Prix par kilo</label>
                <input type="number" name="prix_kilo" step="any" class="form-control"> 
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