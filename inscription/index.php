<?php
$titre = "Inscription";
$description = "Une sélection de mix de musiques de jeux-vidéo.";

include_once($_SERVER['DOCUMENT_ROOT']). '/assets/includes/header.php';
?>

<div class="container">
	<section class="global-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li>
						<a href="/"><?php echo "$nom" ?></a>
					</li>
					<li class="active"><strong><?php echo "$titre" ?></strong></li>
				</ol>
			</div>
		</div>
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2 col-md-offset-1 hidden-xs"><img src="/assets/img/avatars/default.png"></div>
					<div class="col-md-8">
						<b>Inscrivez-vous en quelques secondes et profitez d'un grand nombre d'avantages :</b><br>
						<ul>
							<li>Commentez les actualités.</li>
							<li>Accédez au forum de la communauté.</li>
							<li>Personnalisez votre profil.</li>
							<li>Communiquez avec d'autres membres via les messages privés ou le mini-tchat.</li>
							<li>Et découvrez des fonctionnalités exclusives comme un jukebox, une salle d'arcade, ...</li>
						</ul>
					</div>
				</div><br>
				<div class="center">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<form action='' class="form-horizontal" method="post">
								<fieldset>
									<div class="row">
										<div class="col-md-6">
											<div class="control-group">
												<label class="control-label" for="username">Pseudo</label>
												<div class="controls">
													<input class="input-xlarge" id="username" name="username" placeholder="" type="text">
													<p class="help-block">Le nom d'utilisateur peut contenir des lettres ou des chiffres, sans espaces.</p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="control-group">
												<label class="control-label" for="email">E-mail</label>
												<div class="controls">
													<input class="input-xlarge" id="email" name="email" placeholder="" type="text">
													<p class="help-block">Votre e-mail.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="control-group">
												<label class="control-label" for="password">Mot de passe</label>
												<div class="controls">
													<input class="input-xlarge" id="password" name="password" placeholder="" type="password">
													<p class="help-block">Le mot de passe doit comporter au moins 4 caractères.</p>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="control-group">
												<label class="control-label" for="password_confirm">Mot de passe (Confirmation)</label>
												<div class="controls">
													<input class="input-xlarge" id="password_confirm" name="password_confirm" placeholder="" type="password">
													<p class="help-block">Retapez votre mot de passe.</p>
												</div>
											</div>
										</div>
									</div><br>
									<div class="control-group">
										<label class="control-label" for="password_confirm">Cochez la case</label>
										<div class="controls">
											captcha à mettre en place ici
											<p class="help-block">Veuillez cochez la case.</p>
										</div>
									</div><br>
									<div class="control-group">
										<div class="controls">
											<button class="btn btn-primary">S'inscrire</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

	
<?php include($_SERVER['DOCUMENT_ROOT']). '/assets/includes/footer.php'; ?>

