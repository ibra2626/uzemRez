<div class="content">
    <div class="container-fluid ">
        <div class="row">
            <?php if ($teslimEdilmeyenOptik >0){?>
            <div class="col-md-12">
                <div class="callout callout-danger">
                    <h5><i class="fas fa-info text-danger"></i> UZEM birimine teslim edilmeyen optikler var.</h5>
                    <ul class="list-group">
                        <p>Optikleri görmek için <a href="#" class="text-dark" data-toggle="modal" data-target="#modaloptikTeslimEdilmeyen">tıklayınız</a></p>
                    </ul>
                </div>
            </div>
            <?php } ?>
            <?php if ($teslimAlınmayanOptik >0){?>
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info text-success"></i> UZEM biriminden teslim almadığınız optikler mevcut.</h5>
                        <ul class="list-group">
                            <p>Optikleri görmek için <a href="#" class="text-dark" data-toggle="modal" data-target="#modaloptikTeslimAlınmayan">tıklayınız</a></p>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row justify-content-around">
            <div class="col-md-6 ">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Okunan Optikler</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="min-height: 400px;">
                        <table class="table " id="okunduTablo">
                            <thead>
                            <tr>
                                <th>Birim</th>
                                <th>Bölüm</th>
                                <th>Optik Sayısı</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach(@$okunanOptik->data as $icerik){if($icerik->tamamlandi == 1){?>
                            <tr>
                                <td><?php echo $icerik->birim_ad; ?></td>
                                <td><?php echo $icerik->bolum_ad; ?></td>
                                <td><?php echo $icerik->optik_sayisi; ?></td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo base_url('user/home/notindir/').$icerik->optikID ?>" class="btn btn-danger">İndir</a>
                                    </div>
                                </td>
                            </tr>
                            <?php }}?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h3 class="card-title">Bekleyen Optikler</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="min-height: 400px;">
                        <table class="table" id="bekleyenTablo" >
                            <thead>
                            <tr>
                                <th>Birim</th>
                                <th>Bölüm</th>
                                <th>Optik Sayısı</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach(@$okunanOptik->data as $icerik){if($icerik->tamamlandi == 0){?>
                            <tr>
                                <td><?php echo $icerik->birim_ad; ?></td>
                                <td><?php echo $icerik->bolum_ad; ?></td>
                                <td><?php echo $icerik->optik_sayisi; ?></td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#<?php echo "modal".$icerik->optikID;?>">Detay</a>
                                    </div>
                                </td>
                                <div class="modal fade" id="<?php echo "modal".$icerik->optikID;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-center font-weight-light">Optik Detay ve İşlem Bilgileri</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-around">
                                                    <div class="col-md-6">
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Optik Detayları</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <i class="font-italic font-weight-bolder">Randevu Tarihi : </i><p><?php echo $icerik->startDate; ?></p><hr>
                                                                <i class="font-italic font-weight-bolder">Birim : </i><p><?php echo $icerik->birim_ad; ?></p><hr>
                                                                <i class="font-italic font-weight-bolder">Bölüm : </i><p><?php echo $icerik->bolum_ad; ?></p><hr>
                                                                <i class="font-italic font-weight-bolder">Optik Sayisi : </i><p><?php echo $icerik->optik_sayisi; ?></p><hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card card-info">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Optik İşlemleri</h3>
                                                            </div>
                                                            <div class="card-body" >
                                                                <i class="font-italic font-weight-bolder text-danger">İşlem Durumu</i><hr>
                                                                <p class="font-weight-bolder">
                                                                  <?php
                                                                  if ($icerik->durum==1){echo "Optiklerin UZEM birimine gönderilmesi bekleniyor...";}
                                                                  elseif ($icerik->durum==2){echo "Optikler alındı.Okuma işlemi devam ediyor...";}
                                                                  elseif ($icerik->durum==3){echo "Optiklerin okunma işlemi tamamlandı.\nUZEM biriminden teslim alabilirsiniz.";}
                                                                  else echo "Bu randevu bulunamamaktadır";
                                                                  ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                            </tr>
                            <?php }}?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="modal fade" id="modaloptikTeslimEdilmeyen">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row-fluid">
                                <div class="col-md-12">
                                    <div class="card card-danger">
                                        <div class="card-header ">
                                            <h3 class="card-title">UZEM Birimine Teslim Edilmesi Gereken Optikler</h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Randevu Tarihi</th>
                                                        <th>Birim</th>
                                                        <th>Bölüm</th>
                                                        <th>Optik Sayısı</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($okunanOptik->data as $icerik) {if ($icerik->durum == 1) { ?>

                                                <tr>
                                                    <td><?php echo $icerik->startDate;?></td>
                                                    <td><?php echo $icerik->birim_ad;?></td>
                                                    <td><?php echo $icerik->bolum_ad;?></td>
                                                    <td><?php echo $icerik->optik_sayisi;?></td>
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
            </div>
            <div class="modal fade" id="modaloptikTeslimAlınmayan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row-fluid">
                                <div class="col-md-12">
                                    <div class="card card-danger">
                                        <div class="card-header ">
                                            <h3 class="card-title">UZEM Birimine Teslim Edilmesi Gereken Optikler</h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Randevu Tarihi</th>
                                                    <th>Birim</th>
                                                    <th>Bölüm</th>
                                                    <th>Optik Sayısı</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($okunanOptik->data as $icerik) {if ($icerik->durum == 3) { ?>

                                                    <tr>
                                                        <td><?php echo $icerik->startDate;?></td>
                                                        <td><?php echo $icerik->birim_ad;?></td>
                                                        <td><?php echo $icerik->bolum_ad;?></td>
                                                        <td><?php echo $icerik->optik_sayisi;?></td>
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
            </div>


        </div>
    </div>
</div>
