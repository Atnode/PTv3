<?php
$titre = "Contact";
$description = "Contacter le webmestre de Planète Toad.";

include_once($_SERVER['DOCUMENT_ROOT']). '/assets/includes/header.php';
?>

<div class="container">
	<div class="form-group">
		<div class="alert alert-success" id="success_message" style="display:none;">
			<b aria-hidden="true" class="fa fa-thumbs-up"></b> Merci pour votre e-mail ! Il a correctement été envoyé à l’administrateur du site. Vous devriez recevoir une réponse prochainement.
		</div>
		<div class="alert alert-danger" id="error_message" style="display:none;">
			<b aria-hidden="true" class="fa fa-exclamation-triangle"></b> Hum, c'est embarrassant...
		</div>
	</div>
	<div>
		<form id="reused_form" method="post" name="reused_form" role="form">
			<div class="form-group">
				<label for="name">Nom :</label> <input class="form-control" id="name" maxlength="50" name="name" required="" type="text">
			</div>
			<div class="form-group">
				<label for="email">Email :</label> <input class="form-control" id="email" maxlength="50" name="email" required="" type="email">
			</div>
			<div class="form-group">
				<label for="name">Message :</label> 
				<textarea class="form-control" id="message" maxlength="6000" name="message" placeholder="Votre message..." rows="7"></textarea>
			</div>
			<div>
				<div class="col-sm-5">
					<br>
					<img id="captcha_image" src="captcha.php"> <button class="btn btn-primary" id="captcha_reload"><b aria-hidden="true" class="fa fa-sync-alt"></b> Recharger ?</button>
				</div>
				<div class="col-sm-5">
					<br>
					<label for="email">Entrez le code de l'image ici :</label> <input id="captcha" name="captcha" required="" type="text">
				</div>
				<div class="col-sm-13">
					<br>
					<button class="btn btn-primary pull-right" id="btnContactUs" type="submit"><b aria-hidden="true" class="fa fa-paper-plane"></b> Envoyer</button>
				</div>
			</div>
		</form>
	</div>
</div>

 <?php include($_SERVER['DOCUMENT_ROOT']). '/assets/includes/footer.php'; ?>