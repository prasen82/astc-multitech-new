<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                   
                            <div class="row">
                            <div class="col-lg-8">
                            <h3 class="card-title"><?=$page_name?></h3>
                            
                            <?php $this->load->view('messages') ?>
                            </div>
                            
                            <div class="col-lg-4" style="text-align:right;">
                            <form action="<?=base_url($back)?>" method="POST"  >
                                              
                                              <table style="margin-top:-10px;">
                                                  <tr>
                                                      <td class="p-2"><label for="">Month</label></td>
                                                      <td class="p-2" >
                                                      <input type="month" class="form-control" name="month" id="month" value="<?=$month?>">

                                                      </td>

                                                      <td class="p-2">
                                                        <button class="btn btn-info">Display</button>

                                                      </td>

                                                  </tr>
                                              </table>
                                      
                                   </form>  
                            </div>
                            </div>
                           
                           
                            <p class="card-title-desc"></p>
                        <!-- </div> -->
                           

                           
                                                 
                                                                
                                                 
                                                           
                        
               
                <div class="row mt-3">
            <div class="col-lg-12">
                <div class="table-wrap table-responsive" style="overflow:auto;">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                           
                            <tr>
                                <th style="width:10%;">#</th>   
                                                           
                                <th>Name</th>    
                                <th class="text-center">Mobile No</th>
                                <th class="text-center">Employee Id</th>    
                               
                                <th>ESIC A/c No</th>    
                                  
                                <th class="text-center">Total Working Days</th>   
                                <th class="text-center">Total Salary Days</th>   
                                <th class="text-right">Monthly Basic Wages</th> 
                                <th class="text-right">Daily Basic Wages</th>   
                                <th class="text-right">Total Wages Payable</th>   
                                <th class="text-right">Leave Wages</th>   
                                <th class="text-right">Bonus</th>   
                                <th class="text-right">Allowance</th>   
                                <th class="text-right">Gross Income</th>  
                                
                                
                                <th class="text-right">Employee's Share</th>   
                                <th class="text-right">Employer's Contribution</th>   
                                <th class="text-right">Total ESIC</th>   
                               
                               
                            </tr>
                            
                        </thead>
                        <tbody>
                      
                            <?php
                           $id=0;
                            foreach ($salary as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                    

                                    <td><?= $st['sname'] ?></td>
                                    <td  class="text-center"><?= $st['contact_no'] ?></td>

                                    <td><?= $st['empid'] ?></td>
                                  
                                    <td class="text-center"><?= $st['esi_ac_no'] ?></td>
                                    <td id="total_working_days<?=$st['bill_id']?>" class="text-center"><?= $st['total_working_days'] ?></td>
                                    <td id="total_salary_days<?=$st['bill_id']?>" style="text-align:right"><?= $st['total_salary_days'] ?></td>                                      
                                    <td style="text-align:right"><?= number_format($st['montly_basic_wages'],2) ?></td>                                      
                                    <td style="text-align:right"><?= number_format($st['daily_basic_wages'],2) ?></td>                                      


                                  
                                    <td id="total_wages_payable<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['total_wages_payable'],2) ?></td>                                      
                                    <td id="leave_wages<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['leave_wages'],2) ?></td>                                      
                                    <td id="bonus<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['bonus'],2) ?></td>                                      
                                    <td style="text-align:right"><?= number_format($st['allowance'],2) ?></td>                                      
                                    <td id="gross_income<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['gross_income'],2) ?></td>                                      
                                    <td id="esic_deduction<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['esic_deduction'],2) ?></td>                                      
                                                                        
                                    <td  style="text-align:right"><?= number_format($st['eployers_esic_contribution'],2) ?></td>                                      
                                    
                                 
                                    <td  style="text-align:right"><?= number_format(($st['esic_deduction']+$st['eployers_esic_contribution']),2) ?></td>                                      
                                    
                                                                        
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
                         
                    var txt="ESIC Statement Of <?=($emp_type=='d'?" Drivers ":($emp_type=='c'?" Conductors ":" Staffs "))?> For The Month of "+format_date($("#month").val());
            
            //   alert(txt);
        $('title').html(txt);
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


