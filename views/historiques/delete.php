<div class="row">
	<div class="box">
		<div class="col-lg-12">
			<hr>
			<h2 class="intro-text text-center">
				<strong> Supprimer un historique</strong>
			</h2>
			<hr>
			<form role="form" method="post" action="?controller=historiques&action=remove">
				<div class="row">
					<p>
						Etes vous sur de vouloir supprimer cet historique ? <?php echo $historique->getNumero_badge(); ?>
					</p>
					<div class="clearfix"> </div>
					<div class="form-group col-lg-12">
						<input type="hidden" name="id" value="<?php echo $historique->getId_transaction(); ?>">
						<button type="submit" class="btn btn-danger"> Supprimer</button>
						<a class="btn btn-success" href="?controller=historiques&action=index">Annuler</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>