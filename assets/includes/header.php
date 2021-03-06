<?php
session_start();
ob_start("ob_gzhandler");

require_once($_SERVER['DOCUMENT_ROOT']). '/assets/includes/config.php';

try
	{
        $sql = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpass);
	}
catch (Exception $e)
	{
        die('Erreur: ' . $e->getMessage());
	}

$nom = "Planète Toad";
?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8" />
	  <title><?php echo "$titre • $nom";?></title>
	  <link rel="shortcut icon" href="/assets/img/logopt.png">
	  <meta name="description" content="<?php echo $description; ?>" />
	  <meta property="og:title" content="<?php echo "$titre • $nom"; ?>" />
	  <meta property="og:description" content="<?php echo $description; ?>" />
	  <meta property="og:image" content="/assets/img/logopt.png" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
	  	  
      <link href="/assets/css/style.css" rel="stylesheet">	  
	  
	  
	  <script src="/assets/js/jquery.min.js"></script>
	  <script src="/assets/js/bootstrap.min.js"></script>
	  <script src="/assets/js/explode.js"></script>
	  <?php if ($titre == "Jukebox") {echo '<link href="/divers/jukebox/css/style.css" rel="stylesheet">';}?>
	  <?php if ($titre == "Jukebox") {echo '<link href="/divers/jukebox/css/plyr.css" rel="stylesheet">';}?>
	  <?php if ($titre == "Salle d'arcade") {echo '<link href="/divers/arcade/css/style.css" rel="stylesheet">';}?>
	  
   </head>
   <body>
  <?php if (isset($_SESSION['id']))
{
echo '<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-brand-centered">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
               <a class="navbar-brand navbar-brand-centered" href="#"><img src="/assets/img/logopt.png" alt="Logo"></img></a>
		    </div>
		    <div class="collapse navbar-collapse" id="navbar-brand-centered">
		      <ul class="nav navbar-nav">
			 '.(($titre == "Accueil")?'<li class="active"><a href="#">':'<li><a href="/">').'<b class="fa fa-home" aria-hidden="true"></b> Accueil</a></li>
			 '.(($titre == "Forum" or $titre == "Mini-tchat")?'<li class="active" class="dropdown">':'<li class="dropdown">').'
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b class="fa fa-users" aria-hidden="true"></b> Communauté <span class="caret"></span></a>
			 <ul class="dropdown-menu">
			 '.(($titre == "Forum")?'<li class="disabled"><a href="#">':'<li><a href="/forum/">').'<b class="fa fa-comment-alt" aria-hidden="true"></b> Forum</a></li>
			 '.(($titre == "Mini-tchat")?'<li class="disabled"><a href="#">':'<li><a href="/mini-tchat">').'<b class="fa fa-comments" aria-hidden="true"></b> Mini-tchat</a></li>
			 </ul>
			 </li>
			 '.(($titre == "Salle d'arcade" or $titre == "Jukebox")?'<li class="active" class="dropdown">':'<li class="dropdown">').'
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b class="fa fa-plus" aria-hidden="true"></b> Divers <span class="caret"></span></a>
			 <ul class="dropdown-menu">
			 '.(($titre == "Salle d'arcade")?'<li class="disabled"><a href="#">':'<li><a href="/divers/arcade/">').'<b class="fa fa-gamepad" aria-hidden="true"></b> Salle d\'arcade</a></li>
			 '.(($titre == "Jukebox")?'<li class="disabled"><a href="#">':'<li><a href="/divers/jukebox/">').'<b class="fa fa-music" aria-hidden="true"></b> Jukebox</a></li>
			 </ul>
			 </li>
			 </ul>
			 
			 <ul class="nav navbar-nav navbar-right">
			 '.(($titre == "Messagerie")?'<li class="active" class="dropdown">':'<li class="dropdown">').'
			 <li class="dropdown">
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b class="fa fa-envelope" aria-hidden="true"></b> <span class="badge">0</span> <span class="caret"></span></a>
			<ul id="login" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								<div class="center"><p>Conversations récentes</p></div>
									<div class="row">
										<div class="col-lg-3">
											<img src="/assets/img/avatars/default.png" title="Toad" alt="Toad" style="width:50px;float:left;">
										</div>
										<div class="col-lg-9"><img src="/assets/img/online.png" title="Hors ligne" alt="Hors ligne" width="10px;" height="10px">&nbsp;&nbsp;<span style="font-weight: bold ; color:#000;">Toad</span> (nbr msg attente)</div>
								</div>
								<span class="divider"></span>
								<div class="row">
									<div class="col-lg-3">
										<img src="/assets/img/avatars/default.png" title="Toad" alt="Toad" style="width:50px;float:left;">
									</div>
									<div class="col-lg-9"><img src="/assets/img/online.png" title="Hors ligne" alt="Hors ligne" width="10px;" height="10px">&nbsp;&nbsp;<span style="font-weight: bold ; color:#000;">Toad</span> (nbr msg attente)</div>
								</div>
							</div>
					 </div>
				</li>
			</ul>
        </li>
			 '.(($titre == "Notifications")?'<li class="disabled"><a href="#">':'<li><a href="/notifications/">').'<b class="fa fa-bell" aria-hidden="true"></b> <span class="badge">0</span></a></li>
			 '.(($titre == "Paramètres")?'<li class="active" class="dropdown">':'<li class="dropdown">').'
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">[AVATAR] Bienvenue [PSEUDO] <span class="caret"></span></a>
			 <ul class="dropdown-menu">
			 '.(($titre == "Mon profil")?'<li class="disabled"><a href="#">':'<li><a href="/monprofil/">').'<b class="fa fa-user" aria-hidden="true"></b> Voir mon profil</a></li>
			 '.(($titre == "Liste d'amis")?'<li class="disabled"><a href="#">':'<li><a href="/amis/">').'<b class="fa fa-heart" aria-hidden="true"></b> Gérer ma liste d’amis</a></li>
			 '.(($titre == "Paramères de mon compte")?'<li class="disabled"><a href="#">':'<li><a href="/parametres/">').'<b class="fa fa-cog" aria-hidden="true"></b> Modifier mon compte</a></li>
			 '.(($titre == "Déconnexion")?'<li class="disabled"><a href="#">':'<li><a href="/deconnexion/">').'<b class="fa fa-sign-out-alt" aria-hidden="true"></b> Déconnexion</a></li>
			 </ul>
			 </li>
		      </ul>
		    </div>
		  </div>
		</nav>'
;}
else
{
echo '<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-brand-centered">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
               <a class="navbar-brand navbar-brand-centered" href="#"><img src="/assets/img/logopt.png" alt="Logo"></img></a>
		    </div>
		    <div class="collapse navbar-collapse" id="navbar-brand-centered">
		      <ul class="nav navbar-nav">
			 '.(($titre == "Accueil")?'<li class="active"><a href="#">':'<li><a href="/">').'<b class="fa fa-home" aria-hidden="true"></b> Accueil</a></li>
			 '.(($titre == "Forum" or $titre == "Mini-tchat")?'<li class="active" class="dropdown">':'<li class="dropdown">').'
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b class="fa fa-users" aria-hidden="true"></b> Communauté <span class="caret"></span></a>
			 <ul class="dropdown-menu">
			 '.(($titre == "Forum")?'<li class="disabled"><a href="#">':'<li><a href="/forum/">').'<b class="fa fa-comment-alt" aria-hidden="true"></b> Forum</a></li>
			 '.(($titre == "Mini-tchat")?'<li class="disabled"><a href="#">':'<li><a href="/mini-tchat">').'<b class="fa fa-comments" aria-hidden="true"></b> Mini-tchat</a></li>
			 </ul>
			 </li>
			 '.(($titre == "Salle d'arcade" or $titre == "Jukebox")?'<li class="active" class="dropdown">':'<li class="dropdown">').'
			 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b class="fa fa-plus" aria-hidden="true"></b> Divers <span class="caret"></span></a>
			 <ul class="dropdown-menu">
			 '.(($titre == "Salle d'arcade")?'<li class="disabled"><a href="#">':'<li><a href="/divers/arcade/">').'<b class="fa fa-gamepad" aria-hidden="true"></b> Salle d\'arcade</a></li>
			 '.(($titre == "Jukebox")?'<li class="disabled"><a href="#">':'<li><a href="/divers/jukebox/">').'<b class="fa fa-music" aria-hidden="true"></b> Jukebox</a></li>
			 </ul>
			 </li>
			 </ul>
			 <ul class="nav navbar-nav navbar-right">
			 '.(($titre == "Inscription")?'<li class="active"><a href="#">':'<li><a href="/inscription/">').'<b class="fa fa-plus-square" aria-hidden="true"></b> Inscription</a></li>
			  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="fa fa-lock" aria-hidden="true"></b> Connexion <span class="caret"></span></a>
			<ul id="login" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="pseudo">Pseudo</label>
											 <input class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="password">Mot de passe</label>
											 <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                                             <div class="help-block text-right"><a href="">Mot de passe oublié ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" id="connexion" name="connexion" class="btn btn-primary btn-block">Connexion</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox"> Se souvenir de moi ?
											 </label>
										</div>
										<div id="resultat"></div>
								 </form>
							</div>
					 </div>
				</li>
			</ul>
        </li>
		      </ul>
		    </div>
		  </div>
		</nav>';} ?>
	  
			<script>
				$(document).ready(function() {
					
						$("#connexion").click(function(e){
							e.preventDefault()
							
							$.post(
								'connexion.php',
								{
									pseudo : $("#pseudo").val(),
									password : $("#password").val()
								},
								
								function(data) {
									if (data == 'true')
									{
										$("#resultat").html("<p>Connecté avec succès</p>")
									}
									else
									{
										$("#resultat").html("<p>Erreur lors de la connexion</p>")
									}
								},
								
								'text'
								
							)
						})
					})
			</script>
	
			
<div class="container">
	<div class="jumbotron">
	
<?php if ($titre != "Accueil") {echo '<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<a href="/">'. $nom .'</a>
			</li>
			<li class="active"><strong>'. $titre .'</strong></li>
		</ol>
	</div>
</div>';}?>