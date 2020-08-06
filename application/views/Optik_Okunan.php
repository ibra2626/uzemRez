<!doctype html>
<html lang="en">
<?php $this->load->view('includes/head'); ?>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    <!-- Navbar ÜST MENÜ-->
    <?php $this->load->view('includes/header'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container SOL MENÜ-->
    <?php $this->load->view('includes/left_sidebar',array('pageTree'=>'2','page'=>'okunanOptik'));?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!--PAGE HEADER -->
        <?php $this->load->view('includes/content_header',array('baslik'=>'Okunan Optikler')); ?>
        <?php $this->load->view('dashboard/optik_okunan'); ?>
    </div>


    <!-- /.content-wrapper -->


    <!-- Content Footer -->
    <?php $this->load->view('includes/content_footer'); ?>
</div>

<?php $this->load->view('includes/footer');?>
</body>
</html>