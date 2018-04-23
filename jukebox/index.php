<?php
$titre = "Jukebox";
$description = "Une sélection de mix de musiques de jeux-vidéo.";

include_once($_SERVER['DOCUMENT_ROOT']). '/assets/includes/header.php';
?>

<div class="container">
<section class="global-wrapper">

	
  <div class="column add-bottom">
		<div id="mainwrap">
			<div id="nowPlay">
				<span class="left" id="npAction">En pause...</span>
				<span class="right" id="npTitle"></span>
			</div>
			<div id="audiowrap">
				<div id="audio0">
					<audio preload id="audio1" controls="controls">Hum, c'est embarrassant. Votre navigateur ne supporte pas l'audio via le HTML5.</audio>
				</div>
			</div>
			<div id="plwrap">
				<div id="plList"></div>
			</div>
		</div>
			</br>
			<p class="center">Musiques composées par <a href="https://www.youtube.com/user/faloux">Faloux/DeepInfinity</a>.</p>
    </div>

	
<?php include($_SERVER['DOCUMENT_ROOT']). '/assets/includes/footer.php'; ?>

