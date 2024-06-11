<?php 
include 'ayar.php';
include 'menu.php'; ?>
<section class="hero-wrapper hero-wrapper8">
    <div class="hero-box hero-bg-6 after-none">
        <div class="container">
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="search-fields-container mt-4 shadow-sm">
                        <!-- end section-tab -->
                        <div class="tab-content" id="myTabContent3">
                            <div class="tab-pane show active" id="one-way" role="tabpanel" aria-labelledby="one-way-tab">
                                <div class="contact-form-action search-input-group-wrap">
                                    <form action="rezervasyon.php" method="GET" class="row align-items-center">
                                        <div class="col-lg-5 pr-0">
                                            <div class="d-flex align-items-center search-input-group">
                                                <div class="input-box flex-grow-1 prepend-input-box">
                                                    <label class="label-text">Kalkış</label>
                                                    <select required class="select-contain-select" name="kalkis">
                                                        <option value="">Seçiniz</option>
                                                        <?php 
                                                        $veriCek=$conn->prepare("SELECT * FROM il ORDER BY isim ASC");
                                                        $veriCek->execute();
                                                        while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?=$var['il_no'] ?>"><?=$var['isim'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="input-box flex-grow-1 append-input-box">
                                                    <label class="label-text">Varış</label>
                                                    <select required class="select-contain-select" name="varis">
                                                        <option value="">Seçiniz</option>
                                                        <?php 
                                                        $veriCek=$conn->prepare("SELECT * FROM il ORDER BY isim ASC");
                                                        $veriCek->execute();
                                                        while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <option value="<?=$var['il_no'] ?>"><?=$var['isim'] ?></option>
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
                                                    <input class="date-range form-control" type="date" name="gun" value="<?=date('Y-m-d') ?>">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-3 -->
                                        <div class="col-lg-3 pr-0">
                                          <div class="input-box">
                                            <label class="label-text">Firma</label>
                                            <div class="form-group select-contain select-contain-shadow w-auto">
                                                <select  required class="select-contain-select" name="firma">
                                                    <option value="">Seçiniz</option>
                                                    <?php 
                                                    $veriCek=$conn->prepare("SELECT * FROM firmalar ORDER BY firma_adi ASC");
                                                    $veriCek->execute();
                                                    while ($var=$veriCek->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?=$var['firma_id'] ?>"><?=$var['firma_adi'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-2 -->
                                    <div class="col-lg-2">
                                        <button type="submit" class="theme-btn w-100 text-center margin-top-20px">Ara</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- end main-search-input -->
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
</section>

<section class="info-area info-bg padding-top-140px padding-bottom-40px text-center bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="icon-box">
                    <div class="info-icon after-none before-none font-size-40">
                        <i class="la la-exclamation-circle"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content pt-0">
                        <h4 class="info__title font-size-16 font-weight-bold">COVID-19 Sürecinde Seyahat</h4>
                        <p>Ağımız hakkındaki güncel bilgilere buradan ulaşabilirsiniz.</p>
                        <a href="#" class="btn-text text-color">Buradan kontrol edin <i class="la la-angle-right ml-1"></i></a>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3">
                <div class="icon-box">
                    <div class="info-icon after-none before-none font-size-40">
                        <i class="la la-chair"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content pt-0">
                        <h4 class="info__title font-size-16 font-weight-bold">Konforlu Seyahat</h4>
                        <p>Otobüslerimiz geniş ve rahat koltuklar, tuvalet, Wi-Fi ile donatılmıştır.</p>
                        <a href="#" class="btn-text text-color">Hizmetlerimiz <i class="la la-angle-right ml-1"></i></a>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3">
                <div class="icon-box">
                    <div class="info-icon after-none before-none font-size-40">
                        <i class="la la-map-marker"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content pt-0">
                        <h4 class="info__title font-size-16 font-weight-bold">Avrupa'nın En Büyük Otobüs Ağı</h4>
                        <p>35 ülkede 2,500'den fazla seyahat noktasından seçim yapabilirsiniz.</p>
                        <a href="#" class="btn-text text-color">Güzergah Ağımız <i class="la la-angle-right ml-1"></i></a>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3">
                <div class="icon-box">
                    <div class="info-icon after-none before-none font-size-40">
                        <i class="la la-leaf"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content pt-0">
                        <h4 class="info__title font-size-16 font-weight-bold">Çevre Dostu Seyahat</h4>
                        <p>Verimli otobüslerimizin mükemmel bir karbon ayak izine sahip olduğu kanıtlanmıştır.</p>
                        <a href="#" class="btn-text text-color">Otobüs Seyahati ve Çevre <i class="la la-angle-right ml-1"></i></a>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<!-- ================================
    END INFO AREA
    ================================= -->

<!-- ================================
    START LOW FARE AREA
    ================================= -->
    <section class="low-fare-area padding-top-60px padding-bottom-10px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#" class="discount-box d-block hover-y">
                        <div class="discount-img">
                            <img src="images/scooter.jpg" alt="scooter image">
                        </div><!-- end discount-img -->
                        <div class="discount-content">
                            <div class="section-heading">
                                <h2 class="sec__title mb-2 text-white font-size-30">Tüm şehirleri keşfet</h2>
                                <p class="sec__desc text-white">81 ilimizden gezmediğin yer kalmasın</p>
                            </div><!-- end section-heading -->
                            <div class="btn-box pt-4">
                                <span class="theme-btn border-0">Rezervasyon Yap <i class="la la-arrow-right ml-1"></i></span>
                            </div>
                        </div><!-- end discount-content -->
                    </a>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div>
    </section>

    <div class="section-block"></div>

<!-- ================================
       START TESTIMONIAL AREA
       ================================= -->
       <section class="testimonial-area section-padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-carousel-3 carousel-action">
                        <div class="testimonial-card border-0 p-0 shadow-none">
                            <div class="testi-desc-box">
                                <span class="ratings d-flex align-items-center justify-content-center font-size-30">
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                </span>
                                <p class="testi__desc quote-icons pt-3 font-size-27 font-weight-light">Çok kullanışlı bir hizmet, çok dostane personel, iyi fiyat.</p>
                            </div>
                            <div class="author-content">
                                <div class="author-bio">
                                    <h4 class="author__title font-size-18">Leroy Bell</h4>
                                </div>
                            </div>
                        </div><!-- end testimonial-card -->
                        <div class="testimonial-card border-0 p-0 shadow-none">
                            <div class="testi-desc-box">
                                <span class="ratings d-flex align-items-center justify-content-center font-size-30">
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                </span>
                                <p class="testi__desc quote-icons pt-3 font-size-27 font-weight-light">Basit, zamanında, sürücü ile doğrudan iletişim sağlama imkanı sunuyor.</p>
                            </div>
                            <div class="author-content">
                                <div class="author-bio">
                                    <h4 class="author__title font-size-18">APPOLONOVA</h4>
                                </div>
                            </div>
                        </div><!-- end testimonial-card -->
                        <div class="testimonial-card border-0 p-0 shadow-none">
                            <div class="testi-desc-box">
                                <span class="ratings d-flex align-items-center justify-content-center font-size-30">
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                </span>
                                <p class="testi__desc quote-icons pt-3 font-size-27 font-weight-light">Çok nazik ve profesyonel.</p>
                            </div>
                            <div class="author-content">
                                <div class="author-bio">
                                    <h4 class="author__title font-size-18">Vladimir</h4>
                                </div>
                            </div>
                        </div><!-- end testimonial-card -->
                        <div class="testimonial-card border-0 p-0 shadow-none">
                            <div class="testi-desc-box">
                                <span class="ratings d-flex align-items-center justify-content-center font-size-30">
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                    <i class="la la-star mx-1"></i>
                                </span>
                                <p class="testi__desc quote-icons pt-3 font-size-27 font-weight-light">Çok profesyonel sürücüler, dakik, esnek.</p>
                            </div>
                            <div class="author-content">
                                <div class="author-bio">
                                    <h4 class="author__title font-size-18">Lotte</h4>
                                </div>
                            </div>
                        </div><!-- end testimonial-card -->
                    </div><!-- end testimonial-carousel -->
                    <div class="view-all-wrap margin-top-40px">
                        <a class="theme-btn font-size-17" href="#">Tüm yorumlar</a>
                        <p class="font-size-13 pt-1">Çok iyi görünüyor değil mi? Tüm yorumlara göz atın (477)</p>
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>



    <div class="section-block"></div>
    <?php include('alt.php'); ?>