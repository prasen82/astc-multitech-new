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
                        <h4 class="mb-sm-0 font-size-18">Bus on Maintenance</h4>
                        

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">E-Bus</a></li>
                                <li class="breadcrumb-item active">Maintenance</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form action="<?=base_url('maintanance-list')?>" method="POST" id="mnc">
                    <input type="text" name="log_id" id="log_id" hidden value="<?=$mn['log_id']?>">
                     <input type="text" id="vehicle_no" name="vehicle_no" hidden value="<?=$mn['vehicle_no']?>">
            </form>
            <div class="row">
                <?php foreach($maintanance as $mn) { ?>
                    <a href="#" onclick="start_maintanace('<?=$mn['vehicle_no']?>','<?=$mn['log_id']?>');">

                    
                        <div class="col-xl-3 col-md-6" style="cursor:pointer;">                            
                            <div class="card card-h-100">                                
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <i class="fa fa-bus  text-success" style="font-size:30pt;"></i>
                                        </div>
                                        <div class="col-9">                                
                                            <span class="text-success" style="font-size:14pt;font-weight:bold"><?=$mn['vehicle_no']?></span><br>
                                            <small class="text-primary">Driver : <?=$mn['dname']?></small><br>
                                            <small class="text-primary"><?="Mobile : ".$mn['dmobile']?></small>
                                            <h4 class="mb-1 text-danger">
                                                <span>Total Issue : <?=$mn['cnt']?></span>
                                            </h6>
                                        </div>                                        
                                    </div>                                
                                </div><!-- end card body -->
                            </div>
                        </div>
                </a>
                <?php } ?>


            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

<script>
start_maintanace=function(vehicle_no,log_id)
{
    $("#vehicle_no").val(vehicle_no);
    $("#log_id").val(log_id);
    $("#mnc").submit();

}
</script>
<!-- end main content-->