
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" >

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                
                <a href="#" onclick="go('home')">

                    <i data-feather="home"></i>
                    <span data-key="t-dashboard">Dashboard</span>
                </a>
                </li>
            <?php //if($this->session->userdata('multitech_role_id')==1 || $this->session->userdata('multitech_role_id')==5) { ?>
                <li>
                    <a href="javascript:void(0)" class="has-arrow">
                    <i data-feather="cpu" style="font-size:12pt;"></i>
                        <span data-key="t-ui-elements">Master</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <?php if($this->session->userdata('multitech_role_id')<3 ||  $this->session->userdata('multitech_role_id')==5) { ?>

                        <li><a href="#" onclick="go('driver')" data-key="t-lightbox">Driver</a></li>
                        <li><a href="#" onclick="go('conductor')" data-key="t-lightbox">Conductor</a></li>
                        <?php } ?>
                        <li><a href="#" onclick="go('technician')" data-key="t-lightbox">Technician</a></li>
                        <?php if($this->session->userdata('multitech_role_id')==1 || $this->session->userdata('multitech_role_id')==5) { ?>
                        <li><a href="#" onclick="go('staff')" data-key="t-lightbox">Staff</a></li>
                        <li><a href="#" onclick="go('agency_a')" data-key="t-lightbox">Agency</a></li>

                        <?php if( $this->session->userdata('multitech_role_id')!=5) { ?>

                        <li><a href="#" onclick="go('route')" data-key="t-lightbox">Route Setup</a></li>
                        <?php } }?>

                        <?php if( $this->session->userdata('multitech_role_id')!=5) { ?>
                        <li><a href="#" onclick="go('maintanance')" data-key="t-lightbox">Maintenance Work</a></li>
                        <?php if($this->session->userdata('multitech_role_id')<3) { ?>
                        <li><a href="#" onclick="go('bus')" data-key="t-lightbox">Bus</a></li>
                        <?php } }?>
    
                    </ul>
                  
                </li>
                        <?php //} ?>

            <?php if($this->session->userdata('multitech_role_id')==1 || $this->session->userdata('multitech_role_id')==5) { ?>
                <li>
                
                <a href="#" onclick="go('payment')">

                    <i class="fa fa-rupee-sign" style="font-size:14pt;"></i>
                    <span data-key="t-dashboard">Payment</span>
                </a>
                </li>

                <li>
                
                <a href="#" onclick="go('rebate')">

                    <i class="fa fa-hand-point-up" style="font-size:14pt;"></i>
                    <span data-key="t-dashboard">Rebate</span>
                </a>
                </li>

                <?php } ?>
                <?php 
                
                
                if($this->session->userdata('multitech_role_id')<3) { ?>
                
                <li>
                    <a href="javascript:void(0)" class="has-arrow">
                    <i class="fa fa-bus" style="font-size:12pt;"></i>
                        <span data-key="t-ui-elements">Logsheet</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                     <li><a href="#" onclick="go('departure')" >Departure</a></li>
                     <li><a href="#" onclick="go('closing')" >Closing</a></li>

                    </ul>
                </li>

               

                <?php } ?>

                <?php 
                
                if($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5) { ?>
                

                <li>
                    <a href="javascript:void(0)" class="has-arrow">
                    <i class="fa fa-money-bill" style="font-size:12pt;"></i>
                        <span data-key="t-ui-elements">Salary Bill</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <li><a href="#" onclick="go('draftbilldriver')" >Draft Bill Of Drivers</a></li>
                    <li><a href="#" onclick="go('draftbillconductor')" >Draft Bill Of Conductors</a></li>
                     <li><a href="#" onclick="go('finalbilldriver')" >Final Bill Of Drivers</a></li>
                     <li><a href="#" onclick="go('finalbillconductor')" >Final Bill Of Conductors</a></li>
                  

                    </ul>
                </li>

                

                <?php } ?>

                <?php 
                
                if($this->session->userdata('multitech_role_id')==1 || $this->session->userdata('multitech_role_id')==5) { ?>
                

                <li>
                    <a href="javascript:void(0)" class="has-arrow">
                    <i class="fa fa-money-bill" style="font-size:12pt;"></i>
                        <span data-key="t-ui-elements">Salary Bill</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                     <li><a href="#" onclick="go('draftbilldriver')" >Draft Bill Of Drivers</a></li>
                     <li><a href="#" onclick="go('draftbillconductor')" >Draft Bill Of Conductors</a></li>
                     <li><a href="#" onclick="go('draftbillstaff')" >Draft Bill Of Staffs</a></li>

                     <li><a href="#" onclick="go('finalbilldriver')" >Final Bill Of Drivers</a></li>
                     <li><a href="#" onclick="go('finalbillconductor')" >Final Bill Of Conductors</a></li>
                     <li><a href="#" onclick="go('finalbillstaff')" >Final Bill Of Staffs</a></li>


                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" class="has-arrow">
                    <i class="fa fa-snowflake" style="font-size:12pt;"></i>
                        <span data-key="t-ui-elements">PF / ESIC Statement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                     <li><a href="#" onclick="go('pfstatementdriver')" >Statement of Drivers</a></li>
                     <li><a href="#" onclick="go('pfstatementconductor')" >Statement of Conductors</a></li>
                     <li><a href="#" onclick="go('pfstatementstaff')" >Statement of Staffs</a></li>

                    </ul>
                </li>

                <li hidden>
                    <a href="javascript:void(0)" class="has-arrow">
                    <i class="fa fa-hospital" style="font-size:12pt;"></i>
                        <span data-key="t-ui-elements">ESIC Statement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                     <li><a href="#" onclick="go('esicstatementdriver')" >Statement of Drivers</a></li>
                     <li><a href="#" onclick="go('esicstatementconductor')" >Statement of Conductors</a></li>
                     <li><a href="#" onclick="go('esicstatementconductor')" >Statement of Staffs</a></li>

                    </ul>
                </li>

                <?php } ?>


                <?php 
                
                if($this->session->userdata('multitech_role_id')<3) { ?>
                

                <li>
                    <a href="javascript:void(0)" class="has-arrow">
                    <i class="fa fa-book" style="font-size:12pt;"></i>
                        <span data-key="t-ui-elements">Penalty Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                     <li><a href="#" onclick="go('driver_penalty')" >Driver Peanlty</a></li>
                     <li><a href="#" onclick="go('conductor_penalty')" >Conductor Peanlty</a></li>
                     <li><a href="#" onclick="go('agency_penalty')" >Agency Penalty</a></li>


                    </ul>
                </li>

                <?php } ?>
                
                <?php 
                $ismobile=(is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"))?1:0);
                // if($this->session->userdata('multitech_role_id')!=3 && $this->session->userdata('multitech_role_id')!=4 && $ismobile==false) { ?>
                 
                 <?php 
                $ismobile=(is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"))?1:0);
                if($this->session->userdata('multitech_role_id')!=3 && $this->session->userdata('multitech_role_id')!=4) { ?><li>
                    <a href="javascript:void(0)" class="has-arrow">
                        <i data-feather="activity"></i>
                        <span data-key="t-ui-elements">Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <?php 
                
                        if($this->session->userdata('multitech_role_id')<3) { ?>
                
                         <li><a href="#" onclick="go('logsheet')" data-key="t-lightbox">Logsheet Report</a></li>
                         <li><a href="#" onclick="go('transactions')" data-key="t-lightbox">Transaction History</a></li>
                         <li><a href="#" onclick="go('rebate_report')" data-key="t-lightbox">Rebate Report</a></li>
                    
                        <?php } ?>
                        <?php 
                
                      if($this->session->userdata('multitech_role_id')==1 || $this->session->userdata('multitech_role_id')==5) { ?>
                
                         <li><a href="#" onclick="go('staffs')" data-key="t-range-slider">Staffs</a></li>

                        <li><a href="#" onclick="go('buses')" data-key="t-range-slider">Buses</a></li>

                        <li><a href="#" onclick="go('technicians')" data-key="t-range-slider">Technician</a></li>
                        <?php } ?>
                        <li><a href="#" onclick="go('drivers')" data-key="t-range-slider">Drivers</a></li>
                        <li><a href="#" onclick="go('conductors')" data-key="t-range-slider">Conductors</a></li>
                        <?php if($this->session->userdata('multitech_role_id')<3) { ?>
                        
                        <li><a href="#" onclick="go('bus_left')" data-key="t-range-slider">Bus Left</a></li>
                        <li><a href="#" onclick="go('bus_arrived')" data-key="t-range-slider">Bus Arrived</a></li>

                       
                        <li><a href="#" onclick="go('bus_collection')" data-key="t-range-slider">Today's Collection</a></li>
                        <li><a href="#" onclick="go('collection_statement')" data-key="t-range-slider">Collection Statement</a></li>
                        
                        <!-- <li><a href="#" onclick="go('conductor_collection')" data-key="t-range-slider">Conductor Collection</a></li> -->
                        <li><a href="#" onclick="go('conductor_wise_collection')" data-key="t-range-slider">Conductor Wise Collection</a></li>
                        <li><a href="#" onclick="go('driver_wise_collection')" data-key="t-range-slider">Driver Wise Collection</a></li>
                        <li><a href="#" onclick="go('vehicle_wise_collection')" data-key="t-range-slider">Vehicle Wise Collection</a></li>
                        <?php } ?>
                     
                        <li><a href="#" onclick="go('driver_attendance')" data-key="t-range-slider">Driver Attendance</a></li>
                        <li><a href="#" onclick="go('conductor_attendance')" data-key="t-range-slider">Conductor Attendance</a></li>
                        <li><a href="#" onclick="go('licence_expired_driver')" data-key="t-range-slider">Driver's Licence Expired</a></li>
                        <li><a href="#" onclick="go('licence_expired_conductor')" data-key="t-range-slider">Conductor's Licence Expired</a></li>
                  

                       


                    </ul>
                  
                </li>
                <?php } ?>    
                
               
                <li>
                    <a href="javascript:void(0)" class="has-arrow">
                        <i data-feather="settings"></i>
                        <span data-key="t-ui-elements">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        
                    <?php if($this->session->userdata('multitech_role_id')==1) { ?>

                        <li><a href="#" onclick="go('user')" data-key="t-lightbox">Users</a></li>
                        <?php }?>
                        <li><a href="#" onclick="go('change_password')" data-key="t-range-slider">Change Password</a></li>

                        <!-- <li><a href="<?php echo base_url('all-products') ?>" data-key="t-range-slider">Logo Upload</a></li> -->
                    </ul>
                  
                </li>
               
                
                <li>

                    <a href="#" onclick="go('logout')" >

                        <i data-feather="power"></i>
                        <span data-key="t-ui-elements">Logout</span>
                    </a>
                  
                </li>

                


                

            </ul>

            <!-- <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="<?php echo base_url('../') ?>assets/images/giftbox.png" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                        <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                        <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
