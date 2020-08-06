<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($vals as $data){ ?>
                <div class="col-md-3 ">
                <div class="card card-widget widget-user border border-danger">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-danger">
                        <h3 class="widget-user-username"><?php echo $data->user_ad." ".$data->user_soyad;?></h3>
                        <h5 class="widget-user-desc"><?php echo $data->unvan_ad ?></h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="<?php echo base_url("assets"); ?>/dist/img/user8-128x128.jpg" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row ">
                            <div class="col-md-12">
                                <label>Aktif/Deaktif : </label>
                                <input type="checkbox" data-url="<?php echo base_url('Kullanici_islemleri/KL_DeaktifGuncelle/'.$data->user_id);?>" class="js-switch" />
                            </div>
                            <div class="col-sm-12 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">BİRİM</h5>
                                    <span class="description-text"><?php echo $data->birim_ad;?></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>

           <?php  } ?>

        </div>

    </div>
</div>