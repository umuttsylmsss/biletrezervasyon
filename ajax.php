<?php 
include('ayar.php');
if(isset($_GET['firma'])){

	$kalkis = $_GET['kalkis'];
	$varis = $_GET['varis'];
	$tarih = $_GET['tarih'];
	$saat = $_GET['saat'];
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
	<label for="koltuk<?=$i ?>" >
		<?php if(in_array($i, $biletler)){ ?>
			<div class="doluKoltuk">
				Dolu
			</div>
		<?php } else { ?>
			<div class="koltuk">
				<input type="radio" name="koltuk"  id="koltuk<?=$i ?>" value="<?=$i ?>"><?=$i ?>
			</div>
		<?php } ?>
	</label>
	<?php
} 
?>

<script type="text/javascript">
	$('.koltuk').click(function(){
            $('.koltuk').css('background-color', '#FFFFFF'); // Tüm koltukların arka plan rengini beyaz yap
            $(this).css({
            	'background-color': '#287dfa'
            });
        });
    </script>