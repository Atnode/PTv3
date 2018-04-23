<?php

require_once($_SERVER['DOCUMENT_ROOT']). '/assets/includes/config.php';

try
	{
        $sql = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpass);
	}
catch (Exception $e)
	{
        die('Erreur: ' . $e->getMessage());
	}

if (isset($_POST['connexion']))
{
	$query = $sql->prepare('SELECT * FROM forum_membres WHERE membre_pseudo = :pseudo AND membre_mdp = :motdepasse');
	$query->execute(array(
			'pseudo' => $_POST['pseudo'],
			'motdepasse' => crypt('sha512', md5($_POST['motdepasse']))
		));
		
	$connexion = $query->fetch();
	
	if ($connexion)
	{
		echo 'true';
		//A compléter
	}
	else
	{
		echo 'error';
	}
}
else
{
	header("Location: /");
}