<?php
	// connect db
	require('./config.php');
	// check id first
	if($_GET['id']) {
		$statement = $pdo->prepare("DELETE FROM todo WHERE id=".$_GET['id']);
		$statement->execute();
	} 
	
	header("Location: index.php"); // redirect back to page
	
?>