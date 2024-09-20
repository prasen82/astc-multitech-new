<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=$page_name?></h4>
                            <input type="text" id='type' name='type' hidden value="<?=$type?>" />

                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                           
                                <div class="row">
                                    <div class="col-lg-12">
                                    <form action="<?=base_url('collection_statement')?>" method="POST">
                        <div class="row">
                                     <div class="col-sm-3">
                                        <label for="from">From</label>
                                        <input type="date" class="form-control" name="from" value="<?=$from?>">
                                    </div>
                                    <div class="col-sm-3 ">
                                        <label for="to">To</label>
                                        <input type="date" class="form-control"  name="to" value="<?=$to?>">
                                    </div>
                                   
                                    
                        
                                <div class="col-sm-6 mt-4" style="text-align:left">                                   
                                   <button class="btn btn-info mt-1">Display</button>
                               </div> 
                               </div>
                            </form>  
                                   

                                    
                                </div>
                          
                        </div>
                    </div>
                </div>
                <div class="row">
            <div class="col-12">
                <div class="table-wrap" style="overflow:auto;">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th style="width:10%;">#</th>
                                <th>Date</th>
                                <th>Vehicle No</th>
                                <th>Driver Name</th>       
                                <th>Agencey</th>                         
                                <th>Conductor Name</th> 
                                <th>Agency</th>
                                <th>Route No</th>  
                                <th>Route Name</th>    
                                <th>Depot</th>
                                <th>Place</th>                               
                                <th>Consumed SOC</th>                             
                                <th>Covered Km</th>
                                <th  style="text-align:right">Ticket Count</th>

                                <th  style="text-align:right">Collections as per chalo</th>
                                <th  style="text-align:right">Phone Pay Collection</th>
                                <th  style="text-align:right"> Cash Collection</th>
                                <th  style="text-align:right">Total</th>
                                <th  style="text-align:right">Target</th>
                                <th  style="text-align:right">Payment Due</th>

                                              
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($log as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                    <td><?= $st['ldate'] ?></td>
                                    <td><?= $st['vehicle_no'] ?></td>
                                    <td><?= $st['dname'] ?></td>
                                    <td><?= $st['dagency'] ?></td>


                                    <td><?= $st['cname'] ?></td>
                                    <td><?= $st['cagency'] ?></td>

                                    <td><?= $st['route_no'] ?></td>                                   
                                    <td><?= $st['route_name'] ?></td>   

                                    <td><?= $st['depo'] ?></td>                               
                                    
                                    <td><?= $st['place'] ?></td>   
                              
                                    <td style="text-align:center;"><?= ($st['closing_charge']==0?0:$st['opening_charge']-$st['closing_charge']) ?></td>                                      
                                     
                                    <td style="text-align:center;"><?=  ($st['closing_meter_reading']==0?0:$st['closing_meter_reading'] -$st['opening_meter_reading']) ?></td>   
                                    <td style="text-align:center;">
                                              <?=$st['ticket_count']?>
                                                    </td>
                                    <td style="text-align:right;"><?=$st['machine_collection']?>
                                                    </td>

                                                 
                                                    <td style="text-align:right;">
                                                    <?=$st['phone_pay_collection']?>
                                                    </td>
                                                    <td style="text-align:right;">

                                                    <?=$st['cash_collection']?>
                                                    </td>
                                                    
                                   
                                                    <td style="text-align:right;">                                                    
                                                        <?=$st['total']?>
                                                    </td>

                                                    <td style="text-align:right;">                                                    
                                                         <?=$st['target']?>
                                                    </td>
                                                    <td style="text-align:right;">                                                    
                                                        <?=$st['payment_due']?>
                                                    </td>
                                                                        
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                 

                </div>
            </div>

        </div>
        
            </div>
           

       
    </div>
</div>



<form action="<?=base_url('print_logsheet')?>" method="POST" id="printsheet" hidden>
    <input type="text" id="log_id" name="log_id">
    <input type="text" id="type"  name="type" value="l" >


</form>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script type="text/javascript">


print_log=function(log_id)
{
  
    $("#log_id").val(log_id);    
    $("#printsheet").submit();

}


</script>