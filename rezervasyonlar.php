<?php 
include 'ayar.php';
include 'menu.php'; 



if(empty($_SESSION['oturum'])){
    header('location:giris.php');
    exit;
}
else {
    $kullanici_id = $_SESSION['oturum'];
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
                            <h2 class="sec__title text-white">Rezervasyonlar</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="index.php">Anasayfa</a></li>
                            <li>Rezervasyonlar</li>
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
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Rezervasyonlar</h3>
                    </div>
                    <div class="form-content table-responsive">
                       <table class="table">
                          <thead>
                            <tr>
                               <th>Rez. Tarih</th>
                               <th>Nereden</th>
                               <th>Nereye</th>
                               <th>Firma</th>
                               <th>Koltuk</th>
                               <th>Ad</th>
                               <th>Soyad</th>
                               <th>Email</th>
                               <th>Telefon</th>
                           </tr>
                       </thead>
                       <tbody>
                         <?php 
                         $veriCek=$conn->prepare("SELECT 
                            biletler.*, 
                            firmalar.*, 
                            varis_il.isim AS varis_il_ad, 
                            kalkis_il.isim AS kalkis_il_ad
                            FROM 
                            biletler
                            INNER JOIN 
                            firmalar ON firmalar.firma_id = biletler.bilet_firma_id
                            INNER JOIN 
                            il AS varis_il ON varis_il.il_no = biletler.bilet_varis
                            INNER JOIN 
                            il AS kalkis_il ON kalkis_il.il_no = biletler.bilet_kalkis
                            WHERE biletler.bilet_kullanici = :kullanici_id
                            ORDER BY 
                            bilet_tarih DESC;
                            ");
                         $veriCek->execute(['kullanici_id' => $kullanici_id]);
                         while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?=date('d.m.Y H:i',strtotime($var['bilet_gun'].' '.$var['bilet_saat']));?></td>
                                <td><?=$var['varis_il_ad'];?></td>
                                <td><?=$var['kalkis_il_ad'];?></td>
                                <td><?=$var['firma_adi'];?></td>
                                <td><?=$var['bilet_koltuk'];?></td>
                                <td><?=$var['bilet_adi'];?></td>
                                <td><?=$var['bilet_soyadi'];?></td>
                                <td><?=$var['bilet_mail'];?></td>
                                <td><?=$var['bilet_telefon'];?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
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