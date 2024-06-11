<?php 
include 'ayar.php';
include 'menu.php'; 



if(isset($_POST['koltuk']) and isset($_POST['saatInput'])){

    $query = $conn->prepare("INSERT INTO biletler SET    
      bilet_gun = :bilet_gun,
      bilet_kalkis = :bilet_kalkis, 
      bilet_varis = :bilet_varis, 
      bilet_firma_id = :bilet_firma_id, 
      bilet_kullanici = :bilet_kullanici, 
      bilet_adi = :bilet_adi,
      bilet_soyadi = :bilet_soyadi,
      bilet_mail = :bilet_mail, 
      bilet_telefon = :bilet_telefon, 
      bilet_saat = :bilet_saat, 
      bilet_koltuk = :bilet_koltuk
      ");
    $insert = $query->execute(array(
      "bilet_gun" => $_POST['tarihInput'],
      "bilet_kalkis" => $_POST['kalkisInput'],
      "bilet_varis" => $_POST['varisInput'],
      "bilet_firma_id" => $_POST['firmaInput'],
      "bilet_kullanici" => $_SESSION['oturum'],
      "bilet_adi" => $_POST['adi'],
      "bilet_soyadi" => $_POST['soyadi'],
      "bilet_mail" => $_POST['mail'],
      "bilet_telefon" => $_POST['telefon'],
      "bilet_saat" => $_POST['saatInput'],
      "bilet_koltuk" => $_POST['koltuk']
  ));
    if ($insert) {
        header("location:rezervasyonlar.php?durum=ok");
    }
    else {
        header("location:rezervasyonlar.php?durum=hata");
    }

}

if (isset($_GET['kalkis']) and isset($_GET['varis'])) {
    $kalkis = $_GET['kalkis'];
    $varis = $_GET['varis'];
    $firma = $_GET['firma'];
    $tarih = $_GET['gun'];

    $kalkisData = $conn->query("SELECT * FROM il WHERE il_no = $kalkis")->fetch(PDO::FETCH_ASSOC);
    $varisData = $conn->query("SELECT * FROM il WHERE il_no = $varis")->fetch(PDO::FETCH_ASSOC);
    $firmaData = $conn->query("SELECT * FROM firmalar WHERE firma_id = $firma")->fetch(PDO::FETCH_ASSOC);
}
else {
    header('location: index.php');
}



if(empty($_SESSION['oturum'])){
    header('location:giris.php');
    exit;
}
else {
    $kullanici_id = $_SESSION['oturum'];
}
?>

<style>
 .koltuk {
     display: inline-block;
     width: 60px;
     height: 60px;
     border: 2px solid #ccc;
     border-radius: 6px;
     margin: 5px;
     text-align: center;
     line-height: 60px;
     cursor: pointer;
 }
 .koltuk:hover {
    background-color: #f0f0f0;
}

.doluKoltuk {
    background-color: #ff000030;
    border-radius: 6px;
    display: inline-block;
    width: 60px;
    height: 60px;
    border: 2px solid #ccc;
    margin: 5px;
    text-align: center;
    line-height: 60px;
    cursor: pointer;
}
.doluKoltuk:hover {
    color: white;
}


input[type="radio"] {
    display: none;
}
input[type="radio"]:checked + .koltuk {
    background-color: #00FF00; /* Yeşil arka plan */
    color: white;
}
</style>
<section class="breadcrumb-area bread-bg-6">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="search-result-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Rezervasyon Yap</h2>
                        </div>
                        <div class="search-fields-container margin-top-30px">
                            <div class="contact-form-action">
                                <form action="rezervasyon.php" method="GET" class="row align-items-center">
                                    <div class="col-lg-5 pr-0">
                                        <div class="d-flex align-items-center search-input-group">
                                            <div class="input-box flex-grow-1 prepend-input-box">
                                                <label class="label-text">Kalkış</label>
                                                <select class="select-contain-select" name="kalkis">
                                                    <option value="">Seçiniz</option>
                                                    <?php 
                                                    $veriCek=$conn->prepare("SELECT * FROM il ORDER BY isim ASC");
                                                    $veriCek->execute();
                                                    while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option <?=($kalkis == $var['il_no']) ? 'selected' : '' ?> value="<?=$var['il_no'] ?>"><?=$var['isim'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="input-box flex-grow-1 append-input-box">
                                                <label class="label-text">Varış</label>
                                                <select class="select-contain-select" name="varis">
                                                    <option value="">Seçiniz</option>
                                                    <?php 
                                                    $veriCek=$conn->prepare("SELECT * FROM il ORDER BY isim ASC");
                                                    $veriCek->execute();
                                                    while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option <?=($varis == $var['il_no']) ? 'selected' : '' ?> value="<?=$var['il_no'] ?>"><?=$var['isim'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-5 -->
                                    <div class="col-lg-2 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Tarih</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="date-range form-control" type="date" name="gun" value="<?=date('Y-m-d',strtotime($tarih)) ?>">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-3 -->
                                    <div class="col-lg-3 pr-0">
                                      <div class="input-box">
                                        <label class="label-text">Firma</label>
                                        <div class="form-group select-contain select-contain-shadow w-auto">
                                            <select class="select-contain-select" name="firma">
                                                <option value="">Seçiniz</option>
                                                <?php 
                                                $veriCek=$conn->prepare("SELECT * FROM firmalar ORDER BY firma_adi ASC");
                                                $veriCek->execute();
                                                while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option <?=($firma == $var['firma_id']) ? 'selected' : '' ?> value="<?=$var['firma_id'] ?>"><?=$var['firma_adi'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-2 -->
                                <div class="col-lg-2">
                                    <button type="submit" class="theme-btn w-100 text-center margin-top-20px">Ara</button>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div><!-- end search-result-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end breadcrumb-wrap -->
<div class="bread-svg-box">
    <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 100 10" preserveaspectratio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
</div><!-- end bread-svg -->
</section>

<section class="card-area section--padding">
    <div class="container">
        <!-- end row -->
        <div class="row">
          <?php 
          $saat_baslangic = '00:00';
          for ($i=0; $i < 23; $i++) { 
            $saat_baslangic = date('H:i', strtotime($saat_baslangic . ' +60 minutes'));

            ?> 
            <div class="col-lg-3 responsive-column">
                <div class="card-item flight-card flight--card">

                    <div class="card-body">
                        <div class="card-top-title d-flex justify-content-between">
                            <div>
                                <h3 class="card-title font-size-17"><?=$firmaData['firma_adi']?></h3>
                                <p class="card-meta font-size-14"><?=$saat_baslangic; ?></p>
                            </div>
                            <div>
                                <div class="text-right">
                                    <span class="font-weight-regular font-size-14 d-block">Kişi Başı</span>
                                    <h6 class="font-weight-bold color-text">250.00 ₺</h6>
                                </div>
                            </div>
                        </div><!-- end card-top-title -->
                        <div class="flight-details py-3">
                            <div class="flight-time pb-3">
                                <div class="flight-time-item take-off d-flex">
                                    <div class="flex-shrink-0 mr-2">
                                        <i class="la la-plane"></i>
                                    </div>
                                    <div>
                                        <h3 class="card-title font-size-15 font-weight-medium mb-0"><?=$kalkisData['isim']?></h3>
                                        <p class="card-meta font-size-14"><?=date('d.m.Y',strtotime($tarih)).'  '.$saat_baslangic; ?></p>
                                    </div>
                                </div>
                                <div class="flight-time-item landing d-flex">
                                    <div class="flex-shrink-0 mr-2">
                                        <i class="la la-plane"></i>
                                    </div>
                                    <div>
                                        <h3 class="card-title font-size-15 font-weight-medium mb-0"><?=$varisData['isim']?></h3>
                                        <p class="card-meta font-size-14"><?=date('d.m.Y',strtotime($tarih)).'  '.date('H:i', strtotime($saat_baslangic . ' +55 minutes')); ?></p>
                                    </div>
                                </div>
                            </div><!-- end flight-time -->
                        </div><!-- end flight-details -->
                        <div class="btn-box text-center">
                            <button type="button" data-saat="<?=$saat_baslangic; ?>" class="theme-btn theme-btn-small w-100 saatSec">Seç</button>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card-item -->
            </div>
        <?php } ?>  
    </div><!-- end row -->
    <div id="kisiselBilgiler" class="section-block"></div>

    <div class="row">
        <form method="POST">

            <div class="col-lg-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Koltuk Seçimi</h4> <span id="saatSpan"></span>
                    </div>
                    <div class="card-body" id="koltuklar">

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Kişisel Bilgileriniz</h3>
                    </div><!-- form-title-wrap -->
                    <div class="form-content">
                        <div class="contact-form-action">
                            <div class="row">
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Adınız</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control" type="hidden" name="saatInput" id="saatInput">
                                            <input class="form-control" type="hidden" name="kalkisInput" id="kalkisInput" value="<?=$kalkis; ?>">
                                            <input class="form-control" type="hidden" name="varisInput" id="varisInput" value="<?=$varis; ?>">
                                            <input class="form-control" type="hidden" name="tarihInput" id="tarihInput" value="<?=$tarih; ?>">
                                            <input class="form-control" type="hidden" name="firmaInput" id="firmaInput" value="<?=$firma; ?>">

                                            <input class="form-control" type="text" name="adi" required placeholder="Adınız">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Soyadınız</label>
                                        <div class="form-group">
                                            <span class="la la-user form-icon"></span>
                                            <input class="form-control" type="text" name="soyadi" required placeholder="Soyadınız">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">E-posta Adresiniz</label>
                                        <div class="form-group">
                                            <span class="la la-envelope-o form-icon"></span>
                                            <input class="form-control" type="email" name="mail" required placeholder="E-posta Adresiniz">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 responsive-column">
                                    <div class="input-box">
                                        <label class="label-text">Telefon Numaranız</label>
                                        <div class="form-group">
                                            <span class="la la-phone form-icon"></span>
                                            <input class="form-control" type="text" name="telefon" required placeholder="Telefon Numaranız">
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <!-- end col-lg-12 -->
                                <!-- end col-lg-6 -->
                                <!-- end col-lg-6 -->
                                <div class="col-lg-12">
                                    <div class="btn-box">
                                        <button class="theme-btn" type="submit">İşlemi Tamamla</button>
                                    </div>
                                </div>
                                <!-- end col-lg-12 -->
                            </div>
                        </div><!-- end contact-form-action -->
                    </div><!-- end form-content -->
                </div><!-- end btn-box -->
            </div><!-- end col-lg-12 -->
        </form>
    </div><!-- end row -->
</div><!-- end container -->
</section>

<div class="section-block"></div>
<?php include('alt.php'); ?>
<script>
    $(document).ready(function(){
        $('.saatSec').click(function(){
            var saat = $(this).data('saat'); 
            $('#saatInput').val(saat);
            $('#saatSpan').text(saat);


            var firma = <?=$firma; ?>;

            var kalkis = <?=$kalkis; ?>;
            var varis = <?=$varis; ?>;
            var tarih = '<?=$tarih; ?>';
            $('#kalkisYer').val(kalkis);
            $('#varisYer').val(varis);
            $('#gidisTarih').val(tarih);

            $('#firmaValue').val(firma);

            $.ajax({
                type: 'GET',
                url: 'ajax.php', // PHP işleme dosyasının adı
                data: {kalkis:kalkis,varis:varis,tarih:tarih,firma:firma,saat:saat},
                success: function(response){
                    $('#koltuklar').html(response);
                }
            });

            $('html, body').animate({
                scrollTop: $('#kisiselBilgiler').offset().top
        }, 500); // 500 milisaniyede kaydırma süresi
        });
    });
</script>