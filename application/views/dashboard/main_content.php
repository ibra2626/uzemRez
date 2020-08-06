<div class="content">
    <div class="container-fluid">
        <?php if ($this->session->logged_in_admin == 1){  ?>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Toplam Okunmuş Optik</p>
                        <h3><?php foreach ($toplamOkunan as $item){echo ($item->optik_sayisi ==0)? "0":$item->optik_sayisi;} ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sticky-note"></i>
                    </div>
<!--                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>Sırada ki Toplam Optik</p>
                        <h3><?php foreach ($bekleyen as $item){echo ($item->optik_sayisi ==0)? "0":$item->optik_sayisi;} ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-sticky-note"></i>
                    </div>
<!--                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $aktifKull; ?></h3>

                        <p>Aktif Kullanıcı</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
<!--                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $pasifKull; ?></h3>

                        <p>Deaktif Kullanıcı</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
<!--                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                </div>
            </div>
        </div>
        <?php }?>
        <div class="row justify-content-center">

            <div class="card-body">

                <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="sonAlinanRandevuTab" data-toggle="pill" href="#sonAlinanRandevular" role="tab" aria-controls="sonAlinanRandevularr" aria-selected="true">Son Alınan Randevular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="iptalOlanRandevuTab" data-toggle="pill" href="#iptalolanRandevular" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">İptal Olan Randevular</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-above-tabContent">
                    <div class="tab-pane fade show active" id="sonAlinanRandevular" role="tabpanel" aria-labelledby="sonAlinanRandevuTab">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border border-success">
                                    <h3 class="card-title">
                                        <i class="fas fa-calendar-check"></i>
                                        Son alınan Randevular
                                    </h3>
                                </div>
                                <div class="card-body border border-success">
                                    <div class="callout-danger border-bottom border-success col-md-12">
                                        <table class="table table-hover table-responsive-md">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Randevu Tarihi</th>
                                                <th>Randevu Saati</th>
                                                <th>Öğretim Görevlisi</th>
                                                <th>Birim</th>
                                                <th>Bölüm</th>
                                                <th>Optik Sayısı</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($optikDurumu as $optik){ if ($optik->tamamlandi == 0 AND $optik->durum == 1){?>
                                                <tr>
                                                    <td><a class="badge badge-primary" href="<?php echo base_url('Optik_islemleri/optikAksiyon/'.$optik->optikID.'/2/'.date('Y-m-d')); ?>">Optik Teslim Al</a></td>
                                                    <td><?php echo $optik->startDate ?></td>
                                                    <td><?php echo $optik->saat ?></td>
                                                    <td><?php echo $optik->user_ad." ".$optik->user_soyad; ?></td>
                                                    <td><?php echo $optik->birim_ad; ?></td>
                                                    <td><?php echo $optik->bolum_ad; ?></td>
                                                    <td><?php echo $optik->optik_sayisi; ?></td>
                                                </tr>
                                            <?php }}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="iptalolanRandevular" role="tabpanel" aria-labelledby="iptalOlanRandevuTab">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border border-danger">
                                    <h3 class="card-title">
                                        <i class="fas fa-window-close"></i>
                                        İptal Olan Randevular
                                    </h3>
                                </div>
                                <div class="card-body border border-danger">
                                    <div class="callout-danger border-bottom border-danger col-md-12">
                                        <table class="table table-hover table-responsive-md">
                                            <thead>
                                            <tr>
                                                <th>Randevu Tarihi</th>
                                                <th>Randevu Saati</th>
                                                <th>Öğretim Görevlisi</th>
                                                <th>Birim</th>
                                                <th>Bölüm</th>
                                                <th>Optik Sayısı</th>
                                                <th>İptal Nedeni</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($optikDurumu as $optik){ if (($optik->tamamlandi == 3 AND $optik->durum == 6) OR ($optik->tamamlandi == 2 AND $optik->durum == 5)){?>
                                                <tr>
                                                    <td><?php echo $optik->startDate ?></td>
                                                    <td><?php echo $optik->saat ?></td>
                                                    <td><?php echo $optik->user_ad." ".$optik->user_soyad; ?></td>
                                                    <td><?php echo $optik->birim_ad; ?></td>
                                                    <td><?php echo $optik->bolum_ad; ?></td>
                                                    <td><?php echo $optik->optik_sayisi; ?></td>
                                                    <?php if($optik->durum == 6){?>
                                                    <td>Randevuya gelinmediği için iptal oldu.</td>
                                                    <?php }elseif($optik->durum ==5){ ?>
                                                    <td>Kullanıcı tarafından iptal edildi.</td>
                                                    <?php } ?>
                                                </tr>
                                            <?php }}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header bg-info">
                        <h3 class="card-title">İşlemdeki Optikler</h3>
                    </div>
                    <div class="card-body border border-info">
                        <table class="table border border-info table-responsive-md" id="islemdeki_optik" >
                            <thead >
                            <tr>
                                <th style="max-width: 70px;">Eğitim Görevlisi</th>
                                <th>Birim</th>
                                <th>Bölüm</th>
                                <th>Randevu Tarihi</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($optikDurumu as $optik){ if ($optik->tamamlandi == 0){?>
                                <tr>
                                    <td><?php echo $optik->user_ad.' '.$optik->user_soyad; ?></td>
                                    <td><?php echo $optik->birim_ad; ?></td>
                                    <td><?php echo $optik->bolum_ad; ?></td>
                                    <td><?php echo $optik->startDate; ?></td>
                                    <?php if(!$optik->teslimAlma_Tarih){ ?>
                                    <td class="text-danger">Optiklerin Gönderilmesi Bekleniyor</td>
                                    <?php }else if(!$optik->okundu_Tarih){ ?>
                                    <td class="text-info font-weight-bold">Optik Okuma İşlemi Devam Ediyor</td>
                                    <?php }else if(!$optik->finishDate){ ?>
                                    <td class="text-success font-weight-bold">Optiklerin alınması bekleniyor.</td>
                                    <?php } ?>
                                </tr>
                            <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
