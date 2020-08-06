<?php
$tarihKontrolArr = array();
foreach ($dbActiveDay->rows as $data){
    array_push($tarihKontrolArr,$data->tarih);
}
$newTarihKontrolArr = array_unique($tarihKontrolArr);
?>
<div class="content">
    <div class="container-fluid">
        <section class="content">
            <form action="<?php echo base_url('Ayarlar_admin/TarihSaatSec'); ?>" method="post">
                <div class="card card-default border border-primary">
            <!--TARİH SEÇİM -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Kullanıcının Seçim Yapabileceği Tarih Aralığı</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                              </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="reservation" name="selected_dateRange">
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- // TARİH SEÇİM -->
                <!-- SAAT SEÇİM -->
                        <div class="row justify-content-center ">
                            <!--BAŞLANGIÇ SAATİ-->
                            <div class="col-md-4">
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Başlangıç Saati:</label>
                                        <div class="input-group date" id="timepicker" data-target-input="nearest" >
                                            <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="startTime"/>
                                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                <div class="input-group-text">
                                                    <i class="far fa-clock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // BAŞLANGIÇ SAATİ-->
                            <!-- BİTİŞ SAATİ-->
                            <div class="col-md-4">
                                <div class="bootstrap-timepicker">
                                    <div class="form-group ">
                                        <label>Bitiş Saati:</label>

                                        <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#timepicker2" name="finishTime"/>
                                            <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                                <div class="input-group-text">
                                                    <i class="far fa-clock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //BİTİŞ SAATİ-->

                        </div>
                <!-- // SAAT SEÇİM -->
                <!-- TARİH/SAAT GÖNDERME BUTONU -->
                            <input type="submit" class="btn btn-group btn-primary mt-1 float-right" value="Oluştur">
                <!-- // TARİH/SAAT GÖNDERME BUTONU -->
                    </div>
                </div>
            </form>
        <!-- AKTİF RANDEVU GÜNLERİ TABLO -->
            <div class="row justify-content-center">
                <div class="card col-8 border border-primary rounded">
                <div class="card-header">
                    <label>Aktif Randevu Günleri</label>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects text-center" id="randevu">
                        <thead>
                        <tr>
                            <th>
                                Tarih
                            </th>
                            <th style="max-height: 10%;width: 45%;" >
                                Saat
                            </th>
                            <th>

                            </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($newTarihKontrolArr as $data){
                            ?>
                                <tr>
                                    <td>
                                        <span class=""><?php $date = new DateTime($data); echo $date->format('d-m-Y');?></span>
                                    </td>
                                    <td>
                                        <?php foreach ($dbActiveHours->rows as $hour){ if ($hour->tarih == $data){
                                            if (empty($hour->userID)){?>
                                        <span  class="btn btn-light  mb-2 shadow-sm float-left"  role="button">
                                             <i class="fa fa-clock border rounded-circle p-1 float-left">  </i><?php echo $hour->saat;?>
                                                 <a href="<?php echo base_url('Ayarlar_admin/TekSaatSil/').$data.'/'.$hour->saat; ?>" title="Sil"><i class="fas fa-minus-circle text-danger float-right ml-1" ></i>
                                                 </a>
                                        </span>
                                        <?php } else { ?>
                                        <span  class="btn btn-danger  mb-2 shadow-sm float-left"  role="button">
                                             <i class="fa fa-clock border rounded-circle p-1 float-left">  </i><?php echo $hour->saat;?>
                                                 <a  href="<?php echo base_url('Ayarlar_admin/TekSaatSil/').$data.'/'.$hour->saat; ?>" title="Sil"><i class="fas fa-minus-circle text-white float-right ml-1" ></i>
                                                 </a>
                                        </span>

                                        <?php }}} ?>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-primary dropdown-toggle " data-toggle="dropdown">
                                                    Aksiyonlar
                                                </button>
                                                <div class="dropdown-menu ">
                                                    <a class="dropdown-item " data-toggle="modal" data-target="#modalSil<?php echo $data;?>"  href="#">
                                                        Tarihi ve Saatleri Sil
                                                    </a>
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#modalSaatEkle<?php echo $data;?>" href="#">Saat Ekle</a>
                                                </div>
                                            </div>
                                        </div>


                                    </td>
                            </tr>

                            <!--TEK SAAT SİLME MODAL-->

                            <!-- // TEK SAAT SİLME MODAL-->

                            <!-- 'SİL' BUTONU MODAL-->
                                <div class="modal fade" id="modalSil<?php echo $data;?>">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <label>Aktif randevu tarihini silmek ister misiniz?</label>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="small">Bir tarih silindiğinde o günün tüm randevu saatleri silinir.</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                                <a href="<?php echo base_url('Ayarlar_admin/TarihSil/').$data; ?>" role="button" class="btn btn-primary">Onayla</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalSaatEkle<?php echo $data;?>">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <label class="font-weight-normal text-danger">Randevu oluşturulabilecek saati giriniz!</label>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="TekSaatEkle" method="post">
                                                <input type="text" name ="tarih" value="<?php echo $data?>" hidden>
                                                <div class="modal-body">
                                                    <input type="time" name="tekSaat">
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                                    <input type="submit" class="btn btn-group btn-primary mt-1 float-right" value="Oluştur">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- // 'SİL' BUTONU MODAL-->

                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!-- // AKTİF RANDEVU GÜNLERİ TABLO -->
        </section>
    </div>
</div>
