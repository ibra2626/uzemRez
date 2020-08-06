<?php
function turkceTarih($setTarih){

    date_default_timezone_set('Europe/Istanbul');

    $tarih = $setTarih;

    $ing_aylar = array("January", "February", "March", "May", "April", "June", "July", "August", "September", "October", "November", "December");
    $tr_aylar = array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık");

    $ing_gunler = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $tr_gunler = array("Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi", "Pazar");

    $tarih = str_replace($ing_aylar, $tr_aylar, $tarih);
    $tarih = str_replace($ing_gunler, $tr_gunler, $tarih);

    return $tarih;
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header border border-danger">
                        <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Aktif Randevular
                        </h3>
                    </div>
                    <div class="card-body border border-danger">
                        <?php if (count($randevuCek) == 0){?>
                            <div class="callout-danger border-bottom border-danger col-md-12">
                                <p class="font-weight-light"> <b> Aktif Randevunuz Bulunmamaktadır. </b>
                                </p>
                            </div>
                        <?php }else{?>
                        <?php foreach ($randevuCek as $vals){if ($vals->durum == 0){?>
                            <div class="callout-danger border-bottom border-danger col-md-12">
                                <p class="font-weight-light"> <b><?php $date = new DateTime($vals->tarih);echo turkceTarih($date->format('d-F-Y l')).'</b>'.' <b>-</b> '.$vals->saat;?>
                                    <a href="#" data-toggle="modal" data-target="#modalSil<?php echo $vals->RandevuID; ?>" role="button" class="badge badge-danger float-right mt-3">İptal Et</a>
                                </p>
                                <div class="modal fade" id="modalSil<?php echo $vals->RandevuID; ?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-body pb-0">
                                                <div class="callout col-md-12 callout-warning ">
                                                    <h3><i class="fas text-warning fa-exclamation-triangle"></i></h3>
                                                    Randevunuz ve optik işlemleri iptal edilecektir onaylıyor musunuz?
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">İptal Et</button>
                                                <a href="<?php echo base_url('user/RandevuIslemleri/randevuSil/').$vals->RandevuID; ?>" role="button" class="btn btn-primary ">Onayla</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }}} ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Optik İptal Et</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0" >
                        <table class="table table-responsive-md" id="okunduTablo">
                            <thead>
                            <tr>
                                <th>Randevu Tarihi</th>
                                <th>Birim</th>
                                <th>Bölüm</th>
                                <th>Optik Sayısı</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach(@$okunanOptik->data as $icerik){if($icerik->teslimAlma_Tarih == null AND $icerik->tamamlandi==0){?>
                                <tr>
                                    <td><?php echo $icerik->startDate; ?></td>
                                    <td><?php echo $icerik->birim_ad; ?></td>
                                    <td><?php echo $icerik->bolum_ad; ?></td>
                                    <td><?php echo $icerik->optik_sayisi; ?></td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <button class='btn btn-warning float-right' data-toggle="modal" data-target="#modalSil<?php echo $icerik->optikID; ?> ">Optik Sil</button>
                                        </div>
                                    </td>


                                </tr>
                                <div class="modal fade" id="modalSil<?php echo $icerik->optikID; ?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-body pb-0">
                                                <div class="callout col-md-12 callout-warning ">
                                                    <h3><i class="fas text-warning fa-exclamation-triangle"></i></h3>
                                                    Optik teslimini iptal etmek istediğinize emin misiniz?
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">İptal Et</button>
                                                <a href="<?php echo base_url('user/RandevuIslemleri/optikIptal/').$icerik->optikID.'/'.$icerik->randevuID; ?>" role="button" class="btn btn-primary ">Onayla</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }}?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>
</div>
