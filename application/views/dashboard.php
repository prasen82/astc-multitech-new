<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                

 <?php if($this->session->userdata('multitech_role_id')!=5) { ?>
                <div class="col-xl-3 col-md-6">
                <a href="<?=($total_bus==0?'#':base_url('buses'))?>">
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Bus</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="<?=$total_bus?>">0</span>
                                    </h4>
                                </div>

                                <div class="col-3">
                                    <i class="fa fa-bus  text-success" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                
                                <span class="font-size-11 text-success" >Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
</a>
                </div>
              
<?php } ?>
 <?php if($this->session->userdata('multitech_role_id')==1 || $this->session->userdata('multitech_role_id')==5) { ?>
                <div class="col-xl-3 col-md-6">
                <a href="<?=($driver==0?'#':base_url('drivers'))?>">
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Drivers</span>
                                    <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?=$driver?>">0</span>

                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-users  text-danger" style="font-size:20pt;"></i>

                                </div>
                            </div>
                            <div class="text-nowrap">
                                
                                <span class="font-size-11 text-danger" >Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
</a>
                </div><!-- end col-->
                

                <div class="col-xl-3 col-md-6">
                <a href="<?=($conductor==0?'#':base_url('conductors'))?>">
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Conductors</span>
                                    <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?=$conductor?>">0</span>

                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-users text-warning" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                
                                <span class="font-size-11 text-warning" >Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
</a>
                </div>

                <div class="col-xl-3 col-md-6">
                <a href="<?=($staff==0?'#':base_url('staffs'))?>">
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Main Staffs</span>
                                    <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?=$staff?>">0</span>

                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-users text-primary" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                
                                <span class="font-size-11 text-primary" >Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
</a>
                </div>

                <?php } ?>

                <div class="col-xl-3 col-md-6">
                <a href="<?=($technician==0?'#':base_url('technicians'))?>">
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Maintenance Staff</span>
                                    <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?=$technician?>">0</span>

                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-user-graduate text-info" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <span class="font-size-11 text-info">Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
