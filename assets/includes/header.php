<?php
ob_start("ob_gzhandler");

$nom = "Planète-Toad.fr";
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
	  
	  
	  <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
	  <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
	  <script src="/assets/js/dropdown.js" type="text/javascript"></script>
	  
   </head>
   <body>
	   <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
		        <?php if ($titre == "Accueil") {echo '<li class="active"><a href="#">';} else {echo '<li><a href="/">';} ?><b class="fa fa-home" aria-hidden="true"></b> Accueil</a></li>
				<?php if ($titre == "Forum" or $titre == "Mini-tchat") {echo '<li class="active" class="dropdown">';} else {echo '<li class="dropdown">';} ?>
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b class="fa fa-users" aria-hidden="true"></b> Communauté <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <?php if ($titre == "Forum") {echo '<li class="disabled"><a href="#">';} else {echo '<li><a href="/forum/">';} ?><b class="fa fa-comment-alt" aria-hidden="true"></b> Forum</a></li>
						<?php if ($titre == "Mini-tchat") {echo '<li class="disabled"><a href="#">';} else {echo '<li><a href="/mini-tchat">';} ?><b class="fa fa-comments" aria-hidden="true"></b> Mini-tchat</a></li>
                      </ul>
                  </li>
				<?php if ($titre == "Gamebox" or $titre == "Jukebox") {echo '<li class="active" class="dropdown">';} else {echo '<li class="dropdown">';} ?>
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b class="fa fa-plus" aria-hidden="true"></b> Divers <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <?php if ($titre == "Gamebox") {echo '<li class="disabled"><a href="#">';} else {echo '<li><a href="/gamebox/">';} ?><b class="fa fa-gamepad" aria-hidden="true"></b> Gamebox</a></li>
						<?php if ($titre == "Mini-tchat") {echo '<li class="disabled"><a href="#">';} else {echo '<li><a href="/jukebox/">';} ?><b class="fa fa-music" aria-hidden="true"></b> Jukebox</a></li>
                      </ul>
                  </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">		        
                  <?php if ($titre == "Contact") {echo '<li class="active"><a href="#">';} else {echo '<li><a href="/connexion/">';} ?><b class="fa fa-lock" aria-hidden="true"></b> Connexion</a></li>
				  <?php if ($titre == "À propos") {echo '<li class="active"><a href="#">';} else {echo '<li><a href="/inscription/">';} ?><b class="fa fa-plus-square" aria-hidden="true"></b> Inscription</a></li>       
		      </ul>
		    </div>
		  </div>
		</nav>