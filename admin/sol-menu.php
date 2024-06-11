<div class="col-md-3 d-flex flex-column mb-3">
       <a href="index.php" class="btn btn-success mt-2 mb-2">Rezervasyonlar</a>
       <a href="kullanicilar.php" class="btn btn-dark mt-2 mb-2">Kullanicilar</a>

       <a href="firmalar.php" class="btn btn-primary mt-2 mb-2">Firmalar</a>
       <a href="firma-ekle.php" class="btn btn-primary mt-2 mb-2">Firma Ekle</a>

       <a href="profil.php" class="btn btn-dark mt-2 mb-2">Profil</a>
       <a href="../" target="_blank" class="btn btn-secondary mt-2 mb-2">Siteye dön</a>
       <?php  if (isset($_SESSION['admin_giris'])) { ?>
        <a href="cikis-yap.php" class="btn btn-danger"> Çıkış Kapat</a>
      <?php } ?>
    </div>