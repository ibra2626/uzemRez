
<div class="content">
    <div class="container-fluid">
        <section class="content">

            <!-- Default box -->

            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects table-responsive-sm text-sm text-center" id="kullanici">
                        <thead class="">
                        <tr>
                            <th style="width: 20%">
                                İsim Soyisim
                            </th>
                            <th >
                                Ünvan
                            </th>
                            <th>
                                Birim
                            </th>
                            <th style="width: 8%" class="text-center">
                                Durum
                            </th>
                            <th ">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($data->vals as $data) { ?>
                            <tr>
                                <td>
                                    <a>
                                        <?php echo $data->user_ad." ".$data->user_soyad; ?>
                                    </a>
                                </td>
                                <td>
                                    <a>
                                        <?php echo $data->unvan_ad; ?>
                                    </a>
                                </td>
                                <td>
                                    <a>
                                        <?php echo $data->birim_ad; ?>
                                    </a>
                                </td>
                                    <td class="project-state">
                                        <div class="col-md-12">
                                            <label>Dekatif/Aktif</label>
                                            <input type="checkbox" <?php echo ($data->user_durum==1) ? "checked":"" ?> data-url="<?php echo base_url('Kullanici_islemleri/KL_DeaktifGuncelle/'.$data->user_id);?>" class="js-switch" />
                                        </div>
                                    </td>
                                <td class="project-actions text-right">
                                    <div class="btn-group">
<!--                                    <a class="btn btn-info btn-sm" href="#">-->
<!--                                        <i class="fas fa-user-edit">-->
<!--                                        </i>-->
<!--                                    </a>-->

                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('Kullanici_islemleri/changeUser/').$data->user_accountId; ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                        <a class="btn btn-danger btn-sm " data-toggle="modal" data-target="#modal-sil" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                        <div class="modal fade" id="modal-sil">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Kullanıcıyı silmek ister misiniz?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                                        <a href="<?php echo base_url('Kullanici_islemleri/KL_sil/').$data->user_id ?>" role="button" class="btn btn-primary">Onayla</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>

    </div>
</div>