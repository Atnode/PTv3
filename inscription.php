<?php
$titre = "Inscription";
$description = "Une sélection de mix de musiques de jeux-vidéo.";

include_once($_SERVER['DOCUMENT_ROOT']). '/assets/includes/header.php';

if (isset($_SESSION['id']))
{
	header("Location: /");
}

if (isset($_POST['inscrire']))
{
		$erreur = NULL;
		
		//On vérifie si le formulaire a été rempli
		if (empty($_POST['pseudo'] || $_POST['email'] || $_POST['password'] || $_POST['password_confirm']))
		{
			$champ_vide = "<p>Tu n'as pas rempli tous les champs</p>";
			$erreur++;
		}
		//Fin
		
		//On vérifie si le pseudo est déjà utilisé
		$query = $sql->prepare('SELECT * FROM forum_membres WHERE membre_pseudo = :pseudo');
		$query->execute(array(
			'pseudo' => $_POST['pseudo']
		));
		$pseudo = $query->fetch();
		
		if ($pseudo)
		{
			$pseudo_pris = "<p>Le pseudo est déjà pris</p>";
			$erreur++;
		}
		//Fin
		
		//On vérifie la longueur du pseudo
		if (strlen($_POST['pseudo']) > 25)
		{
			$pseudo_taille = "<p>Ton pseudo est trop grand</p>";
			$erreur++;
		}
		//Fin
		
		//On vérifie si l'adresse e-mail est valide (Regex 4 ever <3)
		if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
		{
			$email_erreur = "<p>L'adresse email n'est pas valide</p>";
			$erreur++;
		}
		//Fin
		
		//On vérifie si l'adresse e-mail est déjà utilisée
		$query = $sql->prepare('SELECT * FROM forum_membres WHERE membre_email = :email');
		$query->execute(array(
			'email' => $_POST['email']
		));
		$email = $query->fetch();
		
		if ($email)
		{
			$email_pris = "<p>L'email est déjà prise</p>";
			$erreur++;
		}
		//Fin
		
		//On vérifie si les mot de passe concordent
		if (crypt('sha512', md5($_POST['password'])) != crypt('sha512', md5($_POST['password_confirm'])))
		{
			$mdp_confirmation = "<p>Les mots de passe ne sont pas les mêmes</p>";
			$erreur++;
		}
		//Fin
		
		//On vérifie si le captcha a été coché
		//Fin
		
		//On vérifie si la case des CGU a été cochée
		if (!isset($_POST['cgu']))
		{
			$cgu_valide = "<p>Tu dois accepter les CGU</p>";
			$erreur++;
		}
		//Fin
		
		//Si nous n'avons aucune erreur, nous pouvons continuer à traiter
		if ($erreur == 0)
		{
			$query = $sql->prepare('INSERT INTO forum_membres(membre_pseudo, membre_mdp, membre_email, membre_avatar, membre_inscrit, membre_derniere_visite, membre_couleur, membre_rang) VALUES(:pseudo, :motdepasse, :email, :avatar, :inscrit, :derniere_visite, :couleur, :rang)');
			$query->execute(array(
				'pseudo' => htmlspecialchars($_POST['pseudo']),
				'motdepasse' => crypt('sha512', md5($_POST['password'])),
				'email' => htmlspecialchars($_POST['email']),
				'avatar' => "/assets/img/avatars/avatar.png",
				'inscrit' => time(),
				'derniere_visite' => time(),
				'couleur' => 'black',
				'rang' => 2
			));
			
			$_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['id'] = $sql->lastInsertId();
            $_SESSION['jeton'] = uniqid(rand(), true);
            $_SESSION['grade'] = 2;
			
			$valide = true;
		}
}

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
							<?php
							if (!isset($valide))
							{
							?>
							<form class="form-horizontal" method="post" action="inscription.php">
								<fieldset>
									<div class="row">
										<div class="col-md-6">
											<div class="control-group">
												<label class="control-label" for="pseudo">Pseudo</label>
												<div class="controls">
													<input class="input-xlarge" id="pseudo" name="pseudo" placeholder="" type="text">
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
												<label class="control-label" for="password_confirm">Mot de passe (confirmation)</label>
												<div class="controls">
													<input class="input-xlarge" id="password_confirm" name="password_confirm" placeholder="" type="password">
													<p class="help-block">Retapez votre mot de passe.</p>
												</div>
											</div>
										</div>
									</div><br>
									<div class="control-group">
										<label class="control-label" for="captcha_confirm">Cochez la case</label>
										<div class="controls">
											captcha à mettre en place ici
											<p class="help-block">Veuillez cocher la case.</p>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="checkbox">
												<label><input id="cgu" type="checkbox" name="cgu"> J'accepte les <a href="/cgu/">conditions générales d'utilisation</a>.</label>
											</div>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button class="btn btn-primary" type="submit" name="inscrire" id="inscrire">S'inscrire</button>
										</div>
									</div>
								</fieldset>
							</form>
							<?php
							}
							?>
						</div>
					</div><br>
					<?php
					if (isset($erreur) && $erreur != 0)
					{
					?>
					<div id="erreur_champ"><?php if (isset($champ_vide)) { echo $champ_vide; } ?></div>
					<div id="erreur_pseudo_pris"><?php if (isset($pseudo_pris)) { echo $pseudo_pris; } ?></div>
					<div id="erreur_pseudo_taille"><?php if (isset($pseudo_taille)) { echo $pseudo_taille; } ?></div>
					<div id="erreur_email"><?php if (isset($email_erreur)) { echo $email_erreur; } ?></div>
					<div id="erreur_email_pris"><?php if (isset($email_pris)) { echo $email_pris; } ?></div>
					<div id="erreur_mdp"><?php if (isset($mdp_confirmation)) { echo $mdp_confirmation; } ?></div>
					<div id="erreur_captcha"><?php if (isset($captcha_valide)) { echo $captcha_valide; } ?></div>
					<div id="erreur_cgu"><?php if (isset($cgu_valide)) { echo $cgu_valide; } ?></div>
					<?php
					}
					if (isset($valide) && $valide)
					{
						echo '<p>Bienvenue sur Planète Toad ' . $_POST['pseudo'] . '</p>';
					}
					?>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
include($_SERVER['DOCUMENT_ROOT']). '/assets/includes/footer.php'; ?>

