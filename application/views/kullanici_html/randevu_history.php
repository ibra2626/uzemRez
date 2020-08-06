<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        Randevu Geçmişiniz
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Tarih</th>
                                <th>Saat</th>
                                <th>Durum</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach (@$gecmis as $detay){ ?>
                            <tr>
                                <td><?php echo $detay->tarih;?></td>
                                <td><?php echo $detay->saat;?></td>
                                <?php if ($detay->durum == 0){?>
                                    <td class="text-primary">İşlemde..</td>
                                <?php }elseif ($detay->durum == 1){?>
                                    <td class="text-danger">Randevu tarihini geçirdiğiniz için iptal edilmiştir.</td>
                                <?php }elseif($detay->durum == 2){?>
                                    <td class="text-cyan">Okuma Aşamasında</td>
                                <?php }elseif($detay->durum == 3){?>
                                <td class="text-success">İşlemler Tamamlandı.</td>
                                <?php }?>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>