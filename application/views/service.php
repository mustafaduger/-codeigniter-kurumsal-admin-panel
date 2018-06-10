<!DOCTYPE html>
<html lang="tr">
<head>
   <?php $this->load->view('include/head.php'); ?>
   <?php $this->load->view('service/include/page_style.php'); ?>
</head>
<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
         <?php $this->load->view('include/topbar'); ?>
        <!-- Left navbar-->
        <?php $this->load->view('include/sidebar'); ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php $this->load->view('service/include/breadcumb'); ?>
                <?php $this->load->view('service/maincontent'); ?>
             </div>
            <!-- /.container-fluid -->
            <?php  $this->load->view('include/footer');?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
   <?php $this->load->view('include/script'); ?>
   <?php $this->load->view('service/include/page_script.php'); ?>
</body>

</html>
