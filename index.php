<?php 

	require_once("action/IndexAction.php");
	$action = new IndexAction();
	$action->execute();

?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1>Bienvenue

		<?php 
			echo $action->getUser()["firstName"];
		?> 
		! </h1>

		<input type="submit" value="Transactions"/>
		<input type="submit" value="Graphiques"/>
		<input type="submit" value="Calendrier"/>
		<input type="submit" value="Déconnexion"/>

	</body>
</html>