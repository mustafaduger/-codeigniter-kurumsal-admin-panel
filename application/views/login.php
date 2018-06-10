<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/');?>plugins/images/favicon.png">
    <title>Fosil Enerji</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/');?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/');?>plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url('assets/');?>css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/');?>css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url('assets/');?>css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
   
</head>

<body bgcolor="#E6E6FA">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">

        <div class="login-box">
            <div class="white-box">
            <?php echo $this->session->flashdata('login_error'); ?>
            <?php echo validation_errors(); ?>
            </div>

            <div class="white-box">
            

                <form class="form-horizontal form-material" id="loginform" action="<?php echo base_url('login/login_pro'); ?>" method="post">
                    <h3 class="box-title m-b-20">Giriş</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="Kullanıcı Adı">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Şifre">
                        </div>
                    </div>
                   
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Giriş Yap</button>
                        </div>
                    </div>
                  
                </form>
              
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/');?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/');?>bootstrap/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url('assets/');?>bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/');?>plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/');?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url('assets/');?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/');?>js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/');?>js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url('assets/');?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>










