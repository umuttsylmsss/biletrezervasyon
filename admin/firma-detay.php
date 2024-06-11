<?php include('header.php');



if (isset($_POST['guncelle'])) {

  $firma_id=$_POST['firma_id'];


  $query = $conn->prepare("UPDATE firmalar SET    
    firma_adi = :firma_adi
    WHERE firma_id =:firma_id
    ");
  $update = $query->execute(array(
    "firma_adi" => $_POST['firma_adi'],
    "firma_id" => $firma_id
  ));
  if ($update) {
    header("location:firmalar.php?status=success");
  }
  else {
    header("location:firmalar.php?status=error");
  }
}


if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $sorgu=$conn->prepare("SELECT * FROM firmalar where firma_id= :firma_id");
  $sorgu->execute(array('firma_id' => $id));
  $bilgi=$sorgu->fetch(PDO::FETCH_ASSOC);
  $sayi=$sorgu->rowCount();
  if($sayi < 1){
    header("location:firmalar.php");
  }
}
else {
  header("location:firmalar.php");
} 

?>

<div class="container mx-2 mt-3">

  <div class="row">
    <?php include('sol-menu.php'); ?>
    <div class="col-md-9">
      <div class="d-flex justify-content-between align-items-center">
        <h3>Firma Düzenle</h3>
        <a href="firmalar.php" class="btn btn-primary"><i class="fa fa-list"></i> Firmalar</a>
      </div>

      <div class="card-body">
        <form method="POST" enctype="multipart/form-data" class="row d-flex align-items-center">
          
          <div class="col-md-12 mb-2">
            <label for="firma_id">Firma Adı</label>
            <input type="hidden" name="firma_id" class="form-control" required value="<?=$bilgi['firma_id'] ?>">

            <input type="text" name="firma_adi" class="form-control" required value="<?=$bilgi['firma_adi'] ?>">
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