<?php include('header.php');



if (isset($_POST['ekle'])) {

  $query = $conn->prepare("INSERT INTO firmalar SET    
    firma_adi = :firma_adi
    ");
  $insert = $query->execute(array(
    "firma_adi" => $_POST['firma_adi']
  ));
  if ($insert) {
    header("location:firmalar.php?status=success");
  }
  else {
    header("location:firmalar.php?status=error");
  }
}


?>

<div class="container mx-2 mt-3">

  <div class="row">
    <?php include('sol-menu.php'); ?>
    <div class="col-md-9">
      <div class="d-flex justify-content-between align-items-center">
        <h3>Firma Ekle</h3>
        <a href="firmalar.php" class="btn btn-primary"><i class="fa fa-list"></i> Firmalar</a>
      </div>

      <div class="card-body">
        <form method="POST" enctype="multipart/form-data" class="row d-flex align-items-center">
         
          <div class="col-md-12 mb-2">
            <label for="firma_adi">Firma Adı</label>
            <input type="text" name="firma_adi" class="form-control" required>
          </div>
          
          <div class="col-md-12 mb-2">
            <button type="submit" class="btn btn-success w-100" name="ekle">Ekle</button>
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