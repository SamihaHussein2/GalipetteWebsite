<?php


include "Admintrial.php";


if (isset($_GET['deleteCategory'])) {
	$id = $_GET['deleteCategory'];
	$result = mysqli_query($conn, "DELETE FROM category WHERE categoryID='$id'") or die( mysqli_error($conn));
	if($result){
		header('location: categories.php');
	} else{
		echo "error is found";
	}
}

if (isset($_GET['deleteGallery'])) {
	$id = $_GET['deleteGallery'];
	$result = mysqli_query($conn, "DELETE FROM gallery WHERE id='$id'");
	if($result){
		header('location: Products.php');
	} else{
		echo "error is found";
	}
	
}




?>