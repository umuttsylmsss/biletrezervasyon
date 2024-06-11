<?php 
include('../fonksiyonlar.php');
if(isset($_GET['firma'])){

	$kalkis = $_GET['kalkis'];
	$varis = $_GET['varis'];
	$tarih = date('Y-m-d',strtotime($_GET['tarih']));
	$saat = date('H:i',strtotime($_GET['tarih']));
	$firma = $_GET['firma'];


	$biletler = [];
	$sql = "SELECT * FROM biletler WHERE bilet_kalkis = :bilet_kalkis AND bilet_varis = :bilet_varis AND bilet_gun = :bilet_gun AND bilet_saat = :bilet_saat AND bilet_firma_id = :bilet_firma_id";
	$veriCek=$conn->prepare($sql);
	$veriCek->execute(array(
		'bilet_kalkis'=> $kalkis,
		'bilet_varis'=> $varis,
		'bilet_gun'=> $tarih,
		'bilet_saat'=> $saat,
		'bilet_firma_id'=> $firma

	));
	while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) {
		$biletler[] = $var['bilet_koltuk'];
	}

}
?>

<?php for ($i=1; $i <= 30; $i++) {  ?>
	
	<label for="koltuk<?=$i ?>">Koltuk</label>
	<select class="form-control" name="koltuk" required >
		<option value="">Seçiniz</option>
		<?php 
		for ($i=1; $i <= 30; $i++) { ?>
			<option 
			<?=(in_array($i, $biletler)) ? 'disabled' : ''; ?>
			value="<?=$i; ?>"><?=$i; ?></option>
		<?php } ?>
	</select>

	<?php
} 
?>
