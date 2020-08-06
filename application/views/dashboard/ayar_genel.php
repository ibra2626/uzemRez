<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card card-primary card-outline col-md-12">
                <div class="card-body">

                <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-black" id="tekilOlusturTab" data-toggle="pill" href="#tekilOlustur" role="tab" aria-controls="tekilOlustur" aria-selected="true">Unvan/Birim/Bölüm Oluştur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="topluYuklemeTab" data-toggle="pill" href="#topluYukleme" role="tab" aria-controls="topluYukleme" aria-selected="false">Unvan/Birim/Bölüm Toplu Yükle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="topluSilTab" data-toggle="pill" href="#topluSil" role="tab" aria-controls="topluSil" aria-selected="false">Unvan/Birim/Bölüm Toplu Sil</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-above-tabContent">
                    <div class="tab-pane fade show active" id="tekilOlustur" role="tabpanel" aria-labelledby="tekilOlusurTab">
                        <div class="row justify-content-center pt-3">
                            <div class="col-md-12">
                            <div class="card card-blue">
                                <div class="card-header">
                                    Birim Ekle
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Ayarlar_admin/birimEkle')?>" method="post">
                                        <p class="font-weight-bold">Birim ismini giriniz :</p> <input type="text" name="birimad" class="form-control col-md-12">
                                        <input type="submit" class="btn btn-primary mt-2 mr-5 float-right" value="Oluştur">
                                    </form>
                                </div>
                            </div>
                            <div class="card card-danger">
                                <div class="card-header">
                                    Birim Sil
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Ayarlar_admin/birimSil'); ?>" method="post">
                                        <p class="font-weight-bold">Birim Seçiniz</p>
                                        <select name="birimSil" id="birimSil" class="dropdown-header col-md-12">
                                            <option value="seciniz" disabled selected hidden>Birim Seçiniz</option>
                                            <?php
                                            foreach (@$dropdown_birim->icerik as $data) {
                                                echo '<option value="'.$data->birim_id.'">'.$data->birim_ad.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <input type="submit" class="btn btn-danger mt-2 mr-5 float-right" value="Sil">
                                    </form>
                                </div>
                            </div>
                            <div class="card card-success">
                                <div class="card-header">
                                    Bölüm Ekle
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Ayarlar_admin/bolumEkle')?>" method="post">
                                        <p class="font-weight-bold">Bölümün ekleneceği birimi seçiniz</p>
                                        <select name="bolumEkleBirimSec" id="bolumEkleBirimSec" class="dropdown-header col-md-12">
                                            <option value="seciniz" disabled selected hidden>Birim Seçiniz</option>
                                            <?php
                                            foreach (@$dropdown_birim->icerik as $data) {
                                                echo '<option value="'.$data->birim_id.'">'.$data->birim_ad.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <p class="font-weight-bold mt-1">Bölüm ismini giriniz :</p> <input type="text" name="bolumad" class="form-control col-md-12">
                                        <input type="submit" class="btn btn-success mt-2 mr-5 float-right" value="Ekle">
                                    </form>
                                </div>
                            </div>
                            <div class="card card-warning">
                                <div class="card-header">
                                    Bölüm Sil
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Ayarlar_admin/bolumSil')?>" method="post">
                                        <p class="font-weight-bold">Bölümün silineceği birimi seçiniz</p>
                                        <select name="bolumSilBirimSec" id="bolumSilBirimSec" class="dropdown-header col-md-12">
                                            <option value="seciniz" disabled selected hidden>Birim Seçiniz</option>
                                            <?php
                                            foreach ($dropdown_birim->icerik as $data) {
                                                echo '<option value="'.$data->birim_id.'">'.$data->birim_ad.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <p class="font-weight-bold mt-1">Silinecek Bölümü Seçiniz:</p>
                                        <select  tabindex="7" name="bolumSil" id="bolumSil" class="form-control mb-3">
                                            <option value="seciniz" disabled selected hidden>Bölüm Seçiniz</option>
                                        </select>
                                        <input type="submit" class="btn btn-danger mt-2 mr-5 float-right" value="Sil">

                                    </form>
                                </div>
                            </div>
                            <div class="card card-teal">
                                <div class="card-header">
                                    Ünvan Ekle
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Ayarlar_admin/unvanEkle')?>" method="post">
                                        <p class="font-weight-bold">Ünvan ismini giriniz :</p> <input type="text" name="unvanAd" class="form-control col-md-12">
                                        <input type="submit" class="btn btn-primary mt-2 mr-5 float-right" value="Oluştur">
                                    </form>
                                </div>
                            </div>
                            <div class="card card-secondary">
                                <div class="card-header">
                                    Ünvan Sil
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Ayarlar_admin/unvanSil'); ?>" method="post">
                                        <p class="font-weight-bold">Ünvan Seçiniz</p>
                                        <select name="unvanSil" id="unvanSil" class="dropdown-header col-md-12">
                                            <option value="seciniz" disabled selected hidden>Ünvan Seçiniz</option>
                                            <?php
                                            foreach (@$dropdown_unvan->icerik as $data) {
                                                echo '<option value="'.$data->unvan_id.'">'.$data->unvan_ad.'</option>';
                                            }
                                            ?>
                                        </select>
                                        <input type="submit" class="btn btn-danger mt-2 mr-5 float-right" value="Sil">
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="topluYukleme" role="tabpanel" aria-labelledby="topluYuklemeTab">
                        <div class="row justify-content-center pt-3">
                            <div class="card card-primary mr-5">
                                <div class="card-header">Toplu Birim Yükle</div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="importBirim" enctype="multipart/form-data">
                                            <input type="file" name="file" id="file" required accept=".xls, .xlsx">
                                            <input type="submit" name="import" class="btn btn-primary" value="Yükle">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-info">
                                <div class="card-header">Toplu Bölüm Yükle</div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="importBolum" enctype="multipart/form-data">
                                            <input type="file" name="fileBolum" id="fileBolum" required accept=".xls, .xlsx">
                                            <input type="submit" name="importBolum" class="btn btn-primary" value="Yükle">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-teal">
                                <div class="card-header">Toplu Ünvan Yükle</div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form action="" method="post" id="importUnvan" enctype="multipart/form-data">
                                            <input type="file" name="fileUnvan" id="fileUnvan" required accept=".xls, .xlsx">
                                            <input type="submit" name="importUnvan" class="btn btn-primary" value="Yükle">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="topluSil" role="tabpanel" aria-labelledby="topluSilTab">
                        <div class="row justify-content-center pt-3">
                            <div class="card card-primary col-md-6 mr-5">
                                <div class="card-body col-md-12">
                                    <table class="table table-responsive-md">
                                        <tr>
                                            <td><h5>Birimleri Sil</h5></td>
                                            <td>
                                                <a class="btn btn-danger btn-sm " data-toggle="modal" data-target="#modal-topluBirimSil" href="#">
                                                    <i class="fas fa-trash">
                                                        Sil
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h5>Bolumleri Sil</h5></td>
                                            <td>
                                                <a class="btn btn-danger btn-sm " data-toggle="modal" data-target="#modal-topluBolumSil" href="#">
                                                    <i class="fas fa-trash">
                                                        Sil
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h5>Ünvanları Sil</h5></td>
                                            <td>
                                                <a class="btn btn-danger btn-sm " data-toggle="modal" data-target="#modal-topluUnvanSil" href="#">
                                                    <i class="fas fa-trash">
                                                        Sil
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal fade" style="height: 100%;width: 100%;pointer-events:none;" id="loading">
                <div class="modal-dialog" style="height: 100%;width: 100%;">
                    <div class="text-center text-white pt-lg-5">
                        <div class="spinner-border h1 mt-5" style="" id="loadd" role="status" ></div>
                        <h3 class="fas fa-check" id="check" hidden ></h3>
                        <h3 class="text-white" ><p id="yaziLoading">Yükleme İşlemi Devam Ediyor....</p></h3>
                        <input type="button" class="btn btn-success" id="onaylaButton" hidden value="Tamam">

                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-topluBirimSil">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>BİRİMLERİ SİL</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Tüm birimler silinecek onaylıyor musunuz?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                            <a href="<?php echo base_url('Ayarlar_admin/TopluSil/birim') ?>" role="button" class="btn btn-primary">Onayla</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal-topluBolumSil">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>ÜNVANLARI SİL</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Tüm bölümler silinecek onaylıyor musunuz?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                            <a href="<?php echo base_url('Ayarlar_admin/TopluSil/bolum') ?>" role="button" class="btn btn-primary">Onayla</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-topluUnvanSil">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>ÜNVANLARI SİL</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Tüm ünvanlar silinecek onaylıyor musunuz?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                            <a href="<?php echo base_url('Ayarlar_admin/TopluSil/unvan') ?>" role="button" class="btn btn-primary">Onayla</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>