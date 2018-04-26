<?php
$titre = "Salle d'arcade";
$description = "Des jeux pour s'amuser et faire passer le temps.";

include_once($_SERVER['DOCUMENT_ROOT']). '/assets/includes/header.php';

require('data.php');

$tips = '<ul class="tips">';

foreach ($data as $k => $v) {

    $tips .= '
    <li>
        <div class="tip-content text-center ">
            <div class="front">
                <h3>'.$v['title'].'</h3>
                <p><img src="'.$v['img'].'" alt="" /></p>
            </div>
            <div class="back">
                <p class="description">'.$v['description'].'</p>
                <p class="play">
                    <a class="btn btn-primary" href="'.$v['url'].'" title="Jouer en ligne à '.$v['title'].'">
                        <i class="fa fa-gamepad"></i> Jouer
                    </a> 
                </p>
            </div>
        </div>
    </li>';
};

$tips .= '
</ul>';
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<a href="/"><?php echo "$nom" ?></a>
			</li>
			<li>Divers</li>
			<li class="active"><strong><?php echo "$titre" ?></strong></li>
		</ol>
	</div>
</div>
<div class="container">
	<main>
		<?php echo $tips; ?>
	</main>
</div>
	
<?php include($_SERVER['DOCUMENT_ROOT']). '/assets/includes/footer.php'; ?>

