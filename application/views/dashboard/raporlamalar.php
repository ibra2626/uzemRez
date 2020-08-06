<div class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="card card-dark card-tabs col-md-12 card-outline-tabs p-0 border border-dark">
                <div class="card-header p-1 ">
                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active rounded-pill mb-1" id="genelRaporTab" data-toggle="pill" href="#genelRapor" role="tab" aria-controls="genelRapor" aria-selected="true">Son Alınan Randevular</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill ml-1 mb-1" id="bolumBazliRaporTab" data-toggle="pill" href="#bolumBazliRapor" role="tab" aria-controls="bolumBazliRapor" aria-selected="false">Bölüm Bazlı Raporlama</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-content-above-tabContent">
                        <div class="tab-pane fade show active" id="genelRapor" role="tabpanel" aria-labelledby="genelRaporTab">
                            <div class="card col-md-12 card-default border border-secondary mt-3">
                                <!--TARİH SEÇİM -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="<?php echo base_url('Raporlamalar/raporlamaPdf');?>" method="post">
                                                <div class="form-group">
                                                    <label>Rapor Alınacak Tarih Aralığı</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                  </span>
                                                        </div>
                                                        <input type="text" class="form-control float-right" id="reservation" name="selected_dateRange">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-success" id="raporCek">Rapor Oluştur</button>
                                                    <button type="submit" class="btn btn-primary ml-1" id="raporPdf" formtarget="_blank">Pdf Olarak İndir</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Toplam Okunan Optik</span>
                                            <h4 class="info-box-number" id="ToplamOptik">0</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="cold-md-4">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbs-up"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Toplam Bekleyen Optik</span>
                                            <h4 class="info-box-number" id="BekleyenOptik">0</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 border border-secondary">
                                    <div class="card-body p-0">
                                        <table class="table table-condensed" id="">
                                            <thead class="">
                                            <tr>
                                                <th>Randevu Alınan Tarih</th>
                                                <th>Öğretim Görevlisi</th>
                                                <th>Birim</th>
                                                <th>Bölüm</th>
                                                <th>Durum</th>
                                            </tr>
                                            </thead>
                                            <tbody id="liste">
                                            <tr class='clickable-row' data-toggle="modal" data-target="#editModal" style="cursor:pointer">
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div id="modals"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bolumBazliRapor" role="tabpanel" aria-labelledby="bolumBazliRaporTab">
                            <div class="card col-md-12 card-default border border-secondary mt-3">
                                <!--TARİH SEÇİM -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="<?php echo base_url('Raporlamalar/raporlamaPdf');?>" method="post">
                                                <div class="form-group">
                                                    <label>Rapor Alınacak Tarih Aralığı</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                  </span>
                                                        </div>
                                                        <input type="text" class="form-control float-right" id="reservationBolumBazli" name="selected_dateRange">
                                                    </div>
                                                    <div class="cold md-12 mt-2 mb-0 pb-0">
                                                        <p class="font-weight-bold">Birim Seçiniz</p>
                                                        <select name="BirimSec" id="BirimSec" class="dropdown-header col-md-12">
                                                            <option value="seciniz" disabled selected hidden>Birim Seçiniz</option>
                                                            <?php
                                                            foreach (@$dropdown_birim->icerik as $data) {
                                                                echo '<option value="'.$data->birim_id.'">'.$data->birim_ad.'</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                        <p class="font-weight-bold mt-1">Bölümü Seçiniz:</p>
                                                        <select   name="bolumGetir" id="bolumGetir" class="form-control mb-3">
                                                            <option value="seciniz" disabled selected hidden>Bölüm Seçiniz</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row justify-content-center">
                                                    <button type="button" class="btn btn-success" id="raporCekBolumBazli">Rapor Oluştur</button>
                                                    <button type="submit" class="btn btn-primary ml-1" id="raporPdfBolumBazli" formtarget="_blank">Pdf Olarak İndir</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Toplam Okunan Optik</span>
                                            <h4 class="info-box-number" id="ToplamOptikBolum">0</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="cold-md-4">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbs-up"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Toplam Bekleyen Optik</span>
                                            <h4 class="info-box-number" id="BekleyenOptikBolum">0</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 border border-secondary">
                                    <div class="card-body p-0">
                                        <table class="table table-condensed" id="">
                                            <thead class="">
                                            <tr>
                                                <th>Randevu Alınan Tarih</th>
                                                <th>Öğretim Görevlisi</th>
                                                <th>Birim</th>
                                                <th>Bölüm</th>
                                                <th>Durum</th>
                                            </tr>
                                            </thead>
                                            <tbody id="listeBolumBazli">
                                            <tr class='clickable-row' data-toggle="modal" data-target="#editModal" style="cursor:pointer">
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div id="modalsBolumBazli"></div>
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