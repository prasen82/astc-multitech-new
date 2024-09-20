<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

    <!-- preloader css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
    * {
        overflow-x: hidden;
    }

    .form-control {
        height: 50px;
        font-size: 18px;
        border-radius: 10px;
    }

    .auth-full-page-content {
        min-height: 0px !important;
    }
    </style>
</head>
<body">
    <!-- <body data-layout="horizontal"> -->
    <div class="auth-page" >
        <div class="container " >
            <div class="row mt-5" >
               
                <div class="offset-md-4 col-xxl-3 col-lg-4 col-md-5 mt-4 ">
                    <div class="auth-full-page-content d-flex p-3">
                    

                        <div class="col-lg-8" style="margin-left:auto;margin-right:auto;">
                            <div class="d-flex flex-column rounded">
                                <div class="mb-1 mb-md-1 text-center">
                                    <a href="#" class="d-block auth-logo">                           
                                        <img src="<?php echo base_url() ?>assets/images/logo.png" alt=""
                                            height="100"> 
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                <div class="text-center text-danger">
                                    <strong>E-Bus Management System ! </strong>
                                            <!-- <h2 class="mb-1">Restaura Qube</h2> -->
                                            <!-- <p class="text-muted mt-2">Let's dive into this digital adventure together and make it a fantastic experience! </p> -->
                                        </div>
                                    <form id="login" class="mt-4 pt-2" action="<?php echo base_url('login/processLogin') ?>"
                                        method="post">
                                        <div class="mb-3">
                                            <label class="form-label">User Id</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Enter mobile no">
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <label class="form-label">Password</label>
                                                </div>
                                                <!-- <div class="flex-shrink-0">
                                                    <div class="">
                                                        <a href="#" class="text-muted" onclick="forgot_password(this);">Forgot password?</a>
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Enter password" aria-label="Password"
                                                    aria-describedby="password-addon">
                                            </div>
                                        </div>
                                        <div class="text-center pb-3">
                                        <span class="text-danger mb-2"><?=$this->session->flashdata('danger')?></span>

                                            <button class="btn btn-primary waves-effect waves-light rounded-pill"
                                                type="submit" style="font-size:20px; padding:10px 60px" >Login</button>
                                        </div>
                                    </form>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>
    <!-- <form id="go" class="mt-4 pt-2" action="<?php echo base_url('login/processLogin') ?>" > </form> -->



    <style>
  .loading {
  position: fixed;
  z-index: 999;
   /* height: 2em;
  width: 2em; */
  /* overflow: show; */
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0; 
  right: 0;
  width:100%;
  height:90%;
  /* background-color:white; */
  text-align:center;
  display:none;
}

</style>
<div class="loading" id="loader">
<div class="spinner-border text-success " style="margin-top:60%" role="status">
  <span class="sr-only" >Loading...</span>
</div>
</div>

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url() ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="<?php echo base_url() ?>assets/libs/pace-js/pace.min.js"></script>
    <!-- password addon init -->
    <script src="<?php echo base_url() ?>assets/js/pages/pass-addon.init.js"></script>
    <!-- Sweet alert -->
<script src="<?php echo str_replace('restaurant/','', base_url()); ?>assets/sweet_alert/sweetalert2.all.min.js"></script>
<link href="<?php echo str_replace('restaurant/','', base_url()); ?>assets/sweet_alert/sweetalert2.min.css" rel="stylesheet">
<style>
    .swal-wide{
    width:80%;
    margin-left:auto;
    margin-right:auto;
    font-size:9pt;
}
</style>
<script>
           
           
// login=function()
// {
//     $("#loader").css("display","block");
//     $("#login").submit();
// }
forgot_password=function(x)
{

    if($("#username").val()=="")
    {
        Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: "Please enter registered mobile no",
                            showConfirmButton: false,
                            timer: 2000
                            });

                            // navigator.vibrate(200);  /**Mobile vibration */
        return;
    }
    $("#loader").css("display","block");
    $(x).attr("disabled",true);
    var d={
        "mobile_no":$("#username").val()
    }
    $.ajax({
        url:"<?=base_url('forgot_password')?>",
        type:"POST",
        dataType:"JSON",
        data:d,
        success:function(data)
        {
            // alert(data);
            if(data=="xx") var title="Invalid mobile no";
            
            else var title="Account details sent your mail id.";
            Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title:title,
                            showConfirmButton: false,
                            timer: 2500
                            });

                            navigator.vibrate(200);  /**Mobile vibration */
            $("#loader").css("display","none");
            $(x).attr("disabled",false);
        },
        error:function(data)
        {
            // alert(data);
          

            Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: "Account details sent your mail id.",
                            showConfirmButton: false,
                            timer: 2500
                            });

                            navigator.vibrate(200);  /**Mobile vibration */
                            $("#loader").css("display","none");
        }
    })
}
</script>
</body>

</html>