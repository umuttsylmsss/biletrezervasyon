<?php 
include 'ayar.php';
include 'menu.php';


if(isset($_SESSION['oturum'])){
    header('location:index.php');
    exit;
}

?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<section class="breadcrumb-area bread-bg-5">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Giriş / Kayıt</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="index.php">Anasayfa</a></li>
                            <li>Giriş / Kayıt</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 100 10" preserveaspectratio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div>
</section>

<section class="contact-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-box">
                    <?php if(isset($_GET['durum']) and $_GET['durum']=='kullanici_yok'){ ?>
                        <div class="alert alert-danger">Böyle bir kullanıcı bulunamadı</div>
                    <?php }?>
                    <div class="form-title-wrap">
                        <h3 class="title">Giriş Yap</h3>
                    </div>
                    <div class="form-content ">
                      <form action="giris-kontrol.php" method="POST">

                        <div class="row border border-secondary rounded p-4">

                            <div class="col-md-6">
                                <label>Kullanıcı Adınız</label>
                                <input type="text" name="kullanici_adi" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Şifre</label>
                                <input type="password" name="kullanici_sifre" class="form-control" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="submit" name="giris" class="btn btn-success w-100">Giriş Yap</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-box bg-light">
                <?php if(isset($_GET['durum']) and $_GET['durum']=='kullanici_var'){ ?>
                    <div class="alert alert-warning">Bu kullanıcı adı zaten kayıtlı</div>
                <?php } 
                elseif(isset($_GET['durum']) and $_GET['durum']=='hata'){ ?>
                    <div class="alert alert-danger">Bir hata yaşandı. Tekrar deneyiniz</div>
                <?php }
                elseif(isset($_GET['durum']) and $_GET['durum']=='sifre_yanlis'){ ?>
                    <div class="alert alert-danger">Şifreler uyuşmuyor</div>
                <?php } ?>
                <div class="form-title-wrap">
                    <h3 class="title">Kayıt Ol</h3>
                </div>
                <div class="form-content ">
                  <form method="POST" action="kayit-ol.php">

                    <div class="row border border-secondary rounded p-4">

                        <div class="col-md-12">
                            <label>Kullanıcı Adınız</label>
                            <input type="text" name="kullanici_adi" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label>Şifre</label>
                            <input type="password" name="kullanici_sifre" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label>Şifre Tekrar</label>
                            <input type="password" name="kullanici_sifre_tekrar" class="form-control" required>
                        </div>
                        <div class="col-md-12 mt-2">
                            <button type="submit" name="kayitOl" class="btn btn-primary w-100">Kayıt Ol</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
</div>
</section>


<div class="section-block"></div>
<?php include('alt.php'); ?>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('table').DataTable();
});
</script>