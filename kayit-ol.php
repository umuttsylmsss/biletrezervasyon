<?php 

include 'ayar.php';

ob_start();
session_start();

if(isset($_SESSION['oturum'])){
    header('location:index.php');
    exit;
}

if (isset($_POST['kayitOl'])) {
    $kullanici_adi = $_POST['kullanici_adi'];
    $kullanici_sifre =$_POST['kullanici_sifre'];
    $kullanici_sifre_tekrar =$_POST['kullanici_sifre_tekrar'];
    if($kullanici_sifre == $kullanici_sifre_tekrar){

        if ($kullanici_adi && $kullanici_sifre) {

            $kullanicisor=$conn->prepare("SELECT * FROM kullanici WHERE kullanici_adi = :kullanici_adi");
            $kullanicisor->execute(array(
                'kullanici_adi' => $kullanici_adi
            ));
            $kullanici=$kullanicisor->fetch(PDO::FETCH_ASSOC);
            $say=$kullanicisor->rowCount();
            if ($say > 0) {
                header("Location: giris.php?durum=kullanici_var");
            } else {

                $query = $conn->prepare("INSERT INTO kullanici SET    
                    kullanici_adi = :kullanici_adi,
                    kullanici_sifre = :kullanici_sifre
                    ");
                $insert = $query->execute(array(
                    "kullanici_adi" => $_POST['kullanici_adi'],
                    "kullanici_sifre" => $_POST['kullanici_sifre']
                ));
                if ($insert) {
                    $kullanici_id = $conn->lastInsertId();
                    $_SESSION['oturum'] = $kullanici_id;
                    header("location:rezervasyonlar.php?durum=ok");
                }
                else {
                    header("location:giris.php?durum=hata");
                }
            }
        }
    }
    else {
        header('location: giris.php?durum=sifre_yanlis');
    }

    
}

?>