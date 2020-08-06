<aside class="main-sidebar sidebar-light-teal elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('assets'); ?>/dist/img/uzm.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-normal text-dark ">UZEM REZERVASYON</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">

        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                <!--anasayfa-->
                <li class="nav-item has-treeview ">
                    <a href="<?php echo base_url('user/home'); ?>" class="nav-link <?php echo (@$pageTree == 1) ? 'active':''; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Anasayfa
                        </p>
                    </a>
                </li>
                <!--                OPTİK İŞLEMLERİ-->
                <li class="nav-item has-treeview <?php echo (@$pageTree == 2) ? 'menu-open':''; ?>">
                    <a href="#" class="nav-link <?php echo (@$pageTree == 2) ? 'active':''; ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Randevu İşlemleri
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="<?php echo base_url('randevual');?>" class="nav-link <?php echo (@$page == 'randevuAl') ? 'active':''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Randevu Al</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('randevuiptal');?>" class="nav-link <?php echo (@$page == 'randevuIptal') ? 'active':''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Randevu İptal Et</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('gecmis');?>" class="nav-link <?php echo (@$page == 'randevuGecmis') ? 'active': ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Randevu Geçmişi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php $durum = 0;if ($durum == 1){ ?>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Ayarlar
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="<?php echo base_url('user/Ayarlar/account');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hesap Düzenle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('user/Ayarlar/sifre');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Şifre Değiştir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('user/Ayarlar/cikis');?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Çıkış</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</aside>