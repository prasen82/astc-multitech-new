<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=$page_name?></h4>
                           
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                        
                                <div class="row">
                                    <div class="col-lg-12">
                                    <form action="<?=base_url($back)?>" method="POST">
                        <div class="row">
                                    
                                     <div class="col-sm-3">
                                        <label for="">Month</label>
                                        <input type="month" class="form-control" name="month" id="month" value="<?=$month?>">
                                    </div>
                                    <!-- <div class="col-sm-3 ">
                                        <label for="">To</label>
                                        <input type="date" class="form-control"  name="to" value="<?=$to?>">
                                    </div> -->
                                   
                                    
                        
                                <div class="col-sm-3 mt-4" style="text-align:left">                                   
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
                              <?php if($type=='d') { ?>                                                       
                                <th>Driver Name</th>    
                                <?php } else { ?>                            
                                <th>Conductor Name</th> 
                                <?php } ?>
                                <th class="text-center">Mobile No</th>
                                <th>Agency</th>  
                                <th class="text-center">Main Attendence ( days )</th>    
                                <th class="text-center">Shutdown Attendence ( days )</th>    
                                <th style="text-align:right">Total Attendence</th>                               
                               
                            </tr>
                            
                        </thead>
                        <tbody>
                      
                            <?php
                             function main_attendence_driver($month,$staff_id)
                            {
                                $c = &get_instance();
                                $no_of_working_days=0;
                                $sql="SELECT DATE_FORMAT(`log_date`,'%Y-%m-%d') as cnt FROM  log_master  WHERE `route_no`<>'99' and DATE_FORMAT(`log_date`,'%Y-%m')='".$month."' and driver_staff_id='".$staff_id."'  and attendance_status=1  GROUP BY DATE_FORMAT(`log_date`,'%Y-%m-%d')";
                                $result=$c->db->query($sql);
                                $no_of_working_days=$c->db->affected_rows();
                                return $no_of_working_days;
                            }

                             function shutdown_attendence_driver($month,$staff_id)
                            {
                                $c = &get_instance();
                                $no_of_working_days=0;
                                $sql="SELECT DATE_FORMAT(`log_date`,'%Y-%m-%d') as cnt FROM  log_master  WHERE `route_no`='99' and DATE_FORMAT(`log_date`,'%Y-%m')='".$month."' and driver_staff_id='".$staff_id."'  and attendance_status=1  GROUP BY DATE_FORMAT(`log_date`,'%Y-%m-%d')";
                                $result=$c->db->query($sql);
                                $no_of_working_days=$c->db->affected_rows();
                                return $no_of_working_days;
                            }

                           $id=0;
                            foreach ($log as $st) {                              
                                            $main_attendance=main_attendence_driver($month,$st['sid']);
                                            $shutdown_attendance=shutdown_attendence_driver($month,$st['sid']);
                                            $total_attendence=$main_attendance+$shutdown_attendance;
                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                    <td><?= $st['sname'] ?></td>
                                    <td  class="text-center"><?= $st['mobile'] ?></td>

                                    <td><?= $st['agency_name'] ?></td>
                                    <td class="text-center"><?= $main_attendance ?>
                                    <td class="text-center"><?= $shutdown_attendance ?>
                                    <td class="text-center"><?= $total_attendence ?>

                                          
                                                                        
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

<script>
    $(document).ready(function(){
             <?php if($type=='d') { ?>
                   var txt="Driver attendance ";
                <?php } else { ?>                
                    var txt="Conductor attendance ";
            <?php } ?>    
            //   alert(txt);
        $('title').html(txt+format_date($("#month").val()));
    });


    format_date=function(dt)
    {
        var date=dt.split("-");
        var year=date[0];
        var m=date[1];
        var month="";
        if(m=="01") month="January";
        else if(m=="02") month="February";
        else if(m=="03") month="March";
        else if(m=="04") month="April";
        else if(m=="05") month="May";
        else if(m=="06") month="June";
        else if(m=="07") month="July";
        else if(m=="08") month="August";
        else if(m=="09") month="September";
        else if(m=="10") month="October";
        else if(m=="11") month="November";
        else month="December";

        return month+"-"+year;


         

    }
   
</script>


