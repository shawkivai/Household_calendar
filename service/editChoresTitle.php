<?php

require_once('DatabaseConnection.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM tbl_chores WHERE id = $id";
	$query = $DBcon->prepare( $sql );
	if ($query == false) {
	 print_r($DBcon->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	
	$sql = "UPDATE tbl_chores SET  title = '$title', color = '$color' WHERE id = $id ";

	
	$query = $DBcon->prepare( $sql );
	if ($query == false) {
	 print_r($DBcon->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: ../chores_calendar.php');

	
?>
