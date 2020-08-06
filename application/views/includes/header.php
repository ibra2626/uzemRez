<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('assets')?>/dist/img/user.png" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline text-white"><?php echo $this->session->userdata('name').' '.$this->session->userdata('lastname') ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-secondary">
                    <img src="<?php echo base_url('assets')?>/dist/img/user.png" class="img-circle elevation-2" alt="User Image">

                    <p>
                        <?php echo $this->session->userdata('name').' '.$this->session->userdata('lastname');?>
                    </p>
                    Rolü : <?php echo $this->session->userdata('yetki'); ?>
                </li>
                <!-- Menu Body -->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profil</a>
                    <a href="<?php echo base_url('Logout')?>" class="btn btn-default btn-flat float-right">Çıkış</a>
                </li>
            </ul>
        </li>

    </ul>
</nav>