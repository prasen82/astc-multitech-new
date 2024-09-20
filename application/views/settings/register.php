<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('../') ?>assets/images/favicon.ico">

        <!-- preloader css -->
        <link rel="stylesheet" href="<?php echo base_url('../') ?>assets/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url('../') ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url('../') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url('../') ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid bg-success p-0" style="background-image:url('<?php echo base_url('../') ?>assets/images/bg.jpg'); background-size:cover; background-repeat:no-repeat; background-position:center;">
                <div class="row g-0">
                    <div class="offset-md-3 col-xxl-5 col-lg-6 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column bg-light p-3 rounded h-100">
                                    <div class="mb-1 mb-md-1 text-center">
                                        <a href="index.html" class="d-block auth-logo">
                                            <img src="<?php echo str_replace('restaurant','',base_url('')) ?>assets/images/logo1.png" alt="" height="28"> <span class="logo-txt"><?= PROJECT_NAME ?></span>
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Register now to get free credit of &#8377; <?=$free?></p>
                                        </div>
                                        <form class="mt-4 pt-2" action="<?php echo base_url('login/register_submit') ?>" method="post" id="reg">
                                        <input type="text" name="free" value="<?=$free?>" hidden>
                                            <div class="mb-3">
                                                <label class="form-label">Business Name *</label>
                                                <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter business name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control" id="address" name="address" placeholder="Enter address"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">PIN</label>
                                                <input type="text" class="form-control" id="pin" name="pin" placeholder="Enter pin no">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">State</label>
                                                <select name="state" id="state" class="form-control">
                                                    <?php foreach($states as $st) { ?>
                                                        <option value="<?=$st['name']?>"><?=$st['name']?></option>
                                                    <?php } ?>                                                        
                                                    
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">GST No</label>
                                                <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter gst no">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Mobile no *</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter phone no" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email *</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email id" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Dealer Code (If any)</label>
                                                <input type="text" class="form-control" id="distributor_code" name="distributor_code" placeholder="Enter distribution code">
                                            </div>
                                            <div class="mb-3">
                                            <label class="form-label">Password *</label>                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" required>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Confirm Password *</label>
                                                    </div>                                                    
                                                </div>
                                                
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirmation password" aria-label="Password" aria-describedby="password-addon" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register Now</button>
                                            </div>
                                        </form>

                                        <div class="mt-1 text-center">
                                            <p class="text-muted mb-0">Don't have an account ? <a href="<?=base_url('')?>"
                                                    class="text-primary fw-semibold">Log In</a> </p>
                                        </div>
                                    </div>
                                    <div class="mt-1 mt-md-1 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> <?= PROJECT_NAME ?></p>
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


        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url('../') ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('../') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('../') ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url('../') ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url('../') ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url('../') ?>assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="<?php echo base_url('../') ?>assets/libs/pace-js/pace.min.js"></script>
        <!-- password addon init -->
        <script src="<?php echo base_url('../') ?>assets/js/pages/pass-addon.init.js"></script>

    </body>
    <script>
        register=function()
        {
            if($("#password").val()==$("#cpassword").val())
            {
                $("#loader").css("display","block");
                $("#reg").submit();
            }
            else{
                alert("Password and confirmation password mismatch.Please check.");
            }
        }
    </script>
</html>