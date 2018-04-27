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
			'motdepasse' => crypt('sha512', md5($_POST['password']))
		));
		
	$connexion = $query->fetch();
	
	if ($connexion)
	{
		echo 'true';
		session_start();
		$_SESSION['id'] = $connexion['membre_id'];
		$_SESSION['pseudo'] = $connexion['membre_pseudo'];
		$_SESSION['motdepasse'] = $connexion['membre_mdp'];
		$_SESSION['jeton'] = uniqid(rand(), true);
		$_SESSION['rang'] = $connexion['membre_rang'];
		header( "Location: /");
	}
}
else
{
	header("Location: /");
}