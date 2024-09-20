<div class="main-content" id="invoice-POS" >

    <div class="page-content" >
        <!-- <div class="container-fluid"> -->

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row mt-2"  >
                <div class="col-lg-12" style="border:0px solid red">
                    <table  style="width:100%;text-indent:10px;">
                        <tr>
                            <td style="width:10%"><img src="<?=base_url('assets/images/logo.png')?>" alt="" style="height:50px;margin-top:-30px;"></td>
                            <td class="text-center">
                            <h5>MULTITECH ENGINEERING CONSULTANTS</h5>
                            <p>Address: 2nd floor, Ganesh Market, Above LIC Office, Near UCO Bank, Narengi Tiniali<br>Guwahati-26, Assam</p>
                            <h6 style="text-transform: uppercase;">SALARY SLIP OF <?=$salary[0]['mnth']?></h6>
                            </td>
                        </tr>
                    </table >
                </div>
                <hr>

                <?php foreach($salary as $lg) {
                  
                    ?>
              <div class="col-lg-12">
                <table style="width:100%;text-indent:10px;">
                      
                        <tr>
                            <td style="border:1px solid gray;width:60%">Name :</td>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['sname']?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Designation :</td>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['designation']?></td>
                        </tr><tr>
                            <td style="border:1px solid gray;">Employee Id :</td>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['emp_id']?></td>
                        </tr><tr>
                            <td style="border:1px solid gray;">Address :</td>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['location']?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">No of Days of Work :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=$lg['total_salary_days']?></td>
                        </tr>

                        <tr>
                            <td style="border:1px solid gray;">Monthly Basic Wage with DA :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['montly_basic_wages'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Daily Rate of Wage with DA :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['daily_basic_wages'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Total Wage payable with DA :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['total_wages_payable'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Leave Wage  @ 6.73% :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['leave_wages'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Bonus 8.33% :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['bonus'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Allowance :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['allowance'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;font-weight:bold;">Gross Income :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;font-weight:bold;"><?=number_format($lg['gross_income'],2)?></td>
                        </tr>

                        <tr>
                            <td style="border:1px solid gray;">PF Deduction @12% :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['pf_deduction'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">ESIC Deduction @ 0.75% :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['esic_deduction'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Professional Tax :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['p_tax'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Advance :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['advance_deduction'],2)?></td>
                        </tr>

                        <tr>
                            <td style="border:1px solid gray;font-weight:bold;">Total Deduction :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;font-weight:bold;"><?=number_format($lg['total_deduction'],2)?></td>
                        </tr>

                        <tr>
                            <td style="border:1px solid gray;font-weight:bold;">Net Salary Amount Payable :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;font-weight:bold;"><?=number_format($lg['net_salary_payable'],2)?></td>
                        </tr>
                    </table>

                    <table style="width:100%;text-indent:10px;" class="mt-4">
                      
                         <tr>
                            <td colspan=2 style="border:1px solid gray;text-align:Center;font-weight:bold">PF AMOUNT</td>
                        </tr>

                        <tr>
                            <td style="border:1px solid gray;width:60%">From Employer :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['eployers_pf_contribution'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">From Employee :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format($lg['pf_deduction'],2)?></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Total amount deposited in PF A/c :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;"><?=number_format(($lg['pf_deduction']+$lg['eployers_pf_contribution']),2)?></td>
                        </tr>
                        
                        <tr>
                            <td style="border:1px solid gray;font-weight:bold;">Net Amount Received (Salary + PF) :</td>
                            <td style="border:1px solid gray;text-align:right;padding-right:20px;font-weight:bold;"><?=number_format(($lg['net_salary_payable']+$lg['pf_deduction']+$lg['eployers_pf_contribution']),2)?></td>
                        </tr>
                    </table>
             
              </div>

             
              
                
              </div>


              
             
            <?php  }?>
             
             
            

               



              </div>

          
            
<!-- </div> -->

  

            <form action="<?=base_url($type)?>" method="POST" id="back"  hidden>
                 <input type="month" class="form-control" name="month" id="month" value="<?=$salary[0]['bill_mnth']?>">

                                   
            </form>
        </div>
    </div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




<script>
	   $(document).ready(function() {  
		printDiv();
		});

	function printDiv() {
     var printContents = document.getElementById("invoice-POS").innerHTML;
    //  alert(printContents);
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;
     document.title="<?=$salary[0]['emp_id']?>";
     window.print();

	 $("#back").submit();
    //  document.body.innerHTML = originalContents;
}
  </script>