<?php include('header.php');


if (isset($_POST['guncelle'])) {
  $update = $conn->prepare("UPDATE yoneticiler SET
    yonetici_adi = :yonetici_adi
    WHERE yonetici_id = :yonetici_id
    ");
  $insert = $update->execute(array(
    "yonetici_adi" => $_POST['yonetici_adi'],
    "yonetici_id" => $_SESSION['admin_giris']
  ));
  if ( $insert ){
    header("Location: profil.php?status=success");
  }
  else
  {
    header("Location: profil.php?status=error");
  }

}

if (isset($_POST['sifreGuncelle'])) {
  $update = $conn->prepare("UPDATE yoneticiler SET
    yonetici_parola = :yonetici_parola
    WHERE yonetici_id = :yonetici_id
    ");
  $insert = $update->execute(array(
    "yonetici_parola" => $_POST['yonetici_parola'],
    "yonetici_id" => $_SESSION['admin_giris']
  ));
  if ( $insert ){
    header("Location: profil.php?status=success");
  }
  else
  {
    header("Location: profil.php?status=error");
  }

}



?>

<div class="container mx-2 mt-3">

  <div class="row">
    <?php include('sol-menu.php'); ?>
    <div class="col-md-9">
      <div class="d-flex justify-content-between align-items-center">
        <h3>Profil Ayarları</h3>
      </div>

      <div class="card-body">

        <div class="row">
          <div class="col-md-6">
            <h4 class="mb-3">Kullanıcı Adı Değiştir</h4>
            <form  method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-12 col-lg-12 mb-2">
                  <div class="input-group input-group-primary">
                    <span class="input-group-prepend">
                      <label class="input-group-text">Kullanıcı Adı </label>
                    </span>
                    <input type="text" name="yonetici_adi" class="form-control" value="<?=$yonetici['yonetici_adi']; ?>"  required>
                  </div>
                </div>
              </div>
              <br>
              <div align="center">
                <button type="submit" name="guncelle" class="btn btn-success w-100"><span class="fa fa-check"></span> Güncelle</button>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <h4 class="mb-3">Parola Değiştir</h4>
            <form  method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-12 col-lg-12 mb-2">
                  <div class="input-group input-group-primary">
                    <span class="input-group-prepend">
                      <label class="input-group-text">Yeni Parola </label>
                    </span>
                    <input type="password" name="yonetici_parola" class="form-control"  required>
                  </div>
                </div>
              </div>
              <br>
              <div align="center">
                <button type="submit" name="sifreGuncelle" class="btn btn-danger w-100"><span class="fa fa-lock"></span> Güncelle</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>

</body>
</html>