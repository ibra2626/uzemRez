<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-warning" id="bekleyen">
                            <thead>
                                <tr>
                                    <th>Öğretim Görevlisi</th>
                                    <th>Birim</th>
                                    <th>Bölüm</th>
                                    <th>Randevu Tarihi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (@$vals as $data){ ?>
                                    <tr>
                                        <td><?php echo $data->user_ad." ".$data->user_soyad ?></td>
                                        <td><?php echo $data->birim_ad ?></td>
                                        <td><?php echo $data->bolum_ad ?></td>
                                        <td><?php echo $data->startDate?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>

        </div>
    </div>
</div>