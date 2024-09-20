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
                                    <form action="<?=base_url('rebate_report')?>" method="POST">
                        <div class="row">
                                     <div class="col-sm-3">
                                        <label for="">From</label>
                                        <input type="date" class="form-control" name="from" value="<?=$from?>">
                                    </div>
                                    <div class="col-sm-3 ">
                                        <label for="">To</label>
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
                                <th>Name</th>     
                                <th>Type</th> 
                                <th>Agency</th>                               
                              
                                <th>Rebate</th>
                                <th>Remarks</th>
                                
                                              
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($transaction as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                    <td class="text-center"><?= $st['dt'] ?></td>
                                 
                                    
                                    <td><?= $st['name'] ?></td>
                                   
                                    <td><?= ($st['type']=='d'?'Driver':($st['type']=='c'?'Conductor':'Staff')) ?></td>
                                    <td><?= $st['agency_name'] ?></td>
                                    <td style="text-align:right"><?= $st['credit'] ?></td>                               

                                    <td><?= $st['remarks'] ?></td>                             
                                                            


                                    
                                   

                                    
                                                                        
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

<script type="text/javascript">



</script>