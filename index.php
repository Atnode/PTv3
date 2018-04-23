<?php
$titre = "Accueil";
$description = "PT é mor";

include_once($_SERVER['DOCUMENT_ROOT']). '/assets/includes/header.php';
?>

<div class="content">
<div class="container">
<section class="global-wrapper">
	<div class="row">
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<div class="container">
			<div class="carousel-inner">
			    <div class="item active">
			    	<img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="First slide">
                    <div class="header-text">
                        <div class="col-md-12 text-center">
                            <h2>
                            	<span class="hidden-xs">Nom</span>
                            </h2>
                            <br>
                            <h3>
                            	<span>Courte description</span>
                            </h3>
                            <br>
                            <div class="">
                                <a class="btn btn-primary hidden-xs" href="#">Lire l'article</a></div>
                        </div>
                    </div>
			    </div>
			    <div class="item">
			    	<img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="First slide">
                    <div class="header-text">
                        <div class="col-md-12 text-center">
                            <h2>
                            	<span class="hidden-xs">Nom</span>
                            </h2>
                            <br>
                            <h3>
                            	<span>Courte description</span>
                            </h3>
                            <br>
                            <div class="">
                                <a class="btn btn-primary hidden-xs" href="#">Lire l'article</a></div>
								</div>
                    </div>
			    </div>
			    <div class="item">
			    	<img src="http://unsplash.s3.amazonaws.com/batch%209/barcelona-boardwalk.jpg" alt="First slide">
                    <div class="header-text">
                        <div class="col-md-12 text-center">
                            <h2>
                            	<span class="hidden-xs">Nom</span>
                            </h2>
                            <br>
                            <h3>
                            	<span>Courte description</span>
                            </h3>
                            <br>
                            <div class="hidden-xs">
                                <a class="btn btn-primary hidden-xs" href="#">Lire l'article</a></div>
						</div>
                    </div>
			    </div>
			</div>
			</div>
		</div>
	</div>
</section>
</div>
</div>
		

<?php include($_SERVER['DOCUMENT_ROOT']). '/assets/includes/footer.php'; ?>