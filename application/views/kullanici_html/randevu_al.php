<?php
$tarihKontrolArr = array();
foreach ($randevu_tablo->rows as $data){
    array_push($tarihKontrolArr,$data->tarih);
}
$newTarihKontrolArr = array_unique($tarihKontrolArr);
?>
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


<div class="content ">
    <div class="container-fluid">
<?php if (count($newTarihKontrolArr) == 0){ ?>

<div class="row justify-content-center">

    <div class="card card-danger">
        <div class="card-header">
            Randevu Sistemi Kapalı
        </div>
        <div class="card-body">
            <h4>Şuan birimimiz tarafından randevu verilememektedir.Lütfen daha sonra deneyiniz.</h4>
        </div>
    </div>
</div>
<?php }else{?>

        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-text-calender"></i>
                            İşlem Sırasındaki Optikler
                        </h3>
                    </div>
                    <div class="card-body border border-danger">

                        <?php  if (count($aktifRandevu) == 0){?>
                        <div class="callout callout-danger border-top border-danger">
                            <p class="font-weight-light"> <b>Devam eden işleminiz bulunmamaktadır.</b></p>
                        </div>
                        <?php }else{ ?>
                        <?php foreach ($aktifRandevu as $vals){if($vals->tamamlandi ==0){?>
                        <div class="callout callout-danger border-top border-danger">
                            <p class="font-weight-light"> <b><?php $date = new DateTime($vals->startDate);echo turkceTarih($date->format('d-F-Y l')).'</b>'.' <b>-</b> '.$vals->birim_ad.' <b>-</b> '.$vals->bolum_ad ?></p>
                        </div>
                        <?php }}} ?>

                    </div>
                </div>
            </div>
        </div>
        <form class="form-group" action="" id="ajax_form"  method="post">
            <div class="row justify-content-center" id="randevuHidden">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header p-2 text-center">
                            <button type="button" class="btn btn-primary float-left" id="geri">Önceki</button>
                            <button type="button" class="btn btn-primary float-right" id="ileri">Sonraki</button>
                            <div class="row justify-content-around">
                                <?php foreach ($newTarihKontrolArr as $data){?>
                                    <div class="randevu col-md-12">
                                        <div class="row justify-content-center ml-1 mr-1">
                                            <div class="col-md-12 mb-3 border shadow-sm rounded-pill">
                                                <button class="btn btn-block font-weight-bold "><u><?php $date = new DateTime($data); echo turkceTarih($date->format('d-F-Y l'));?></u></button>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="col-md-12 border shadow-sm rounded-sm" style="min-height: 100px;min-width: 300px;">
                                                    <table >
                                                        <tbody>
                                                        <tr>
                                                            <?php $sayac = 0; foreach ($dbActiveHours->rows as $hour){ if ($hour->tarih == $data){?>
                                                            <?php $sayac++; ?>
                                                            <?php if($sayac <=5){?>
                                                                <td>
                                                                    <button type="button" onclick="saatSec('<?php echo $hour->saat.$hour->tarih; ?>','<?php echo $hour->saat;?>','<?php echo $hour->tarih;?>')" id="<?php echo $hour->saat.$hour->tarih; ?>" class="btn <?php echo ($hour->userID) ? "btn-danger" : "btn-outline-success"; ?> btn-xs ml-2 mb-3 mt-2" <?php echo ($hour->userID) ? "disabled" : "enabled"; ?>><?php echo $hour->saat; ?></button>
                                                                </td>
                                                            <?php } if($sayac==5){?>
                                                        </tr>
                                                        <tr>
                                                            <?php if($sayac==5){echo '';}?>
                                                            <?php } if ($sayac>=6 AND $sayac<=10){?>
                                                                <td>
                                                                    <button type="button" onclick="saatSec('<?php echo $hour->saat.$hour->tarih; ?>','<?php echo $hour->saat;?>','<?php echo $hour->tarih;?>')" id="<?php echo $hour->saat.$hour->tarih; ?>" class="btn <?php echo ($hour->userID) ? "btn-danger" : "btn-outline-success"; ?> btn-xs ml-2 mb-3 mt-2" <?php echo ($hour->userID) ? "disabled" : "enabled"; ?>><?php echo $hour->saat; ?></button>

                                                                </td>
                                                            <?php } if($sayac==10){?>
                                                        </tr>
                                                        <tr>
                                                            <?php if($sayac==10){echo '';}?>
                                                            <?php } if ($sayac>=11 AND $sayac<=15){?>
                                                                <td>
                                                                    <button onclick="saatSec('<?php echo $hour->saat; ?>')" id="<?php echo $hour->saat; ?>" class="btn btn-block btn-outline-success btn-xs ml-2 mb-4"><?php echo $hour->saat;?></button>
                                                                </td>
                                                            <?php } if($sayac==15){?>
                                                        </tr>
                                                        <tr>
                                                            <?php if($sayac==15){echo '';}?>
                                                            <?php } if ($sayac>=16 AND $sayac<=20){?>
                                                            <td>
                                                                <button onclick="saatSec('<?php echo $hour->saat; ?>')" id="<?php echo $hour->saat; ?>" class="btn btn-block btn-outline-success btn-xs ml-2 mb-4"><?php echo $hour->saat;?></button>
                                                            </td>
                                                        </tr>
                                                        <?php }}} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        <div class="row justify-content-center">
            <div class="card card-info col-md-5">
                <div class="card-header">
                    <h3 class="card-title text-center">Randevu Oluştur</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6 float-left">
                                <input type="text" tabindex="1" class="form-control mb-3" value=""  id="optikSayisi" name ="optik_sayisi" placeholder="Optik Sayısı" >
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cevapAnahtari">
                                    <label class="custom-control-label" for="cevapAnahtari">Cevap Anahtarı Mevcut</label>
                                </div>
                            </div>
                            <div class="col-md-6 float-left">
                                <select name="birim" id="birim" class="form-control mb-3">
                                    <option value="seciniz" disabled selected hidden>Birim Seçiniz</option>
                                    <?php
                                    foreach ($dropdown_birim->icerik as $data) {
                                        echo '<option value="'.$data->birim_id.'">'.$data->birim_ad.'</option>';
                                    }
                                    ?>
                                </select>
                                <select  tabindex="7" name="bolum" id="bolum" class="form-control mb-3">
                                    <option value="seciniz" disabled selected hidden>Bölüm Seçiniz</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success" onclick="" id="optikEkle">Ekle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" id="multipleRow">
            <div class="card-body p-0 col-md-6 bg-white mb-3 ml-0 rounded-lg " id="multipleRandevu">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th>Birim</th>
                        <th>Bölüm</th>
                        <th>Optik Sayısı</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="liste">
                    </tbody>
                </table>
            </div>
        </div>
            <div class="row justify-content-center">
                <div class="col-md-3 "><button type="button" class="btn btn-primary btn-block" id="kaydetRandevu">RANDEVU OLUŞTUR</button></div>
                <div id="setTarih" hidden></div>
                <div id="setSaat" hidden></div>
            </div>
        </form>
<?php }?>

        <div class="modal fade" style="height: 100%;width: 100%;pointer-events:none;" id="modalLoading">
            <div class="modal-dialog" style="height: 100%;width: 100%;">
                <div class="text-center text-white pt-lg-5">
                    <div class="spinner-border h1 mt-5" id="spinner" style="" role="status"></div>
                    <h3 class="text-white" id="RandevuLoadingPar">Randevu oluşturuluyor...</h3>
                    <h3 class="fas fa-check text-lg font-weight-bold" id="check" hidden ></h3>
                    <h3 class="text-white bg-green rounded-pill" id="RandevuOlustu" hidden>Randevunuz oluşturulmuştur.<br>Lütfen cevap anahtarını hazırlamayı unutmayınız!</h3>
                    <button class="btn btn-primary btn-lg" hidden id="onayla">Tamam</button>
                </div>
            </div>
        </div>

    </div>
</div>
