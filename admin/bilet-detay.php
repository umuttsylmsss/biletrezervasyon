<?php include('header.php');



if (isset($_POST['guncelle'])) {

  $bilet_id=$_POST['bilet_id'];

  $query = $conn->prepare("UPDATE biletler SET    
    bilet_gun = :bilet_gun,
    bilet_kalkis = :bilet_kalkis, 
    bilet_varis = :bilet_varis, 
    bilet_firma_id = :bilet_firma_id, 
    bilet_adi = :bilet_adi,
    bilet_soyadi = :bilet_soyadi,
    bilet_mail = :bilet_mail, 
    bilet_telefon = :bilet_telefon, 
    bilet_saat = :bilet_saat, 
    bilet_koltuk = :bilet_koltuk
    WHERE bilet_id = :bilet_id
    ");
  $update = $query->execute(array(
    "bilet_gun" => date('Y-m-d',strtotime($_POST['tarih'])),
    "bilet_kalkis" => $_POST['kalkis'],
    "bilet_varis" => $_POST['varis'],
    "bilet_firma_id" => $_POST['firma'],
    "bilet_adi" => $_POST['adi'],
    "bilet_soyadi" => $_POST['soyadi'],
    "bilet_mail" => $_POST['mail'],
    "bilet_telefon" => $_POST['telefon'],
    "bilet_saat" => date('H:i',strtotime($_POST['tarih'])),
    "bilet_koltuk" => $_POST['koltuk'],
    "bilet_id" => $bilet_id
  ));
  if ($update) {
    header("location:bilet-detay.php?id=$bilet_id&durum=ok");
  }
  else {
    header("location:bilet-detay.php?id=$bilet_id&durum=hata");
  }
}


if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $sorgu=$conn->prepare("SELECT * FROM biletler where bilet_id= :bilet_id");
  $sorgu->execute(array('bilet_id' => $id));
  $bilgi=$sorgu->fetch(PDO::FETCH_ASSOC);
  $sayi=$sorgu->rowCount();
  if($sayi < 1){
    header("location:index.php");
  }
}
else {
  header("location:index.php");
} 

?>

<div class="container mx-2 mt-3">

  <div class="row">
    <?php include('sol-menu.php'); ?>
    <div class="col-md-9">
      <div class="d-flex justify-content-between align-items-center">
        <h3>Rezervasyon Düzenle</h3>
        <a href="index.php" class="btn btn-primary"><i class="fa fa-list"></i> Rezervasyonlar</a>
      </div>

      <div class="card-body">

        <form method="POST" enctype="multipart/form-data" class="row d-flex align-items-center">

          <div class="col-md-3 mb-2">
            <label for="bilet_id">Adı</label>
            <input type="hidden" name="bilet_id" class="form-control" required value="<?=$bilgi['bilet_id'] ?>">
            <input class="form-control" type="text" name="adi" required value="<?=$bilgi['bilet_adi'] ?>">
          </div>
          <div class="col-md-3 mb-2">
            <label for="bilet_id">Soyadı</label>
            <input class="form-control" type="text" name="soyadi" required value="<?=$bilgi['bilet_soyadi'] ?>">
          </div>
          <div class="col-md-3 mb-2">
            <label for="bilet_id">Email</label>
            <input class="form-control" type="email" name="mail" required value="<?=$bilgi['bilet_mail'] ?>">
          </div>

          <div class="col-md-3 mb-2">
            <label for="bilet_id">Telefon</label>
            <input class="form-control" type="number" name="telefon" required value="<?=$bilgi['bilet_telefon'] ?>">
          </div>

          <div class="col-md-4 mb-2">
            <label for="kalkis">Kalkış</label>
            <select class="form-control" name="kalkis" required id="kalkis">
              <option value="">Seçiniz</option>
              <?php 
              $veriCek=$conn->prepare("SELECT * FROM il ORDER BY isim ASC");
              $veriCek->execute();
              while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                <option
                <?=($var['il_no']==$bilgi['bilet_kalkis']) ? 'selected' : ''; ?>
                value="<?=$var['il_no']; ?>"><?=$var['isim']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-4 mb-2">
            <label for="varis">Varış</label>
            <select class="form-control" name="varis" required id="varis">
              <option value="">Seçiniz</option>
              <?php 
              $veriCek=$conn->prepare("SELECT * FROM il ORDER BY isim ASC");
              $veriCek->execute();
              while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                <option
                <?=($var['il_no']==$bilgi['bilet_varis']) ? 'selected' : ''; ?>
                value="<?=$var['il_no']; ?>"><?=$var['isim']; ?></option>
              <?php } ?>
            </select>
          </div>          

          <div class="col-md-4 mb-2">
            <label for="firma_adi">Firma</label>
            <select class="form-control" name="firma" required id="firma">
              <option value="">Seçiniz</option>
              <?php 
              $veriCek=$conn->prepare("SELECT * FROM firmalar ORDER BY firma_adi ASC");
              $veriCek->execute();
              while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                <option
                <?=($var['firma_id']==$bilgi['bilet_firma_id']) ? 'selected' : ''; ?>
                value="<?=$var['firma_id']; ?>"><?=$var['firma_adi']; ?></option>
              <?php } ?>
            </select>
          </div>
          

          <div class="col-md-6 mb-2">
            <label for="bilet_id">Tarih</label>
            <input class="form-control" type="datetime-local" id="tarih" name="tarih" required value="<?=date('Y-m-d H:i',strtotime($bilgi['bilet_gun'].$bilgi['bilet_saat'])) ?>">
          </div>


          <div class="col-md-6 mb-2" id="koltuklar">
            <label for="koltuk">Koltuk</label>
            <select class="form-control" name="koltuk" required >
              <option value="">Seçiniz</option>
              <?php 
              for ($i=1; $i <= 30; $i++) { ?>
                <option 
                <?=($i==$bilgi['bilet_koltuk']) ? 'selected' : ''; ?>
                value="<?=$i; ?>"><?=$i; ?></option>
              <?php } ?>
            </select>
          </div>


          <div class="col-md-12 mb-2">
            <button type="submit" class="btn btn-success w-100" name="guncelle">Güncelle</button>
          </div>
        </form>
      </div>

    </div>
  </div>


</div>

</body>
</html>

<script type="text/javascript">
  $('.collapse').collapse();
</script>


<script>
  $(document).ready(function(){
    $('#tarih, #firma , #kalkis, #varis').change(function(){
      var firma = $('#firma').val();
      var kalkis = $('#kalkis').val();
      var varis = $('#varis').val();
      var tarih = $('#tarih').val();


      $.ajax({
        type: 'GET',
        url: 'ajax.php',
        data: {kalkis:kalkis,varis:varis,tarih:tarih,firma:firma},
        success: function(response){
          $('#koltuklar').html(response);
        }
      });
    });
  });
</script>