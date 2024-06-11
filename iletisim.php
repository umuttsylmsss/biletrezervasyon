<?php 
include 'ayar.php';
include 'menu.php'; ?>
<section class="breadcrumb-area bread-bg-5">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">İletişim</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="index.html">Anasayfa</a></li>
                            <li>İletişim</li>
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
                <div class="col-lg-8">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Sizden Haber Bekliyoruz </h3>
                            <p class="font-size-15">Size en kısa sürede yanıt vereceğiz</p>
                        </div>
                        <div class="form-content ">
                            <div class="contact-form-action">
                                <div id="contact-success-message" class="alert alert-success" role="alert">
                                    Mesajınız Gönderilmiştir Bizimle İletişime Geçtiğiniz İçin Teşekkür ederiz...
                                </div>
                                <form id="contact-form" method="post" action="php/contact.php" class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Adınız</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="name" placeholder="Your name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Email Adresiniz</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="email" placeholder="Email address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Mesajınız</label>
                                            <div class="form-group">
                                                <span class="la la-pencil form-icon"></span>
                                                <textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <button id="send-message-btn" type="submit" class="theme-btn">Mesajı Gönder</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Bize Ulaşın</h3>
                        </div>
                        <div class="form-content">
                            <div class="address-book">
                                <ul class="list-items contact-address">
                                    <li>
                                        <i class="la la-map-marker icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">Addres</h5>
                                        <p class="map__desc">
                                           Türkiye
                                        </p>
                                    </li>
                                    <li>
                                        <i class="la la-phone icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">Telefon No</h5>
                                        <p class="map__desc">Sabit Hattımız: 2800 256 508</p>
                                        <p class="map__desc">Mobil Hattımız: 666 777 888</p>
                                    </li>
                                    <li>
                                        <i class="la la-envelope-o icon-element"></i>
                                        <h5 class="title font-size-16 pb-1">Email</h5>
                                        <p class="map__desc">test@gmail.com</p>
                                        <p class="map__desc">deneme@gmail.com</p>
                                    </li>
                                </ul>
                                <ul class="social-profile text-center">
                                    <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="lab la-twitter"></i></a></li>
                                    <li><a href="#"><i class="lab la-instagram"></i></a></li>
                                    <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="lab la-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-block"></div>
    <?php include('alt.php'); ?>