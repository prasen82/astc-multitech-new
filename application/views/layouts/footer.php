</div>
<!-- END layout-wrapper -->
 <style>
    .mobile-bottom-nav{
        position:fixed;
        bottom:0px;
        left:0px;
        right:0px;
        z-index:1000000;
        transform: translateZ(0);
        display:flex;	
        height:65px;
        /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
        background-color:#fff;
        border-radius:5px;
    }
	
	.mobile-bottom-nav__item{
		flex-grow:1;
		text-align:center;
		font-size:11px;
		display:flex;
		flex-direction:column;
		justify-content:center;
	}

    .mobile-bottom-nav__item a{
        color : #000;
    }

	.mobile-bottom-nav__item-content .active{
		color:teal;
	}

	.mobile-bottom-nav__item-content{ 
		display:flex;
		flex-direction:column;		
	}

    .mobile-bottom-nav__item-content .mdi{
        font-size : 20px;
    }
</style>

<style>
  .loading {
  position: absolute;
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
<?php 
    if(is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")))
    { 
        $top=60;
    }
    else
    {
        $top=20;
    }        
        ?>
<div class="loading" id="loader">

<div class="spinner-border text-danger " style="margin-top:<?=$top?>%" role="status">
  <span class="sr-only" >Loading...</span>
</div>
</div>

<?php
            $page_name = $this->uri->segment(1);   
            if(is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")))
            { 
        ?>
<!-- <nav class="mobile-bottom-nav">
	
    <div class="mobile-bottom-nav__item ">

        
        <a href="#" onclick="go('home')" class="active">

            <div class="mobile-bottom-nav__item-content">
                <i class="mdi mdi-home <?=($page_name=='home'?'active':'')?>"></i>
            </div>
          
            <span style="<?=($page_name=='home'?'color:teal':'')?>">Home</span>
            
        </a>
	</div>
	<div class="mobile-bottom-nav__item">

   
         <a href="#" onclick="go('bench')">


            <div class="mobile-bottom-nav__item-content">
                <i class="mdi mdi-seat <?=($page_name=='bench'?'active':'')?>"></i>
            </div>          
            <span style="<?=($page_name=='bench'?'color:teal':'')?>">Bench</span>
            
        </a>
	</div>
	<div class="mobile-bottom-nav__item">

      
        <a href="#" onclick="go('qr')">

            <div class="mobile-bottom-nav__item-content">
                <i class="mdi mdi-qrcode-scan <?=($page_name=='qr'?'active':'')?>"></i>              
                <span style="<?=($page_name=='qr'?'color:teal':'')?>">QR</span>
            </div>
        </a>		
	</div>
	
	<div class="mobile-bottom-nav__item">

       
        <a href="#" onclick="go('items')">

            <div class="mobile-bottom-nav__item-content">
                <i class="mdi mdi-cannabis <?=($page_name=='all-products'?'active':'')?>"></i>
            </div>
           
            <span style="<?=($page_name=='all-products'?'color:teal':'')?>">Items</span>
        </a>
	</div>
   
   
    <div class="mobile-bottom-nav__item">
        <a href="#" onclick="go('profile');">
            <div class="mobile-bottom-nav__item-content">
                <i class="mdi mdi-account <?=($page_name=='profile'?'active':'')?>"></i>
            </div>
          
            <span style="<?=($page_name=='profile'?'color:teal':'')?>">Profile</span>
        </a>
	</div>
  
</nav> -->

<?php } ?>
<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center p-3">

            <h5 class="m-0 me-2">Theme Customizer</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="m-0" />

        <div class="p-4">
            <h6 class="mb-3">Layout</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">
                <label class="form-check-label" for="layout-vertical">Vertical</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout" id="layout-horizontal" value="horizontal">
                <label class="form-check-label" for="layout-horizontal">Horizontal</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">
                <label class="form-check-label" for="layout-mode-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                <label class="form-check-label" for="layout-mode-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild" value="fuild"
                    onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                <label class="form-check-label" for="layout-width-fuild">Fluid</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed"
                    onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                <label class="form-check-label" for="layout-width-boxed">Boxed</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed"
                    value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                <label class="form-check-label" for="layout-position-fixed">Fixed</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable"
                    value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light"
                    onchange="document.body.setAttribute('data-topbar', 'light')">
                <label class="form-check-label" for="topbar-color-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark"
                    onchange="document.body.setAttribute('data-topbar', 'dark')">
                <label class="form-check-label" for="topbar-color-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
                    value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                <label class="form-check-label" for="sidebar-size-default">Default</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact"
                    value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                <label class="form-check-label" for="sidebar-size-compact">Compact</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small"
                    onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light"
                    onchange="document.body.setAttribute('data-sidebar', 'light')">
                <label class="form-check-label" for="sidebar-color-light">Light</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark"
                    onchange="document.body.setAttribute('data-sidebar', 'dark')">
                <label class="form-check-label" for="sidebar-color-dark">Dark</label>
            </div>
            <div class="form-check sidebar-setting">
                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand" value="brand"
                    onchange="document.body.setAttribute('data-sidebar', 'brand')">
                <label class="form-check-label" for="sidebar-color-brand">Brand</label>
            </div>

            <h6 class="mt-4 mb-3 pt-2">Direction</h6>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr"
                    value="ltr">
                <label class="form-check-label" for="layout-direction-ltr">LTR</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl"
                    value="rtl">
                <label class="form-check-label" for="layout-direction-rtl">RTL</label>
            </div>

        </div>

    </div> <!-- end slimscroll-menu-->
</div>

<footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> © Multitech Engineering E-Bus Management
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        <!-- Design & Develop by <a href="#!" class="text-decoration-underline">Restaura Qube & Team</a> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<form id="home" action="<?php echo base_url('home') ?>" method="POST"></form>
<form id="staff" action="<?php echo base_url('staff') ?>" method="POST"></form>

<form id="driver" action="<?php echo base_url('driver') ?>" method="POST"></form>
<form id="technician" action="<?php echo base_url('technician') ?>" method="POST"></form>
<form id="conductor" action="<?php echo base_url('conductor') ?>" method="POST"></form>
<form id="agency_a" action="<?php echo base_url('agency_a') ?>" method="POST"></form>


<form id="route" action="<?php echo base_url('route') ?>" method="POST"></form>
<form id="maintanance" action="<?php echo base_url('maintanance') ?>" method="POST"></form>
<form id="bus" action="<?php echo base_url('bus') ?>" method="POST"></form>
<form id="user" action="<?php echo base_url('users') ?>" method="POST"></form>
<form id="departure" action="<?php echo base_url('departure') ?>" method="POST"></form>
<form id="closing" action="<?php echo base_url('closing') ?>" method="POST"></form>

<!-- Reports -->
<form id="logsheet" action="<?php echo base_url('logsheet') ?>" method="POST"></form>
<form id="transactions" action="<?php echo base_url('transactions') ?>" method="POST"></form>
<form id="rebate_report" action="<?php echo base_url('rebate_report') ?>" method="POST"></form>

<form id="licence_expired_driver" action="<?php echo base_url('licence_expired_driver') ?>" method="POST"></form>
<form id="licence_expired_conductor" action="<?php echo base_url('licence_expired_conductor') ?>" method="POST"></form>







<form id="buses" action="<?php echo base_url('buses') ?>" method="POST"></form>

<form id="staffs" action="<?php echo base_url('staffs') ?>" method="POST"></form>

<form id="drivers" action="<?php echo base_url('drivers') ?>" method="POST"></form>
<form id="technicians" action="<?php echo base_url('technicians') ?>" method="POST"></form>
<form id="conductors" action="<?php echo base_url('conductors') ?>" method="POST"></form>
<form id="bus_left" action="<?php echo base_url('bus_left') ?>" method="POST"></form>
<form id="bus_arrived" action="<?php echo base_url('bus_arrived') ?>" method="POST"></form>
<form id="bus_collection" action="<?php echo base_url('bus_collection') ?>" method="POST"></form>

<form id="collection_statement" action="<?php echo base_url('collection_statement') ?>" method="POST"></form>
<form id="conductor_collection" action="<?php echo base_url('conductor_collection') ?>" method="POST"></form>
<form id="conductor_wise_collection" action="<?php echo base_url('conductor_wise_collection') ?>" method="POST"></form>
<form id="driver_wise_collection" action="<?php echo base_url('driver_wise_collection') ?>" method="POST"></form>
<form id="vehicle_wise_collection" action="<?php echo base_url('vehicle_wise_collection') ?>" method="POST"></form>

<form id="driver_attendance" action="<?php echo base_url('driver_attendance') ?>" method="POST"></form>
<form id="conductor_attendance" action="<?php echo base_url('conductor_attendance') ?>" method="POST"></form>











<form id="category" action="<?php echo base_url('product-category') ?>" method="POST"></form>
<form id="daybook" action="<?php echo base_url('daybook') ?>" method="POST"></form>
<form id="statement" action="<?php echo base_url('statement') ?>" method="POST"></form>
<form id="sale" action="<?php echo base_url('sale/product') ?>" method="POST"></form>

<form id="change_password" action="<?php echo base_url('password/reset') ?>" method="POST"></form>
<form id="logout" action="<?php echo base_url('logout') ?>" method="POST"></form>

<!-- salery bill -->
<form id="draftbilldriver" action="<?php echo base_url('draft_bill_driver') ?>" method="POST"></form>
<form id="draftbillconductor" action="<?php echo base_url('draft_bill_conductor') ?>" method="POST"></form>
<form id="draftbillstaff" action="<?php echo base_url('draft_bill_staff') ?>" method="POST"></form>

<form id="finalbilldriver" action="<?php echo base_url('final_bill_driver') ?>" method="POST"></form>
<form id="finalbillconductor" action="<?php echo base_url('final_bill_conductor') ?>" method="POST"></form>
<form id="finalbillstaff" action="<?php echo base_url('final_bill_staff') ?>" method="POST"></form>

<form id="pfstatementdriver" action="<?php echo base_url('pf_statement_driver') ?>" method="POST"></form>
<form id="pfstatementconductor" action="<?php echo base_url('pf_statement_conductor') ?>" method="POST"></form>
<form id="pfstatementstaff" action="<?php echo base_url('pf_statement_staff') ?>" method="POST"></form>



<form id="esicstatementdriver" action="<?php echo base_url('esic_statement_driver') ?>" method="POST"></form>
<form id="esicstatementconductor" action="<?php echo base_url('esic_statement_conductor') ?>" method="POST"></form>
<form id="esicstatementstaff" action="<?php echo base_url('esic_statement_staff') ?>" method="POST"></form>

<form id="payment" action="<?php echo base_url('advance_payment') ?>" method="POST"></form>
<form id="rebate" action="<?php echo base_url('rebate') ?>" method="POST"></form>
<form id="receipt" action="<?php echo base_url('receipt') ?>" method="POST"></form>

<!-- penalty -->
<form id="driver_penalty" action="<?php echo base_url('driver_penalty') ?>" method="POST"></form>
<form id="conductor_penalty" action="<?php echo base_url('conductor_penalty') ?>" method="POST"></form>
<form id="agency_penalty" action="<?php echo base_url('agency_penalty') ?>" method="POST"></form>








<!-- JAVASCRIPT -->
<script src="<?php base_url() ?>assets/libs/jquery/jquery.min.js"></script>


<script src="<?php base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?php base_url() ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?php base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="<?php base_url() ?>assets/libs/pace-js/pace.min.js"></script>

<!-- apexcharts -->
<script src="<?php base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="<?php base_url() ?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
</script>
<script
    src="<?php base_url() ?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
</script>

<script
    src="<?php base_url() ?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
</script>

<!-- dashboard init -->
<script src="<?php base_url() ?>assets/js/pages/dashboard.init.js"></script>
<!-- Required datatable js -->
<script src="<?php base_url() ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php base_url() ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php base_url() ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php base_url() ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php base_url() ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?php base_url() ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php base_url() ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php base_url() ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php base_url() ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php base_url() ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>



<!-- Responsive examples -->
<script src="<?php base_url() ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js">
</script>
<script src="<?php base_url() ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
</script>

<!-- Datatable init js -->
<script src="<?php base_url() ?>assets/js/pages/datatables.init.js"></script>

<script src="<?php base_url() ?>assets/js/app.js"></script>
<!-- QR Code -->
<script src="<?php base_url(); ?>assets/qr/qrcode.min.js" type="text/javascript"></script>
<!-- Sweet alert -->
<script src="<?php base_url(); ?>assets/sweet_alert/sweetalert2.all.min.js"></script>
<link href="<?php base_url(); ?>assets/sweet_alert/sweetalert2.min.css" rel="stylesheet">


<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css"> -->



<script>
         

         $(document).ready(function() {
            var ismobile=<?= (is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"))?1:0)?>;
           
            if(ismobile==0)
            {
                $('#kt_table_1').DataTable( {
                              dom: 'fBtilp',      
                              buttons: [
                                  'print','copy','excel','csv','pdf'                                  
                              ]
                          } );
            }

           else {
                $('#kt_table_1').DataTable( {
                            
                             
                          } );
                         

					
            }
            
            $(".dataTables_length").css({ "margin-top" :"10px" });
                          $(".dataTables_length").css({ "float" :"left" });

                          $(".dataTables_paginate").css({ "float" :"right" });


                          $(".dataTables_filter").css({ "float" :"left" });

                         

                          $(".dt-buttons").css({ "float" :"right" });
                          $(".dt-buttons").css({ "margin-bottom" :"10px" });     


                      } );

        go=function(x)
        {
                  
                $("#loader").css('display','block');
              
                $("#"+x).submit();
             

         
        }

    
</script>
</body>

</html>