<?php
include '../fonksiyonlar.php'; 
ob_start();
session_start();
yonetici_sessionkontrol2();

if (isset($_POST['giris_yap'])) {
	$yonetici_adi = $_POST['yonetici_adi'];
	$yonetici_parola = $_POST['yonetici_parola'];
	$sorgu=$conn->prepare("SELECT * FROM yoneticiler WHERE yonetici_adi = :yonetici_adi AND yonetici_parola = :yonetici_parola");
	$sorgu->execute(array('yonetici_adi' => $yonetici_adi,'yonetici_parola' => $yonetici_parola));
	$kullanici=$sorgu->fetch(PDO::FETCH_ASSOC);
	$giris_kontrol=$sorgu->rowCount();
	if ($giris_kontrol > 0) {
		$_SESSION['admin_giris'] = $kullanici['yonetici_id'];
		header("Location: index.php");
	} else {
		header("Location: giris.php?durum=basarisiz");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Yönetici Paneli</title>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container p-5">
		
		<div class="row card-body">
			<div class="col-lg-12 mx-auto">
				<div class = "container">
					<form method="POST" class="mt-5" enctype="multipart/form-data">
						<h1>Giriş Yap</h1>
						<div class="row">
							<div class="col-md-12 mt-3">
								<label>Kullanıcı Adınız</label>
								<input type="text" name="yonetici_adi" class="form-control" required >
							</div>
							<div class="col-md-12 mt-3">
								<label>Parolanız</label>
								<input type="password" name="yonetici_parola" class="form-control" required >
							</div>
							<div class="col-md-12 mt-3">
								<button name="giris_yap" class="btn btn-danger btn-block border">Giriş Yap</button>
							</div>
						</div>
					</form>
					<a href="../" class="btn btn-success mt-3 "> Siteye Dön</a>
				</div>

			</div>
		</div>
	</div>

</body>
</html>