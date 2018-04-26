<?php
$titre = "Accueil";
$description = "PT é mor";

include_once($_SERVER['DOCUMENT_ROOT']). '/assets/includes/header.php';
?>

<div class="row">
	<div class="carousel slide" data-ride="carousel" id="carousel-example-generic">
		<ol class="carousel-indicators">
			<li class="active" data-slide-to="0" data-target="#carousel-example-generic"></li>
			<li data-slide-to="1" data-target="#carousel-example-generic"></li>
			<li data-slide-to="2" data-target="#carousel-example-generic"></li>
		</ol>
		<div class="container">
			<div class="carousel-inner">
				<div class="item active">
					<img alt="First slide" src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg">
					<div class="header-text">
						<div class="col-md-12 text-center">
							<h2><span class="hidden-xs">Nom</span></h2><br>
							<h3><span>Courte description</span></h3><br>
							<div class="">
								<a class="btn btn-primary hidden-xs" href="#">Lire l'article</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<img alt="First slide" src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg">
					<div class="header-text">
						<div class="col-md-12 text-center">
							<h2><span class="hidden-xs">Nom</span></h2><br>
							<h3><span>Courte description</span></h3><br>
							<div class="">
								<a class="btn btn-primary hidden-xs" href="#">Lire l'article</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<img alt="First slide" src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg">
					<div class="header-text">
						<div class="col-md-12 text-center">
							<h2><span class="hidden-xs">Nom</span></h2><br>
							<h3><span>Courte description</span></h3><br>
							<div class="hidden-xs">
								<a class="btn btn-primary hidden-xs" href="#">Lire l'article</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT']). '/assets/includes/footer.php'; ?>