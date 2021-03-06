<!doctype html>
<html lang="en">
<?php $this->load->view('kullanici_includes/head'); ?>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar ÜST MENÜ-->
    <?php $this->load->view('kullanici_includes/header'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container SOL MENÜ-->
    <?php $this->load->view('kullanici_includes/left_sidebar',array('pageTree'=>'1')); ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!--PAGE HEADER -->
        <?php $this->load->view('kullanici_includes/content_header',array('baslik'=>'Anasayfa')); ?>
        <?php $this->load->view('kullanici_html/main_content'); ?>
    </div>


    <!-- /.content-wrapper -->


    <!-- Content Footer -->
    <?php $this->load->view('kullanici_includes/content_footer'); ?>
</div>

<?php $this->load->view('kullanici_includes/footer');?>
</body>
</html>