</a>
                </div>

                <?php if($this->session->userdata('multitech_role_id')!=5) { ?>

                    <div class="col-xl-3 col-md-6">
                     <a href="<?=($maintanance==0?'#':base_url('under-maintanance'))?>">
                    

                        <div class="card card-h-100">
                            
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Bus Under Maintenance</span>
                                        <h4 class="mb-3">
                                        <span class="counter-value" data-target="<?=$maintanance?>">0</span>

                                        </h4>
                                    </div>
                                    <div class="col-3">
                                    <i class="fa fa-bug text-primary" style="font-size:20pt;"></i>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <span class="font-size-11 text-primary">Click to view details</span>
                            </div>
                             
                            </div><!-- end card body -->
                        </div>
                        </a>
                    </div>
               
<?php } ?>
                
                    <?php if($this->session->userdata('multitech_role_id')<3) { ?>
                <div class="col-xl-3 col-md-6">
                    <a href="<?=($left==0?'#':base_url('bus_left'))?>">
                        
                        <div class="card card-h-100">
                            
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Bus Left</span>
                                        <h4 class="mb-3">
                                        <span class="counter-value" data-target="<?=$left?>">0</span>

                                        </h4>
                                    </div>
                                    <div class="col-3">
                                    <i class="fa fa-truck text-primary" style="font-size:20pt;"></i>
                                    </div>
                                </div>
                                <div class="text-nowrap">
                                    <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                    <span class="font-size-11 text-primary">Click to view details</span>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </a>
                </div>

               

                <div class="col-xl-3 col-md-6">
                <a href="<?=($arrive==0?'#':base_url('bus_arrived'))?>">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Bus Arrived</span>
                                    <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?=$arrive?>">0</span>

                                    </h4>
                                </div>
                                <div class="col-3">
                                    
                                <i class="fa fa-street-view text-primary" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <span class="font-size-11 text-primary">Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
</a>
                </div>

                <div class="col-xl-3 col-md-6">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3 ">Phone Pay Collection</span>
                                    <h4 class="mb-3 mt-2">
                                       &#8377; <span class="counter-value" data-target="<?=$phonepay?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-rupee-sign text-primary" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <!-- <span class="font-size-11 text-primary">Click to view details</span> -->
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3 ">Cash Collection</span>
                                    <h4 class="mb-3 mt-2">
                                       &#8377; <span class="counter-value" data-target="<?=$cash_collection?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-rupee-sign text-primary" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <!-- <span class="font-size-11 text-primary">Click to view details</span> -->
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                <a href="<?=($collections==0?'#':base_url('bus_collection'))?>">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3">Today's Collection</span>
                                    <h4 class="mb-3">
                                       &#8377; <span class="counter-value" data-target="<?=$collections?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-database text-primary" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <span class="font-size-11 text-primary">Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
                    </a>
                </div>
              

               

            <!-- </div> -->
            

            <div class="col-xl-3 col-md-6">
                      
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3 ">Average Collection</span>
                                    <h4 class="mb-3 mt-2">
                                       &#8377; <span class="counter-value" data-target="<?=$average?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-cubes text-primary" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <!-- <span class="font-size-11 text-primary">Click to view details</span> -->
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div>


          
            
              
<!-- </a> -->


            <div class="col-xl-3 col-md-6">
                <a href="<?=($panelty==0?'#':base_url('penalty'))?>">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3">Today's Pending</span>
                                    <h4 class="mb-3">
                                       &#8377; <span class="counter-value" data-target="<?=$panelty?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-bolt text-primary" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <span class="font-size-11 text-primary">Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
                    </a>
            </div>

            <div class="col-xl-3 col-md-6">
                <a href="<?=($panelty_collection==0?'#':base_url('penalty_collection'))?>">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3">Today's Pending Collection</span>
                                    <h4 class="mb-3">
                                       &#8377; <span class="counter-value" data-target="<?=$panelty_collection?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-bolt text-primary" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <span class="font-size-11 text-primary">Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
                    </a>
            </div>

           
            <div class="col-xl-3 col-md-6">
                <!-- <a href="<?=($panelty_collection==0?'#':base_url('penalty_collection'))?>"> -->
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3">Today's Ticket Count</span>
                                    <h4 class="mb-3">
                                       <span class="counter-value" data-target="<?=$ticket_count?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-bolt text-primary" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                                <!-- <span class="badge bg-soft-success text-success">Click to view details</span> -->
                                <!-- <span class="font-size-11 text-primary">Click to view details</span> -->
                            </div>
                        </div><!-- end card body -->
                    </div>
                    <!-- </a> -->
            </div>

            <div class="col-xl-3 col-md-6">
                <a href="<?=($driver_license_expired==0?'#':base_url('licence_expired_driver'))?>">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3">Driver's Licence Expired</span>
                                    <h4 class="mb-3">
                                       <span class="counter-value" data-target="<?=$driver_license_expired?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-id-card text-danger" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                               
                                <span class="font-size-11 text-primary">Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
                    </a>
            </div>
                
            <div class="col-xl-3 col-md-6">
                <a href="<?=($conductor_license_expired==0?'#':base_url('licence_expired_conductor'))?>">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3">Conductor's Licence Expired</span>
                                    <h4 class="mb-3">
                                       <span class="counter-value" data-target="<?=$conductor_license_expired?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-id-card text-danger" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                               
                                <span class="font-size-11 text-primary">Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
                    </a>
            </div>


            <div class="col-xl-3 col-md-6">
                <a href="<?=($driver_license_expiring==0?'#':base_url('licence_expiring_driver'))?>">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3">Driver's Licence Expiring in 15 days</span>
                                    <h4 class="mb-3">
                                       <span class="counter-value" data-target="<?=$driver_license_expiring?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-id-card text-warning" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                               
                                <span class="font-size-11 text-primary">Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
                    </a>
            </div>

            <div class="col-xl-3 col-md-6">
                <a href="<?=($conductor_license_expiring==0?'#':base_url('licence_expiring_conductor'))?>">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <span class="text-muted mb-3">Conductor's Licence Expiring in 15 days</span>
                                    <h4 class="mb-3">
                                       <span class="counter-value" data-target="<?=$conductor_license_expiring?>">0</span>
                                    </h4>
                                </div>
                                <div class="col-3">
                                <i class="fa fa-id-card text-warning" style="font-size:20pt;"></i>
                                </div>
                            </div>
                            <div class="text-nowrap">
                               
                                <span class="font-size-11 text-primary">Click to view details</span>
                            </div>
                        </div><!-- end card body -->
                    </div>
                    </a>
            </div>


            </div>
            </div>

<?php } ?>
            <!-- <div class="row">
                <div class="col-xl-5">
                    
                    <div class="card card-h-100">
                        
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center mb-4">
                                <h5 class="card-title me-2">Wallet Balance</h5>
                                <div class="ms-auto">
                                    <div>
                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                            ALL
                                        </button>
                                        <button type="button" class="btn btn-soft-primary btn-sm">
                                            1M
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                            6M
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                            1Y
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-sm">
                                    <div id="wallet-balance" data-colors='["#777aca", "#5156be", "#a8aada"]'
                                        class="apex-charts"></div>
                                </div>
                                <div class="col-sm align-self-center">
                                    <div class="mt-4 mt-sm-0">
                                        <div>
                                            <p class="mb-2"><i
                                                    class="mdi mdi-circle align-middle font-size-10 me-2 text-success"></i>
                                                Bitcoin</p>
                                            <h6>0.4412 BTC = <span class="text-muted font-size-14 fw-normal">$
                                                    4025.32</span></h6>
                                        </div>

                                        <div class="mt-4 pt-2">
                                            <p class="mb-2"><i
                                                    class="mdi mdi-circle align-middle font-size-10 me-2 text-primary"></i>
                                                Ethereum</p>
                                            <h6>4.5701 ETH = <span class="text-muted font-size-14 fw-normal">$
                                                    1123.64</span></h6>
                                        </div>

                                        <div class="mt-4 pt-2">
                                            <p class="mb-2"><i
                                                    class="mdi mdi-circle align-middle font-size-10 me-2 text-info"></i>
                                                Litecoin</p>
                                            <h6>35.3811 LTC = <span class="text-muted font-size-14 fw-normal">$
                                                    2263.09</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-xl-7">
                    <div class="row">
                        <div class="col-xl-12">
                            
                            <div class="card card-h-100">
                                
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center mb-4">
                                        <h5 class="card-title me-2">Invested Overview</h5>
                                        <div class="ms-auto">
                                            <select class="form-select form-select-sm">
                                                <option value="MAY" selected="">May</option>
                                                <option value="AP">April</option>
                                                <option value="MA">March</option>
                                                <option value="FE">February</option>
                                                <option value="JA">January</option>
                                                <option value="DE">December</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-sm">
                                            <div id="invested-overview" data-colors='["#5156be", "#34c38f"]'
                                                class="apex-charts"></div>
                                        </div>
                                        <div class="col-sm align-self-center">
                                            <div class="mt-4 mt-sm-0">
                                                <p class="mb-1">Invested Amount</p>
                                                <h4>$ 6134.39</h4>

                                                <p class="text-muted mb-4"> + 0.0012.23 ( 0.2 % ) <i
                                                        class="mdi mdi-arrow-up ms-1 text-success"></i></p>

                                                <div class="row g-0">
                                                    <div class="col-6">
                                                        <div>
                                                            <p class="mb-2 text-muted text-uppercase font-size-11">
                                                                Income</p>
                                                            <h5 class="fw-medium">$ 2632.46</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div>
                                                            <p class="mb-2 text-muted text-uppercase font-size-11">
                                                                Expenses</p>
                                                            <h5 class="fw-medium">-$ 924.38</h5>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-2">
                                                    <a href="#" class="btn btn-primary btn-sm">View more <i
                                                            class="mdi mdi-arrow-right ms-1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                       
                        
                    </div>
                    
                </div>
               
            </div>  -->

            <!-- <div class="row">
                <div class="col-xl-8">
                    
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center mb-4">
                                <h5 class="card-title me-2">Market Overview</h5>
                                <div class="ms-auto">
                                    <div>
                                        <button type="button" class="btn btn-soft-primary btn-sm">
                                            ALL
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                            1M
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                            6M
                                        </button>
                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                            1Y
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-xl-8">
                                    <div>
                                        <div id="market-overview" data-colors='["#5156be", "#34c38f"]'
                                            class="apex-charts"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="p-4">
                                        <div class="mt-0">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm m-auto">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-light text-dark font-size-16">
                                                        1
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="font-size-16">Coinmarketcap</span>
                                                </div>

                                                <div class="flex-shrink-0">
                                                    <span
                                                        class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+2.5%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm m-auto">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-light text-dark font-size-16">
                                                        2
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="font-size-16">Binance</span>
                                                </div>

                                                <div class="flex-shrink-0">
                                                    <span
                                                        class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+8.3%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm m-auto">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-light text-dark font-size-16">
                                                        3
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="font-size-16">Coinbase</span>
                                                </div>

                                                <div class="flex-shrink-0">
                                                    <span
                                                        class="badge rounded-pill badge-soft-danger font-size-12 fw-medium">-3.6%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm m-auto">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-light text-dark font-size-16">
                                                        4
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="font-size-16">Yobit</span>
                                                </div>

                                                <div class="flex-shrink-0">
                                                    <span
                                                        class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+7.1%</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm m-auto">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-light text-dark font-size-16">
                                                        5
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="font-size-16">Bitfinex</span>
                                                </div>

                                                <div class="flex-shrink-0">
                                                    <span
                                                        class="badge rounded-pill badge-soft-danger font-size-12 fw-medium">-0.9%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 pt-2">
                                            <a href="#" class="btn btn-primary w-100">See All Balances <i
                                                    class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                

                <div class="col-xl-4">
                    
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center mb-4">
                                <h5 class="card-title me-2">Sales by Locations</h5>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted font-size-12">Sort By:</span> <span
                                                class="fw-medium">World<i class="mdi mdi-chevron-down ms-1"></i></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton1">
                                            <a class="dropdown-item" href="#">USA</a>
                                            <a class="dropdown-item" href="#">Russia</a>
                                            <a class="dropdown-item" href="#">Australia</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="sales-by-locations" data-colors='["#5156be"]' style="height: 250px"></div>

                            <div class="px-2 py-2">
                                <p class="mb-1">USA <span class="float-end">75%</span></p>
                                <div class="progress mt-2" style="height: 6px;">
                                    <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                        style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                                    </div>
                                </div>

                                <p class="mt-3 mb-1">Russia <span class="float-end">55%</span></p>
                                <div class="progress mt-2" style="height: 6px;">
                                    <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                        style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55">
                                    </div>
                                </div>

                                <p class="mt-3 mb-1">Australia <span class="float-end">85%</span></p>
                                <div class="progress mt-2" style="height: 6px;">
                                    <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                        style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="85">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div> -->
            
            <?php if($this->session->userdata('multitech_role_id')<3) { ?>

            <div class="row">
              
                

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Bus On Road</h4>
                          
                        </div><!-- end card header -->

                        <div class="card-body px-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                                    <div class="table-responsive px-3" data-simplebar style="max-height: 352px;overflow:auto;">
                                        <table class="table align-middle table-nowrap table-borderless">
                                            <thead>
                                                <th></th>
                                                <th>Vehicle No</th>
                                                <th>Driver</th>
                                                <th>Conductor</th>
                                                <th class="text-center">Departure Time</th>
                                                <th>Route</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach($on_road as $or){ ?>
                                                    <tr>
                                                    <td style="width: 50px;">
                                                        <div class="font-size-14 text-success">
                                                            <i class="fa fa-truck"></i>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div>
                                                            <h5 class="font-size-14 mb-1"><?=$or['vehicle_no']?></h5>
                                                           
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="text-left">
                                                            <h5 class="font-size-14 mb-0"><?=$or['dname']?></h5>
                                                            <p class="text-muted mb-0 font-size-12">M : <?=$or['dmobile']?></p>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="text-left">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$or['cname']?></h5>
                                                            <p class="text-muted mb-0 font-size-12">M : <?=$or['cmobile']?></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$or['dtime']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-left">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$or['route_no']." - ".$or['route_name']?></h5>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                

                                               

                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                                
                                <!-- end tab pane -->
                               
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Todays Collection</h4>
                          
                        </div><!-- end card header -->

                        <div class="card-body px-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                                    <div class="table-responsive px-3" data-simplebar style="max-height:352px;overflow:auto;">
                                    <table class="table align-middle table-nowrap table-borderless">
                                            <thead>
                                                <th></th>
                                                <th>Vehicle No</th>
                                                <th>Driver</th>
                                                <th>Conductor</th>
                                                <th class="text-center">Departure Time</th>
                                                <th  style="text-align:right">Ticket Count</th>
                                                
                                                <th  style="text-align:right">Collections as per chalo</th>
                                                <th  style="text-align:right">Phone Pay Collection</th>
                                                <th  style="text-align:right">Cash Collection</th>

                                                <th  style="text-align:right">Total</th>
                                                <th  style="text-align:right">Covered Km</th>
                                                <th  style="text-align:right">Target</th>
                                                <th  style="text-align:right">Payment Due</th>


                                            </thead>
                                            <tbody>
                                                <?php foreach($collection as $or){ ?>
                                                    <tr>
                                                    <td style="width: 50px;">
                                                        <div class="font-size-14 text-success">
                                                            <i class="fa fa-truck"></i>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div>
                                                            <h5 class="font-size-14 mb-1"><?=$or['vehicle_no']?></h5>
                                                           
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="text-left">
                                                            <h5 class="font-size-14 mb-0"><?=$or['dname']?></h5>
                                                            <p class="text-muted mb-0 font-size-12">M : <?=$or['dmobile']?></p>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="text-left">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$or['cname']?></h5>
                                                            <p class="text-muted mb-0 font-size-12">M : <?=$or['cmobile']?></p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$or['dtime']?></h5>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="text-center">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$or['ticket_count']?></h5>
                                                        </div>
                                                    </td>
                                                   
                                                    <td>
                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0">&#8377; <?=$or['machine_collection']?></h5>
                                                        </div>
                                                    </td>

                                                    <td>
                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0">&#8377; <?=$or['phone_pay_collection']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0">&#8377; <?=$or['cash_collection']?></h5>
                                                        </div>
                                                    </td>
                                                    
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0">&#8377; <?=$or['total']?></h5>
                                                        </div>
                                                    </td>

                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['distance_covered']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['target']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['payment_due']?></h5>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <?php } ?>
                                                

                                               

                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                                
                                <!-- end tab pane -->
                               
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    
                </div>
                

                
                
            </div>
        </div>
        <?php } ?>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

<!-- 
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
                    </div>
                </div>
            </div>
        </div>
    </footer> -->
</div>
<!-- end main content-->