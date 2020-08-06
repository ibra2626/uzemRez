
<div class="content">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12">
                    <table id="tumOptikler" class="table table-hover table-responsive ">
                        <thead >
                        <tr class="text-center text-sm">
                            <th>Öğretim Görevlisi</th>
                            <th>Birim</th>
                            <th>Bölüm</th>
                            <th>Randevu Tarih/Saat</th>
                            <th>Optik Getirilme Tarihi</th>
                            <th>Optik Okunma Tarihi</th>
                            <th>Optik İade Tarihi</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="font-weight-normal text-sm">
                        <?php foreach ($vals as $data){?>
                            <tr>
                            <td><?php echo $data->user_ad." ".$data->user_soyad;?></td>
                            <td><?php echo $data->birim_ad;?></td>
                            <td><?php echo $data->bolum_ad;?></td>
                            <td><?php  tarihSaatDuzenle($data->startDate,$data->saat);?></td>
                            <td><?php tarihSaatDuzenle($data->teslimAlma_Tarih);?></td>
                            <td><?php tarihSaatDuzenle($data->okundu_Tarih);?></td>
                            <td><?php  tarihSaatDuzenle($data->finishDate);?></td>
                            <?php if ($data->durum == 5 AND $data->tamamlandi == 2) {?>
                                <td><p>Bu işlem kullanıcı tarafından iptal edildi.</p></td>
                            <?php }elseif($data->durum ==6 AND $data->tamamlandi == 3){?>
                                <td><p>Randevu geçtiği için iptal edildi.</p></td>
                                <?php }else{?>
                            <td style=''>
                                    <div class='btn-group'>
                                        <button type="button" class="btn btn-primary dropdown-toggle " data-toggle="dropdown">
                                            Aksiyonlar
                                        </button>
                                        <div class="dropdown-menu ">
                                            <a class='dropdown-item ' data-toggle='modal' data-target="#modal<?php echo $data->optikID; ?>" href="#">
                                                İşlem Yap
                                            </a>
                                            <a class='dropdown-item' data-toggle='modal' href="#" data-target="#modalMail<?php echo $data->optikID; ?>">Mail Gönder</a>
                                        </div>
                                    <button class='btn btn-warning text-black float-right' data-toggle="modal" data-target="#modalFile<?php echo $data->optikID;?>"><i class='fas fa-file-upload text-lg'></i></button>
                                        <?php if ($this->session->logged_in_admin == 1){  ?>
                                        <button class='btn btn-danger text-white float-right' data-toggle="modal" data-target="#modalSil<?php echo $data->optikID; ?>"><i class='fas fa-trash-alt'></i></button>
                                        <?php } ?>
                                    </div>
                            </td>
                                <?php } ?>
                            </tr>
                        <div class="modal fade" id="modal<?php echo $data->optikID; ?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <label>Optik Üzerinde Yapılacak İşlemler</label>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row justify-content-center">
                                         <?php if($data->durum == 1){ ?>
                                        <a role="button" class="btn btn-success text-white" href="<?php echo base_url('Optik_islemleri/optikAksiyon/'.$data->optikID.'/2/'.date('Y-m-d')); ?>">Optikler Teslim Alındı</a>
                                        <?php } ?>
                                        <?php if($data->durum == 2){?>
                                            <?php if ($this->session->logged_in_admin == 1){  ?>
                                                <a role="button" class="btn btn-danger mb-2 text-white" href="<?php echo base_url('Optik_islemleri/optikAksiyonSil/'.$data->optikID.'/0/'); ?>">Optikler Teslim Alınmadı</a>
                                                <?php }?>
                                        <a role="button" class="btn btn-success text-white" href="<?php echo base_url('Optik_islemleri/optikAksiyon/'.$data->optikID.'/3/'.date('Y-m-d')); ?>">Optikler Okundu</a>
                                         <?php }?>
                                         <?php if($data->durum == 3 ){ ?>
                                            <?php if ($this->session->logged_in_admin == 1){  ?>
                                                <a role="button" class="btn btn-danger mb-2 text-white" href="<?php echo base_url('Optik_islemleri/optikAksiyonSil/'.$data->optikID.'/2/'); ?>">Optikler Okunmadı</a>
                                            <?php }?>
                                        <a role="button" class="btn btn-success text-white" href="<?php echo base_url('Optik_islemleri/optikAksiyon/'.$data->optikID.'/4/'.date('Y-m-d')."/".$data->RandevuID); ?>">Optikler Teslim Edildi</a>
                                         <?php } ?>
                                            <?php if($data->durum == 4) {?>
                                                <?php if ($this->session->logged_in_admin == 1){  ?>
                                                    <a role="button" class="btn btn-danger text-white" href="<?php echo base_url('Optik_islemleri/optikAksiyonSil/'.$data->optikID.'/3/'); ?>">Optikler Teslim Edilmedi</a>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalMail<?php echo $data->optikID; ?>">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <label>Mail İşlemleri</label>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <b>Okundu Maili :</b>Optik okuma işlemleri tamamlandığında gönderilebilir.
                                        <br><b>Hatırlatma Maili :</b>Birimden hala alınmayan optiklerin hatırlatma mailidir.
                                    </div>
                                    <div class="modal-footer">
                                            <a href="<?php echo base_url('Optik_islemleri/hatirlatmaMaili/').$data->optikID;?>" role="button" class="btn btn-danger ">Hatırlatma Maili Gönder</a>
                                            <a href="<?php echo base_url('Optik_islemleri/okunduMailiGonder/').$data->optikID;?>" role="button" class="btn btn-primary ">Okundu Maili Gönder</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="modal fade" id="modalSil<?php echo $data->optikID; ?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-body pb-0">
                                                <div class="callout col-md-12 callout-warning ">
                                                    <h3><i class="fas text-warning fa-exclamation-triangle"></i></h3>
                                                    <h3 class="text-left"><?php if ($data->notYuklemeDurumu == 0){ ?>Optik ve üzerinde yapılan işlemler sistemden silinecektir.<br>Onaylıyor musunuz?<?php }?></h3>
                                                    <h6 class="text-danger text-sm "><p class="text-sm"><?php echo ($data->notYuklemeDurumu==0) ? "Eğer kullanıcıya ait başka bir optik okunma işlemi yoksa alınan randevu iptal olacaktır." : "Yüklü dosya bulunmaktadır.Silme işlemi yapılamıyor."?></h6>
                                                </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">x
                                            <button type="button" class="btn btn-default" data-dismiss="modal">İptal Et</button>
                                            <?php if ($data->notYuklemeDurumu == 0) {?><a href="<?php echo base_url('Optik_islemleri/optikSil/').md5($data->optikID).'/'.md5($data->RandevuID); ?>" role="button" class="btn btn-primary">Onayla</a><?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalFile<?php echo $data->optikID; ?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="callout col-md-12 callout-warning ">
                                                <h3 class="text-center"><i class="fas text-warning fa-exclamation-triangle"></i></h3>
                                                <h3 class="text-center">Not Yükleme Ekranı</h3>
                                                <h6 class="text-danger text-center text-sm "><p class="text-sm">Sadece excel veya pdf yükleyiniz.</h6>
                                            </div>
                                        </div>
                                        <div class="modal-body pb-0">
                                            <?php if($data->okundu_Tarih){ ?>
                                            <h2 class="text-danger"><?php echo ($data->notYuklemeDurumu == 1) ? "Daha Önceden Not Yüklenmiş":"" ?></h2>
                                            <?php foreach (@$yuklenenDosyaAdi AS $dosya){ if($dosya->optik_id == $data->optikID){?>
                                            Daha önce yüklenen dosya : <small class="text-success"><u><?php echo $dosya->dosya_ad;?></u></small>
                                            <?php }}?>
                                            <form action="<?php echo base_url("Optik_islemleri/notYukle/").$data->optikID."/".$data->hocaID ?>" class="mt-2" enctype="multipart/form-data" method="post" >
                                                <input class="btn btn-light btn-block rounded mb-1" id="dosya" name="file" type="file">
                                                <?php }else { ?>
                                                <h2 class="text-danger text-center">Not yüklemeden önce optik okundu bilgisini girmelisiniz.</h2>
                                                <?php } ?>
                                        </div>

                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">İptal Et</button>

                                            <?php  if ($data->notYuklemeDurumu == 1){ ?>
                                            <a role="button" class="btn btn-danger text-white" href="<?php echo base_url('Optik_islemleri/yukluDosyaSil/'.$data->optikID) ?>">Yüklü Dosyayı Sil</a>
                                            <?php } if ($data->okundu_Tarih){ ?>
                                            <button type="submit" class="btn btn-primary"> Yükle </button>
                                            <?php } ?>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>