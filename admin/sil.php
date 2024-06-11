<?php
include '../fonksiyonlar.php'; 
ob_start();
session_start();
yonetici_sessionkontrol();

if (isset($_GET['tablo']) and isset($_GET['id'])) {
	$tablo = $_GET['tablo'];
	$id = $_GET['id'];
	
	switch ($tablo) {
		case 'firmalar':
		$sil_query = $conn->prepare("DELETE FROM firmalar WHERE firma_id = :id");
		$sil = $sil_query->execute(array("id" => $id));
		break;
		
		case 'index':
		$sil_query = $conn->prepare("DELETE FROM biletler WHERE bilet_id = :id");
		$sil = $sil_query->execute(array("id" => $id));
		break;

		default:
		header('location:index.php');
		break;
	}
	if($sil){
		header('location:'.$tablo.'.php');
	}
}
else {
	header('location:index.php');
}
?>
