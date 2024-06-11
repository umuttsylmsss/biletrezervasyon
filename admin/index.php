<?php include('header.php'); ?>

<div class="container mx-2 mt-3">

  <div class="row">
    <?php include('sol-menu.php'); ?>
    <div class="col-md-9">

      <h3>Rezervasyonlar</h3>


      <div id="card table-responsive">
        <table class="table">
          <thead>
            <tr>
             <th>Rez. Tarih</th>
             <th>Nereden</th>
             <th>Nereye</th>
             <th>Firma</th>
             <th>Koltuk</th>
             <th>Kullanıcı</th>
             <th>Ad</th>
             <th>Soyad</th>
             <th>Email</th>
             <th>Telefon</th>
             <th>İşlem</th>
           </tr>
         </thead>
         <tbody>
           <?php 
           $veriCek=$conn->prepare("SELECT 
            biletler.*, 
            firmalar.*, 
            kullanici.*, 
            varis_il.isim AS varis_il_ad, 
            kalkis_il.isim AS kalkis_il_ad
            FROM 
            biletler
            INNER JOIN 
            firmalar ON firmalar.firma_id = biletler.bilet_firma_id
            INNER JOIN 
            kullanici ON kullanici.kullanici_id = biletler.bilet_kullanici
            INNER JOIN 
            il AS varis_il ON varis_il.il_no = biletler.bilet_varis
            INNER JOIN 
            il AS kalkis_il ON kalkis_il.il_no = biletler.bilet_kalkis
            ORDER BY 
            bilet_tarih DESC;
            ");
           $veriCek->execute();
           while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
              <td><?=date('d.m.Y H:i',strtotime($var['bilet_gun'].' '.$var['bilet_saat']));?></td>
              <td><?=$var['varis_il_ad'];?></td>
              <td><?=$var['kalkis_il_ad'];?></td>
              <td><?=$var['firma_adi'];?></td>
              <td><?=$var['bilet_koltuk'];?></td>
              <td><?=$var['kullanici_adi'];?></td>
              <td><?=$var['bilet_adi'];?></td>
              <td><?=$var['bilet_soyadi'];?></td>
              <td><?=$var['bilet_mail'];?></td>
              <td><?=$var['bilet_telefon'];?></td>
              <td>
                <a class="btn btn-success" href="bilet-detay.php?id=<?=$var['bilet_id']; ?>"> Görüntüle</a>
                <a class="btn btn-danger" href="sil.php?tablo=index&id=<?=$var['bilet_id'];?>"> Sil</a>
              </td>
            </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>

  </div>
</div>


</div>

</body>
</html>

<script type="text/javascript">
  $('.collapse').collapse();
</script>