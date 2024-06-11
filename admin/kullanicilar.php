<?php include('header.php'); ?>

<div class="container mx-2 mt-3">

  <div class="row">
    <?php include('sol-menu.php'); ?>
    <div class="col-md-9">

      <h3>Kullanıcılar</h3>

      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kullanıcı Adı</th>
              <th scope="col">Şifre</th>
              <th scope="col">Tarih</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $veriCek=$conn->prepare("SELECT * FROM kullanici ORDER BY kullanici_id ASC");
            $veriCek->execute();
            while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
                <th scope="row"><?=$var['kullanici_id'] ?></th>
                <td><?=$var['kullanici_adi'] ?></td>
                <td><?=$var['kullanici_sifre'] ?></td>
                <td><?=date('d/m/Y H:i',strtotime($var['kullanici_tarih'])) ?></td>
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