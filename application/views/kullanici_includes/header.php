
<nav class="main-header navbar navbar-expand navbar-custom-menu shadow-sm ">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars text-dark"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto ">

        <?php  if (isset($this->session->durum)){ ?>
        <div class="row justify-content-end">
            <div class="col-md-12 text-center ">
                <a role="button" class="btn btn-danger btn-block text-white" href="<?php echo base_url('user/home/changeUserToAdmin') ?>">Yönetici olarak devam et</a>
            </div>
        </div>
        <?php } ?>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('assets')?>/dist/img/user.png" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline text-dark"><?php echo $this->session->userdata('name').' '.$this->session->userdata('lastname') ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-teal">
                    <img src="<?php echo base_url('assets')?>/dist/img/user.png" class="img-circle elevation-2" alt="User Image">

                    <p>
                        <?php echo $this->session->userdata('name').' '.$this->session->userdata('lastname').' - '.$this->session->userdata('unvan_ad');?>
                        <small><?php echo $this->session->userdata('birim_ad'); ?></small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body ">
                    <div class="row ">
                        <div class="col-12 text-center">
                            <a href="#" class="btn" role="bt">Randevularım</a>
                        </div>
                    </div>
                </li>
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profil</a>
                    <a href="<?php echo base_url('Logout')?>" class="btn btn-default btn-flat float-right">Çıkış</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>