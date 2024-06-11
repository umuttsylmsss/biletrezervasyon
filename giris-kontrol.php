<?php 

include 'ayar.php';

ob_start();
session_start();

if(isset($_SESSION['oturum'])){
    header('location:index.php');
    exit;
}

if (isset($_POST['giris'])) {
    $kullanici_adi = $_POST['kullanici_adi'];
    $kullanici_sifre =$_POST['kullanici_sifre'];
    
    if ($kullanici_adi && $kullanici_sifre) {
        $kullanicisor=$conn->prepare("SELECT * FROM kullanici WHERE kullanici_adi = :kullanici_adi AND kullanici_sifre = :kullanici_sifre");
        $kullanicisor->execute(array(
            'kullanici_adi' => $kullanici_adi,
            'kullanici_sifre' => $kullanici_sifre
        ));
        $kullanici=$kullanicisor->fetch(PDO::FETCH_ASSOC);
        $say=$kullanicisor->rowCount();
        if ($say > 0) {
            $_SESSION['oturum'] = $kullanici['kullanici_id'];
            header("Location: rezervasyonlar.php");
        } else {
            header("Location: giris.php?durum=kullanici_yok");
        }
    }
    else {
        header('location: giris.php?durum=eksik_veri');
    }
    
}

?>