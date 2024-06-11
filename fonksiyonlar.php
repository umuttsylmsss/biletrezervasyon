<?php
include 'ayar.php';

date_default_timezone_set('Europe/Istanbul');
$bugun_tarih=date('Y-m-d H:i');


function yonetici_sessionkontrol() {
	if (empty($_SESSION['admin_giris'])) {
		header("Location: giris.php");
		exit();
	}
}

function yonetici_sessionkontrol2() {
	if (isset($_SESSION['admin_giris'])) {
		header("Location: ./");
		exit();
	}
}
?>