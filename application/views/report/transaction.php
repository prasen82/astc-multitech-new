<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"><?=$page_name." Of ".($type=='d'?'Driver ':'Conductor ').$name.' ( Mobile : '.$contact_no." )" ?></h4>
                        

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Report</a></li>
                                <li class="breadcrumb-item active"><?=$page_name?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>              
                  
                <div class="row">
            <div class="col-12">
                <div class="table-wrap">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th >#</th>
                                <th style="width:10%">Date</th>
                                <th>Vehicle No</th>   
                                
                                 <th>Route</th>
                                 <th class="text-center">Target</th>
                                 <th class="text-center">Total Collection</th>
                                 <th class="text-center">Total Due</th>
                                 <th class="text-center">Balance</th>
                                 <th class="text-center">Paid</th>                           
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($transaction as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?>
                                    </td>                                
                                  
                                    
                                    <td class="text-center"><?= $st['dt'] ?><br><small class="text-success"><?=($st['vehicle_no']==""?$st['remarks']:"")?></small></td>
                                    <td><?= $st['vehicle_no'] ?></td>   
                              

                                    <td><?= $st['route'] ?></td>
                                    <td class="text-center"><?= $st['target'] ?></td>
                                    <td class="text-center"><?= $st['total'] ?></td>
                                    <td class="text-center"><?= $st['payment_due'] ?></td>
                                    <td class="text-center"><?= $st['balance'] ?></td>
                                    <td class="text-center"><?= $st['paid'] ?></td>                                
                                   


                                   
                                                                        
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





<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

