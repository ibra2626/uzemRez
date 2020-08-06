<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dashboard'); ?>" class="brand-link">
        <img src="<?php echo base_url('assets'); ?>/dist/img/uzm.png" alt="Uzem Rezervasyon" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light ">UZEM REZERVASYON</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!--                anasayfa-->
                <li class="nav-item has-treeview ">
                    <a href="<?php echo base_url('dashboard'); ?>" class="nav-link <?php echo (@$pageTree == 1) ? 'active':''; ?>">
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
                            Optik İşlemleri
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Optik_islemleri/tumTaramalar');?>" class="nav-link <?php echo (@$page == 'tumOptik') ? 'active':''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tüm Optikler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Optik_islemleri/okunanOptik');?>" class="nav-link <?php echo (@$page == 'okunanOptik') ? 'active':''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Taranan Optikler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Optik_islemleri/bekleyenOptik');?>" class="nav-link <?php echo (@$page == 'bekleyenOptik') ? 'active':''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bekleyen Optikler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    <!--                KULLANICI İŞLEMLERİ-->
                    <li class="nav-item has-treeview <?php echo (@$pageTree == '3') ? 'menu-open':''; ?>">
                    <a href="#" class="nav-link <?php echo (@$pageTree == '3') ? 'active':''; ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Kullanıcı İşlemleri
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Kullanici_islemleri/TumKullanicilar');?>" class="nav-link <?php echo (@$page == 'tumKullanici') ? 'active':''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tüm Kullanıcılar</p>
                            </a>
                        </li>
                        <?php if ($this->session->logged_in_admin == 1){  ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Kullanici_islemleri/KullaniciEkle')?>" class="nav-link <?php echo (@$page == 'ekle') ? 'active':''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kullanıcı Ekle</p>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </li>
                <?php if($this->session->logged_in_admin == 1){ ?>
                    <!--                AYARLAR-->

                    <li class="nav-item has-treeview <?php echo (@$pageTree == '4') ? 'menu-open':''; ?>">
                    <a href="#" class="nav-link <?php echo (@$pageTree == '4') ? 'active':''; ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Ayarlar
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Ayarlar_admin/TarihSaatAyarla');?>" class="nav-link <?php echo (@$page == 'tarihsaat') ? 'active':''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tarih/Saat Belirle</p>
                            </a>
                        </li>
<!--                        <li class="nav-item"><-->
<!--                            <a href="--><?php //echo base_url('Ayarlar_admin/MailDuzenle');?><!--" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Mail Düzenle</p>-->
<!--                            </a>-->
<!--                        </li>-->
                        <li class="nav-item">
                            <a href="<?php echo base_url('Ayarlar_admin/GenelAyar');?>" class="nav-link <?php echo (@$page == 'genel') ? 'active':''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Genel Düzenlemeler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="<?php echo base_url('Raporlamalar'); ?>" class="nav-link <?php echo (@$pageTree == '5') ? 'active':''; ?>">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                            Raporlamalar
                        </p>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</aside>