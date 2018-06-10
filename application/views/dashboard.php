<!DOCTYPE html>
<html lang="tr">
<head>
   <?php $this->load->view('include/head.php'); ?>
</head>
<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
         <?php $this->load->view('include/topbar'); ?>
        <!-- Left navbar-header end -->
        <?php $this->load->view('include/sidebar'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php $this->load->view('dashboard/breadcumb'); ?>
                <?php $this->load->view('dashboard/maincontent'); ?>
             </div>
            <!-- /.container-fluid -->
            <?php  $this->load->view('include/footer');?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
   <?php $this->load->view('include/script'); ?>
</body>

</html>
