<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <?php if(@$this->session->valid_error){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Uyarı!</h5>
                    <?php echo @$this->session->valid_error;?>
                </div>
            <?php }?>

            <div class="card card-secondary col-md-12">

                <div class="card-header">
                    <h5 class="font-weight-bolder">Kullanici Ekle</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('Kullanici_islemleri/manuelKullaniciEkle') ?>" method="post">
                        <div class="row justify-content-around">
                            <div class="form-group col-md-6">
                                <label for="isim" >İsim</label>
                                <input type="text"  class="form-control" name="ad" id="isim">

                                <label for="soyisim">Soyisim</label>
                                <input type="text"  class="form-control" name="soyad" id="soyisim">

                                <label for="mail" >Email</label>
                                <input type="email" class="form-control" name="mail" id="mail">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pass">Şifre</label>
                                <input type="password" class="form-control" name="sifre" id="pass">

                                <label for="sifreRe">Şifre Tekrar</label>
                                <input type="password"  class="form-control" name="sifreRe" id="passRe">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="rol">Rolü</label>
                                <select name="rol" id="rol" class="form-control" >
                                    <option value="seciniz" disabled selected hidden>Lütfen Seçim Yapınız</option>
                                    <option value="1" class="dropdown-item">Yönetici</option>
                                    <option value="2" class="">Öğrenci</option>
                                    <option value="3">Öğretim Görevlisi</option>
                                </select>

                            </div>
                            <div class="form-group  col-md-12" id="birimUnvan" hidden>
                                <label for="birim">Birim</label>
                                <select name="birim" class="form-control select2-purple" id="birim" style="width: 100%;">
                                    <option value="seciniz" disabled selected hidden>Lütfen Seçim Yapınız</option>
                                    <?php
                                    foreach ($dropdown_birim->icerik as $data) {
                                        echo '<option value="'.$data->birim_id.'">'.$data->birim_ad.'</option>';
                                    }
                                    ?>
                                </select>
                                <label for="unvan">Ünvan</label>
                                <select name="unvan" class="form-control select2-purple" id="unvan" style="width: 100%;">
                                    <option value="seciniz" disabled selected hidden>Lütfen Seçim Yapınız</option>
                                    <?php
                                    foreach ($dropdown_unvan->icerik as $data) {
                                        echo '<option value="'.$data->unvan_id.'">'.$data->unvan_ad.'</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="cold-md-3">
                                <button type="submit" class="btn btn-primary" name="olustur">Oluştur</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>