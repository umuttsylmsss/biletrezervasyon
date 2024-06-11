<?php include('header.php'); ?>

<div class="container mx-2 mt-3">

  <div class="row">
    <?php include('sol-menu.php'); ?>
    <div class="col-md-9">

      <div class="d-flex justify-content-between align-items-center">
        <h3>Firmalar</h3>
        <a href="firma-ekle.php" class="btn btn-primary"><i class="fa fa-plus"></i> Firma Ekle</a>
      </div>

      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Firma</th>
              <th>İşlem</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $veriCek=$conn->prepare("SELECT * FROM firmalar ORDER BY firma_adi ASC");
            $veriCek->execute();
            while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
                <th scope="row"><?=$var['firma_id'] ?></th>
                
                <td><?=$var['firma_adi'] ?></td>
                <td>
                  <a class="btn btn-success" href="firma-detay.php?id=<?=$var['firma_id']; ?>"> Görüntüle</a>
                  <a class="btn btn-danger" href="sil.php?tablo=firmalar&id=<?=$var['firma_id'];?>"> Sil</a>
                </td>
              </tr>
            <?php } ?>
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