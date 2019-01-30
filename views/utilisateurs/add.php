<div class="row">
     <div class="box">
        <div class="col-lg-12">
          <hr>
          <h2 class="intro-text text-center"> 
               <strong> Ajout d'un collecteur</strong>
          </h2>
          
          <hr>

          <form role="form" method="post" action="?controller=utilisateurs&action=save" >
            <div class="row">
              <div class="form-group col-sm-12">
                <label> Numéro de badge</label>
                <input type="text" name="numBadge" class="form-control" maxlength="10"> 
              </div>

              <div class="form-group col-sm-12">
                <label> Nom</label>
                <input type="text" name="nom" class="form-control"> 
              </div>

               <div class="form-group col-sm-12">
                <label> Prénom</label>
                <input type="text" name="prenom" class="form-control"> 
              </div>

              <div class="form-group col-sm-12">
                <label> Niveau d'accès : </label>
                <input type="radio" name="niveau" value="1" checked>  1 - Opérateur 
                <input type="radio" name="niveau" value="2">   2 - Administrateur

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