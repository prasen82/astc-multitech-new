<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                   
                            <div class="row">
                            <div class="col-lg-8">
                            <h3 class="card-title"><?=$page_name?></h3>
                            <?php if($type=='d'){?>
                            <span class="text-danger">** Please make necessary changes before finalize it. After finalized you will not be able to roll back it.</span>
                            <?php }?>
                        
                            <?php $this->load->view('messages') ?>
                            </div>
                            
                            <div class="col-lg-4" style="text-align:right;">
                                <?php if($this->session->userdata('multitech_role_id')==1 || $this->session->userdata('multitech_role_id')==5){?>
                            <button <?=(count($salary)==0?"disabled":"")?> onclick="finalize_bill()" class="btn btn-info mt-1" <?=($type=='f'?'hidden':'')?>><i class="fa fa-check-double"></i>  Finalize Salary Bill Now</button>
                            <?php } ?>
                            <form action="<?=base_url($back)?>" method="POST" <?=($type=='d'?'hidden':'')?> >
                                              
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
                                <?php if($type=='d' && ($this->session->userdata('multitech_role_id')==1 || $this->session->userdata('multitech_role_id')==5)){?>
                                <th class="text-center">Action</th> 
                                <?php }?>                             
                                <th>Name</th>    
                                <th class="text-center">Mobile No</th>
                                <th class="text-center">Employee Id</th>    
                                <!-- <th>Designation</th>     -->
                                <th>Bank A/c No</th>    
                                <th>IFSC Code</th>                                
                                <th class="text-center">No of Days Worked</th>  
                                <th class="text-center">Extra Days Worked</th>  
                                <th class="text-center">Total Working Days</th>   
                                <th class="text-center">Total Salary Days</th>   
                                <th class="text-right">Monthly Basic Wages</th> 
                                <th class="text-right">Daily Basic Wages</th>   

                                <th class="text-right">Total Wages Payable</th>   
                                <th class="text-right">Leave Wages</th>   
                                <th class="text-right">Bonus</th>   
                                <th class="text-right">Allowance</th>   
                                <th class="text-right">Gross Income</th>  
                                
                                <th class="text-right">PF Deduction</th>   
                                <th class="text-right">ESIC Deduction</th>   
                                <th class="text-right">P Tax</th>   
                                <th class="text-right">Advance</th>   
                                <th class="text-right">Total Deduction</th>   
                                <th style="text-align:right">Net Salary Payable</th>
                               
                               
                            </tr>
                            
                        </thead>
                        <tbody>
                      
                            <?php
                           $id=0;
                            foreach ($salary as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                    <?php if($type=='d' && ($this->session->userdata('multitech_role_id')==1 || $this->session->userdata('multitech_role_id')==5)){?>
                                    <td class="text-center" id="btn<?=$st['bill_id']?>"><button class="btn btn-sm btn-success" onclick="edit_draft_bill('<?= $st['bill_id'] ?>','<?= $st['sname'] ?>','<?= $st['contact_no'] ?>','<?= $st['bank_ac_no'] ?>','<?= $st['ifsc'] ?>','<?= $st['no_of_days_work'] ?>','<?= $st['extra_days_work'] ?>','<?= $st['total_working_days'] ?>','<?= $st['total_salary_days'] ?>','<?= $st['montly_basic_wages'] ?>','<?= $st['daily_basic_wages'] ?>','<?= $st['total_wages_payable'] ?>','<?= $st['leave_wages'] ?>','<?= $st['bonus'] ?>','<?= $st['allowance'] ?>','<?= $st['gross_income'] ?>','<?= $st['pf_deduction'] ?>','<?= $st['esic_deduction'] ?>','<?= $st['p_tax'] ?>','<?= $st['advance_deduction'] ?>','<?= $st['total_deduction'] ?>','<?= $st['net_salary_payable'] ?>');"><i class="fa fa-edit"></i></button></td>
                                    <?php } ?>

                                    <td><?= $st['sname'] ?>
                                    </td>
                                    <td  class="text-center"><?= $st['contact_no'] ?></td>

                                    <td><?= $st['empid'] ?>
                                    <!-- <#?php if($type=='f'){?> -->
                                <br>
                                <a href="#" onclick="print_payslip('<?=$st['bill_id']?>')">
                                         <i class="fa fa-print" style="font-size:14pt"></i>
                                        </a>
                                        <!-- <#?php } ?> -->
                                    </td>
                                    <!-- <td><?= $st['desig'] ?></td> -->

                                    <td class="text-center"><?= $st['bank_ac_no'] ?></td>
                                    <td class="text-center"><?= $st['ifsc'] ?></td>
                                    <td id="days_worked<?=$st['bill_id']?>" class="text-center"><?= $st['no_of_days_work'] ?></td>
                                    <td id="extra_days_worked<?=$st['bill_id']?>" class="text-center"><?= $st['extra_days_work'] ?></td>
                                    <td id="total_working_days<?=$st['bill_id']?>" class="text-center"><?= $st['total_working_days'] ?></td>
                                    <td id="total_salary_days<?=$st['bill_id']?>" style="text-align:right"><?= $st['total_salary_days'] ?></td>                                      
                                    <td style="text-align:right"><?= number_format($st['montly_basic_wages'],2) ?></td>                                      
                                    <td style="text-align:right"><?= number_format($st['daily_basic_wages'],2) ?></td>                                      


                                  
                                    <td id="total_wages_payable<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['total_wages_payable'],2) ?></td>                                      
                                    <td id="leave_wages<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['leave_wages'],2) ?></td>                                      
                                    <td id="bonus<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['bonus'],2) ?></td>                                      
                                    <td  id="allowance<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['allowance'],2) ?></td>                                      
                                    <td id="gross_income<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['gross_income'],2) ?></td>                                      
                                    <td id="pf_deduction<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['pf_deduction'],2) ?></td>                                      
                                    <td id="esic_deduction<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['esic_deduction'],2) ?></td>                                      
                                    <td id="p_tax<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['p_tax'],2) ?></td>                                      
                                    <td id="advance_deduction<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['advance_deduction'],2) ?></td>                                      

                                    <td id="total_deduction<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['total_deduction'],2) ?></td>                                      

                                 
                                    <td id="salary_payable<?=$st['bill_id']?>" style="text-align:right"><?= number_format($st['net_salary_payable'],2) ?></td>                                      
                                    
                                                                        
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



<form action="<?=base_url('print_payslip')?>" method="POST" id="printpayslip" hidden>
    <input type="text" id="bill_id" name="bill_id">
    <input type="text" id="type" name="type" value="<?=$emp_type?>">  
    <input type="text" id="bill_type" name="bill_type" value="<?=$type?>">  

    
</form>








<div class="modal" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h1 class="modal-title fs-5" id="editModalLabel">Draft Salary Bill Edit</h1> -->
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      <h1 class="modal-title fs-5" id="editModalLabel">Draft Salary Bill Edit</h1><br>

                     <div class="row">
                                    
                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Name" name="staff_name"
                                                    id="staff_name" readonly required >
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Mobile No</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter mobile no" name="mobile"
                                                    id="mobile" required value="" readonly>
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-3" >
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Bank A/c No</label>
                                               
                                                <input class="form-control" type="text"
                                                    placeholder="Bank A/c No" name="bank"
                                                    id="bank" required readonly>
                                                  
                                            </div>

                                       
                                    </div>

                                    <div class="col-lg-3">                                              
                                            <div class="mb-3">
                                                <label for="name" class="form-label">IFSC Code</label>
                                                <input class="form-control" type="text"
                                                    placeholder="IFSC" name="ifsc"
                                                    id="ifsc" required readonly>
                                                  
                                             </div>                                    
                                    
                                             <input type="text" id='bill_id' name='bill_id' hidden/>
                                             <input type="text" id='global_leave_wages' name='global_leave_wages' hidden/>
                                             <input type="text" id='global_bonus' name='global_bonus' hidden/>
                                             <input type="text" id='global_pf_employee_share' name='global_pf_employee_share' hidden/>
                                             <input type="text" id='global_pf_employer_contribution' name='global_pf_employer_contribution' hidden/>
                                             <input type="text" id='global_esic_employee_share' name='global_esic_employee_share' hidden/>
                                             <input type="text" id='global_esic_employer_contribution' name='global_esic_employer_contribution' hidden/>
                                            
                                             <input type="text" id='pf_employer_contribution' name='pf_employer_contribution' hidden/>
                                             <input type="text" id='esic_employer_contribution' name='esic_employer_contribution' hidden/>

         
                                    </div>
               
                     </div>
                    <div class="row">
                                    
                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">No of days worked</label>
                                                <input class="form-control" type="number" min="0"
                                                    placeholder="No of days worked" name="days_worked"
                                                    id="days_worked" required oninput="bill_calculation();" >
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Extra days worked</label>
                                                <input class="form-control" type="number" min="0"
                                                    placeholder="Extra days worked" name="extra_days_worked"
                                                    id="extra_days_worked" required oninput="bill_calculation();" >
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-3" >
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Total working days</label>
                                               
                                                <input class="form-control" type="text"
                                                    placeholder="Total working days" name="total_working_days"
                                                    id="total_working_days" required readonly>
                                                  
                                            </div>

                                       
                                    </div>

                                    <div class="col-lg-3">                                              
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Total salary days</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Total salary days" name="total_salary_days"
                                                    id="total_salary_days" required readonly>
                                                  
                                             </div>                                    
                                    
                                            
                                    </div>
               
                    </div>

                     <div class="row">
                                    
                                    <div class="col-lg-4">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Monthly Basic Wages</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Monthly basic wages" name="monthly_wages"
                                                    id="monthly_wages" required readonly>
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-4">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Daily Basic Wages</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Daily basic wages" name="daily_wages"
                                                    id="daily_wages" required  readonly>
                                            </div>
                                       
                                    </div>


                                    <div class="col-lg-4">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Total Wages Payable</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Total Wages Payable" name="total_wages"
                                                    id="total_wages" required readonly >
                                            </div>
                                       
                                    </div>

                                    
                </div>

                <div class="row">
                <div class="col-lg-3" >
                                       
                                       <div class="mb-3">
                                           <label for="name" class="form-label">Leave Wages</label>
                                          
                                           <input class="form-control" type="text"
                                               placeholder="Leave wages" name="leave_wages"
                                               id="leave_wages" readonly >
                                             
                                       </div>

                                  
                               </div>

                               <div class="col-lg-3">                                              
                                       <div class="mb-3">
                                           <label for="name" class="form-label">Bonus</label>
                                           <input class="form-control" type="text"
                                               placeholder="Bonus" name="bonus"
                                               id="bonus" required readonly>
                                             
                                        </div>                                    
                               
                                       
                               </div>
          
                                    
                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Allowance</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Allowance" name="allowance"
                                                    id="allowance" oninput="bill_calculation();" readonly>
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Gross Income</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Gross Income" name="gross_income"
                                                    id="gross_income" required readonly >
                                            </div>
                                       
                                    </div>

                                 
               
                 </div>

   

                <div class="row">
                <div class="col-lg-3" >
                                       
                                       <div class="mb-3">
                                           <label for="name" class="form-label">PF Deduction</label>
                                          
                                           <input class="form-control" type="text"
                                               placeholder="PF Deduction" name="pf_deduction"
                                               id="pf_deduction" readonly >
                                             
                                       </div>

                                  
                               </div>

                               <div class="col-lg-3">                                              
                                       <div class="mb-3">
                                           <label for="name" class="form-label">ESIC Deduction</label>
                                           <input class="form-control" type="text"
                                               placeholder="ESIC Deduction" name="esic_deduction"
                                               id="esic_deduction" readonly >
                                             
                                        </div>                                    
                               
                                       
                               </div>
                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">P Tax</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Professional Tax" name="p_tax"
                                                    id="p_tax" readonly>
                                            </div>
                                       
                                    </div>
                                    <div class="col-lg-3">
                                       
                                       <div class="mb-3">
                                           <label for="name" class="form-label">Advance Deduction</label>
                                           <input class="form-control" type="text"
                                               placeholder="Advance Deduction" name="advance_deduction"
                                               id="advance_deduction" required oninput="bill_calculation();">
                                       </div>
                                  
                               </div>

                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Total Deduction</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Total Deduction" name="total_deduction"
                                                    id="total_deduction" required readonly >
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-3" >
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Net Salary Payable</label>
                                               
                                                <input class="form-control" type="text"
                                                    placeholder="Salary Payable" name="salary_payable"
                                                    id="salary_payable" readonly >
                                                  
                                            </div>

                                       
                                    </div>

                                   
               
                  </div>
     

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="update_draft();">Update</button>
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
                   var txt='<?=$page_name?>';
                <?php } else { ?>                
                    var txt="Final Salary Bill Of <?=($emp_type=='d'?" Drivers ":($emp_type=='c'?" Conductors ":" Staffs "))?> For The Month of "+format_date($("#month").val());
            <?php } ?>    
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
   
   finalize_bill=function()
   {
    if(!confirm("Sure to finalize "+$('title').html()+" ?")) return;
    $('#loader').css("display",'block');

    var d={
        "type":"<?=$emp_type?>"
    }
    $.ajax({
        url:'<?=base_url('master/finalize')?>',
        method:"POST",
        dataType:"JSON",
        data:d,
        success:function(data)
        {
            // alert(data);
            var ttl_=$('title').html()+" has been finalized successfully." ;
    $('#loader').css("display",'none');

            Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            icon: "success",
                            title: ttl_,
                            confirmButtonText: 'OK'
                            }).then((result) => {
                                window.location.reload();
                                });
                              
                           
                          
        },
        error:function(data)
        {
            // alert(data);
            alert("Something went wrong.")
        }
        
        
    })
   }

   edit_draft_bill=function(bill_id,sname,contact_no,bank_ac_no,ifsc,no_of_days_work,extra_days_work,total_working_days,total_salary_days,montly_basic_wages,daily_basic_wages,total_wages_payable,leave_wages,bonus,allowance,gross_income,pf_deduction,esic_deduction,p_tax,advance_deduction,total_deduction,net_salary_payable)
   {
    $('#loader').css("display",'block');

    $.ajax({
        url:"<?=base_url('master/settings')?>",
        method:"POST",
        dataType:"JSON",
        success:function(data)
        {
            // alert(data[0]['leave_wages']);
            // var data1=JSON.parse(data);
            var global_leave_wages=0;
            var global_bonus=0;
            // var global_allowance=0;
            var global_pf_employee_share=0;
            var global_pf_employer_contribution=0;
            var global_esic_employee_share=0;
            var global_esic_employer_contribution=0;
            // var global_p_tax=0;

            data.forEach(function(d)
                 {   
                   
                    global_leave_wages=d['leave_wages'];
                    global_bonus=d['bonus'];
                    // global_allowance=d['allowance'];
                    global_pf_employee_share=d['pf_employee_share'];
                    global_pf_employer_contribution=d['pf_employer_contribution'];
                    global_esic_employee_share=d['esic_employee_share'];
                    global_esic_employer_contribution=d['esic_employer_contribution'];
                    // global_p_tax=d['p_tax'];

                 }
                )

                $("#global_leave_wages").val(global_leave_wages);
                $("#global_bonus").val(global_bonus);
                $("#global_pf_employee_share").val(global_pf_employee_share);
                $("#global_pf_employer_contribution").val(global_pf_employer_contribution);
                $("#global_esic_employee_share").val(global_esic_employee_share);
                $("#global_esic_employer_contribution").val(global_esic_employer_contribution);
                

            $("#bill_id").val(bill_id);
            $("#staff_name").val(sname);
            $("#mobile").val(contact_no);
            $("#bank").val(bank_ac_no);
            $("#ifsc").val(ifsc);
            $("#days_worked").val(no_of_days_work);
            $("#extra_days_worked").val(extra_days_work);
            $("#total_working_days").val(total_working_days);
            $("#total_salary_days").val(total_salary_days);
            $("#monthly_wages").val(montly_basic_wages);
            $("#daily_wages").val(daily_basic_wages);
            $("#total_wages").val(total_wages_payable);
            
            $("#leave_wages").val(leave_wages);
            $("#bonus").val(bonus);
            $("#allowance").val(allowance);
            $("#gross_income").val(gross_income);
            $("#pf_deduction").val(pf_deduction);
            $("#esic_deduction").val(esic_deduction);
            $("#p_tax").val(p_tax);

            $("#advance_deduction").val(advance_deduction);
            $("#total_deduction").val(total_deduction);
            $("#salary_payable").val(net_salary_payable);
        

            $("#editModal").modal("show");
            $('#loader').css("display",'none');

        },
        error:function(data)
        {
            alert("Something went wrong.");
        }
    })
   
   }

   bill_calculation=function()
   {
   
    $("#total_working_days").val(Number($("#days_worked").val())+Number($("#extra_days_worked").val()));
    var total_working_days=Number($("#total_working_days").val());
    var total_salary_days=(total_working_days>25?total_working_days+4:total_working_days);
    var total_wages=total_salary_days*Number($("#daily_wages").val());
    var leave_wages=(total_wages*Number($("#global_leave_wages").val())/100).toFixed(2);
    var bonus=(total_wages*Number($("#global_bonus").val())/100).toFixed(2);
    var gross=total_wages+Number(leave_wages)+Number(bonus)+Number($("#allowance").val());
    var pf_deduction=(total_wages*Number($("#global_pf_employee_share").val())/100).toFixed(2);
    if(gross<=21000)
   {
    var esic_deduction=(gross*Number($("#global_esic_employee_share").val())/100).toFixed(2);
    var employers_esic_contribution=(gross*Number($("#global_esic_employer_contribution").val())/100).toFixed(2);
  

   }
   else
   {
    var esic_deduction=0;
    var employers_esic_contribution=0;
  
   }
   
   
           
    // var p_tax=Number($("#p_tax").val());

    var advance=Number($("#advance_deduction").val());
    var p_tax=(gross>25000?208:(gross>15000?180:(gross>10000?150:0)));


    var total_deduction=Number(pf_deduction)+advance+Number(esic_deduction)+p_tax;

    var net_payable=gross-total_deduction;
    var employers_pf_contribution=(total_wages*Number($("#global_pf_employer_contribution").val())/100).toFixed(2);
    

    $("#p_tax").val(p_tax);
    $("#total_salary_days").val(total_salary_days);
    $("#total_wages").val(total_wages);
    $("#leave_wages").val(leave_wages);
    $("#bonus").val(bonus);
    $("#gross_income").val(gross.toFixed(2));
    $("#pf_deduction").val(pf_deduction);
    $("#esic_deduction").val(esic_deduction);
    $("#total_deduction").val(total_deduction.toFixed(2));
    $("#salary_payable").val(net_payable.toFixed(0));

    $("#pf_employer_contribution").val(employers_pf_contribution);
    $("#esic_employer_contribution").val(employers_esic_contribution);

       

   }

   
   update_draft=function()
   { 

if(!confirm("Are you sure to update ?")) return;

$('#loader').css("display",'block');
var bill_id=$("#bill_id").val();

var d={
    "bill_id":$("#bill_id").val(),
    "working_days":Number($("#days_worked").val()),
    "extra_working_days":Number($("#extra_days_worked").val()),
    "total_working_days":Number($("#total_working_days").val()),
    "total_salary_days":Number($("#total_salary_days").val()),
    "p_tax":Number($("#p_tax").val()),
    "allowance":Number($("#allowance").val()),

    


    "total_wages":Number($("#total_wages").val()),
    "leave_wages":Number($("#leave_wages").val()),

    "bonus":Number($("#bonus").val()),
    "gross_income":Number($("#gross_income").val()),
    "pf_deduction":Number($("#pf_deduction").val()),
    "esic_deduction":Number($("#esic_deduction").val()),
    "advance_deduction":Number($("#advance_deduction").val()),
    "total_deduction":Number($("#total_deduction").val()),
    "salary_payable":Number($("#salary_payable").val()),
    "pf_employer_contribution":Number($("#pf_employer_contribution").val()),
    "esic_employer_contribution":Number($("#esic_employer_contribution").val())
       
} 
var fn="edit_draft_bill('"+$("#bill_id").val()+"','"+ $("#staff_name").val()+"','"+$("#mobile").val()+"','"+$("#bank").val()+"','"+$("#ifsc").val()+"','"+Number($("#days_worked").val())+"','"+Number($("#extra_days_worked").val())+"','"+Number($("#total_working_days").val())+"','"+Number($("#total_salary_days").val())+"','"+$("#monthly_wages").val()+"','"+$("#daily_wages").val()+"','"+$("#total_wages").val()+"','"+$("#leave_wages").val()+"','"+$("#bonus").val()+"','"+$("#allowance").val()+"','"+$("#gross_income").val()+"','"+$("#pf_deduction").val()+"','"+$("#esic_deduction").val()+"','"+$("#p_tax").val()+"','"+$("#advance_deduction").val()+"','"+$("#total_deduction").val()+"','"+$("#salary_payable").val()+"');"
var btn='<button class="btn btn-sm btn-success" onclick="'+fn+'"><i class="fa fa-edit"></i></button>';
$.ajax({
    url: '<?= base_url('draft_update') ?>',
    method: 'POST',
    data: d,

    success: function(data) {
        // alert(data);
     
            Swal.fire({
                        // position: "bottom-end",
                        customClass: 'swal-wide',
                        icon: "success",
                        title: "Updated Successfully",
                        showConfirmButton: true,
                        // timer: 1500
                        }).then((result) => {

                            $('#btn'+bill_id).html(btn);
                            $('#days_worked'+bill_id).html($("#days_worked").val());
                            $('#extra_days_worked'+bill_id).html($("#extra_days_worked").val());
                            $('#total_working_days'+bill_id).html($("#total_working_days").val());
                            $('#total_salary_days'+bill_id).html($("#total_salary_days").val());
                            $('#total_wages_payable'+bill_id).html(Number($("#total_wages").val()).toFixed(2));
                            $('#leave_wages'+bill_id).html($("#leave_wages").val());
                            $('#bonus'+bill_id).html($("#bonus").val());
                            $('#gross_income'+bill_id).html($("#gross_income").val());
                            $('#pf_deduction'+bill_id).html($("#pf_deduction").val());
                            $('#p_tax'+bill_id).html($("#p_tax").val());
                            $('#allowance'+bill_id).html(Number($("#allowance").val()).toFixed(2));


                            $('#esic_deduction'+bill_id).html($("#esic_deduction").val());
                            $('#advance_deduction'+bill_id).html(Number($("#advance_deduction").val()).toFixed(2));
                            $('#total_deduction'+bill_id).html(Number($("#total_deduction").val()).toFixed(2));
                            $('#salary_payable'+bill_id).html(Number($("#salary_payable").val()).toFixed(2));

                            $("#editModal").modal("hide");


                        });
                    //     navigator.vibrate(200);  /**Mobile vibration */
                    //    window.setTimeout(() => {
                    //     window.location.reload();
                    //    }, 1000);
                       

      
      $("#loader").css("display","none");
      
    },
    error:function(data)
    {
        Swal.fire({
                title: 'Error!',
                text: 'Something went wrong.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            $("#loader").css("display","none");
            $(x).attr("disabled",false);   
    }
})
}

print_payslip=function(bill_id)
{
  
    // alert(bill_id);
    $("#bill_id").val(bill_id);    
    $("#printpayslip").submit();

}

</script>


