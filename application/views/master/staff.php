<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fa fa-user"></i> <?=$page_name?></h4>
                            <input type="text" id='type' name='type' hidden value="<?=$type?>" />

                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                           
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter item name" name="name"
                                                            id="name" required>
                                                    </div>
                                                </div>
                                            </div>

                                         


                                            <input type="text" id='staff_id' name='staff_id' hidden/>

                                            <div class="col-lg-2">
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Contact
                                                            No </label>
                                                        <input class="form-control" min="0" type="number"
                                                            placeholder="Enter mobile no" name="mobile_no"
                                                            id="mobile_no" required>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="col-lg-2" <?=(($type=='t' || $type=='s'|| $type=='a')?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Agency
                                                            </label>
                                                            <select name="agency" id="agency" class="form-select">
                                                                <option value="0">Select Agency</option>
                                                                <?php foreach($agency as $ag){?>
                                                                <option value="<?=$ag['staff_id']?>"><?=$ag['name']?></option>
                                                                <?php } ?>
                                                            </select>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-2" <?=($type!='s'?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Designation </label>
                                                        <input class="form-control"  type="text"
                                                            placeholder="Enter designation" name="designation"
                                                            id="designation" required>
                                                    </div>
                                                </div>
                                            </div>
                                           

                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Employee Id </label>
                                                        <input class="form-control"  type="text"
                                                            placeholder="Enter employee id" name="emp_id"
                                                            id="emp_id" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4" <?=($type=='t'?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Address </label>
                                                        <input class="form-control"  type="text"
                                                            placeholder="Enter address" name="location"
                                                            id="location" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2" <?=(($type=='t'||$type=='s'|| $type=='a')?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Licence No </label>
                                                        <input class="form-control"  type="text"
                                                            placeholder="Enter license no" name="license_no"
                                                            id="license_no" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2" <?=(($type=='t'||$type=='s'|| $type=='a')?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Valid Till </label>
                                                        <input class="form-control"  type="date"
                                                            placeholder="" name="valid_till"
                                                            id="valid_till" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Bank A/c No </label>
                                                        <input class="form-control"  type="text"
                                                            placeholder="Enter bank a/c" name="bank_ac"
                                                            id="bank_ac" required>
                                                    </div>
                                                </div>
                                            </div>
                                           
   
                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">IFSC Code </label>
                                                        <input class="form-control"  type="text"
                                                            placeholder="Enter IFSC code" name="ifsc_code"
                                                            id="ifsc_code" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">PF A/c No </label>
                                                        <input class="form-control"  type="text"
                                                            placeholder="Enter PF A/c No" name="pf_ac"
                                                            id="pf_ac" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">ESIC A/c No </label>
                                                        <input class="form-control"  type="text"
                                                            placeholder="Enter ESIC A/c No" name="esi_ac"
                                                            id="esi_ac" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Monthly basic wages ( &#8377; )</label>
                                                        <input class="form-control"   min="0" type="number" 
                                                            placeholder="Enter monthly basic wages" name="monthly_wages"
                                                            id="monthly_wages" required oninput="daily_wages(this);">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?>>
                                               
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Daily basic wages ( &#8377; )</label>
                                                        <input class="form-control"   min="0" type="number" readonly
                                                            placeholder="Daily basic wages" name="daily_wages"
                                                            id="daily_wages" required>
                                                    </div>
                                               
                                            </div>
                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?>>
                                               
                                               <div class="mb-2">
                                                   <label for="p_price" class="form-label">Allowance ( &#8377; )</label>
                                                   <input class="form-control"   min="0" type="number" 
                                                       placeholder="Enter allowance" name="allowance"
                                                       id="allowance" required>
                                               </div>
                                          
                                       </div>
                                           

                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Balance ( &#8377; )
                                                            </label>
                                                        <input class="form-control" min="0" type="text"
                                                            placeholder="Balance" name="balance"
                                                            id="balance" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2" <?=(($type=='d'|| $type=='c')?"":"hidden")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="off_day" class="form-label">Off Day
                                                            </label>
                                                       <select name="off_day" id="off_day" class="form-select">
                                                        <option value="Sunday">Sunday</option>
                                                        <option value="Monday">Monday</option>
                                                        <option value="Tuesday">Tuesday</option>
                                                        <option value="Wednesday">Wednesday</option>
                                                        <option value="Thursday">Thursday</option>
                                                        <option value="Friday">Friday</option>
                                                        <option value="Saturday">Saturday</option>

                                                       </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-2" <?=(($type=='t'|| $type=='a')?"hidden":"")?>>
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Date of Joining
                                                            </label>
                                                        <input class="form-control" min="0" type="date"
                                                            placeholder="" name="joining_date"
                                                            id="joining_date" required>
                                                    </div>
                                                </div>
                                            </div>
<div class="row">


                                    <div class="col-lg-4 mt-2">
                                        <div class="row">
                                        <div class="col-lg-6 mt-1">
                                            <button id="add" onclick="add_staff(this)" class="btn btn-success" style="width:100%">Add <?=($type=='d'?"Driver":($type=='c'?"Conductor":($type=='t'?"Technician":($type=='a'?'Agency':'Staff'))))?></button>
                                       
                                        </div>
                                        <div class="col-lg-6  mt-1">
                                            <button i onclick="refresh()" class="btn btn-success">Refresh</button>
                                        </div>
                                        </div>
                                        
                                    </div> 
</div>
                                    <!-- <div class="col-lg-2 mt-4">
                                        <div class="mt-1">
                                            <button i onclick="refresh()" class="btn btn-success">Refresh</button>
                                        </div>
                                    </div>                                              -->
                                    </div>
                                   

                                    
                                </div>
                          
                        </div>
                    </div>
                </div>
                <div class="row">
            <div class="col-12">
                <div class="table-wrap table-responsive">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th style="width:10%;">#</th>
                                <th>Name</th>
                                <th>Contact No</th>   
                                <?php if($type=='d'||$type=='c'){?>
                                <th>Agency</th>
                                <th>Licence No</th>
                                <th>Valid Till</th>
                                
                                 <?php } ?>  
                                <th <?=($type!='s'?"hidden":"")?>>Designation</th>   
                                <th <?=(($type=='t'||$type=='a')?"hidden":"")?> >Employee Id</th>   
                                <th>Address</th>   
                                <th <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?>>Bank A/c No</th>   
                                <th <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >IFSC Code</th>   
                                <th <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >PF A/c No</th>   
                                <th <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >ESIC A/c No</th>   
                                <th <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >Monthly basic wages</th>   
                                <th <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >Daily basic wages</th>   
                                <th <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >Allowance</th>  
                                

                                <?php if($type!='t'&& $type!='a'){?>
                           
                                <th class="text-center">Balance</th>

                                 <?php } ?>  
                                <th <?=(($type=='c' || $type=='d')?"":"hidden")?> class="text-center text-danger">Off Day</th>   
                                <th <?=(($type=='c' || $type=='d'|| $type=='s')?"":"hidden")?> class="text-center">Date of Joining</th>   


                                 <th>Status</th>
                             <th>Block / Unblock Date</th>    
                             <th>Reason</th>    


                                <th>Action</th>                               
                               
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($staff as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                  
                                  
                                    
                                    <td><?= $st['name'] ?></td>
                                    <td><?= $st['contact_no'] ?></td>  
                                    <?php if($type=='d'||$type=='c'){?>
                                    <td><?= $st['agency_name'] ?></td>  
                                    <td><?= $st['license_no'] ?></td>  
                                    <td><?= ($st['ldate']!='00-00-0000'?$st['ldate']:'') ?></td>  

                                          
                                    <?php } ?>     
                                    <td <?=($type!='s'?"hidden":"")?>><?= $st['designation'] ?></td>   
                                    <td <?=(($type=='t'||$type=='a')?"hidden":"")?>><?= $st['employee_id'] ?></td>   
                                    <td><?= $st['location_of_work'] ?></td>   
                                    <td <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['bank_ac_no'] ?></td>   
                                    <td <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['ifsc_code'] ?></td>   
                                    <td <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['pf_ac_no'] ?></td>   
                                    <td <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['esi_ac_no'] ?></td>   
                                    <td <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['monthly_basic_wages'] ?></td>   
                                    <td <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['daily_basic_wages'] ?></td>   
                                    <td <?=(($type=='t'||$type=='a')||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['allowance'] ?></td>   


                                    <?php if($type!='t'&& $type!='a'){?>
                                  
                                    <td class="text-center"><?= $st['balance'] ?></td>   

                                        
                                    <?php } ?>    
                                <td <?=(($type=='c' || $type=='d')?"":"hidden")?> class="text-center text-danger"><?= $st['off_day'] ?></td>   
                                <td <?=(($type=='c' || $type=='d' || $type=='s')?"":"hidden")?> class="text-center"><?= $st['joining_date'] ?></td>   

                                    <?php if($st['status']==1) { ?>
                                        <td><span class="badge bg-success">Active</span></td>

                                        <?php if($st['bdate']==''){?>
                                        <td></td>
                                        <td></td>
                                        <?php } else { ?>
                                        <td><span class="badge bg-success">Unblocked on <?=$st['bdate']?></span></td>
                                        <td><?=$st['block_reason']?></td>
                                   
                                        
                                        <?php } } else { ?>
                                            <td><span class="badge bg-danger">Blocked</span></td>
                                          
                                            <td><span class="badge bg-danger">Blocked on <?=$st['bdate']?></span></td>
                                            <td><?=$st['block_reason']?></td>
                                        
                                        <?php } ?>
                                    
                                                             
                                
                                    <td nowrap>
                                    <button class="btn btn-info btn-sm"  onclick="staff_edit('<?=$st['staff_id']?>','<?=$st['name']?>','<?=$st['contact_no']?>','<?=$st['agency']?>','<?=$st['balance']?>','<?=$st['is_updated']?>','<?=$st['designation']?>','<?=$st['employee_id']?>','<?=$st['location_of_work']?>','<?=$st['bank_ac_no']?>','<?=$st['ifsc_code']?>','<?=$st['pf_ac_no']?>','<?=$st['esi_ac_no']?>','<?=$st['monthly_basic_wages']?>','<?=$st['daily_basic_wages']?>','<?=$st['allowance']?>','<?=$st['license_no']?>','<?=$st['valid_till']?>','<?=$st['off_day']?>','<?=$st['joining_date']?>');">Edit</button>
                                      <?php 
                                      $role=$this->session->userdata('multitech_role_id');
                                      if($role==1) {
                                      if($st['status']==1){ ?>
                                        <button class="btn btn-danger btn-sm"  onclick="block_staff('<?=$st['staff_id']?>','<?=$st['name']?>','<?=$type?>');">Block</button>
                                    
                                    <?php } else  { ?>
                                        <button class="btn btn-success btn-sm"  onclick="block_unblock('<?=$st['staff_id']?>','<?=$st['name']?>',1);">Unblock</button>
                                        <button class="btn btn-danger btn-sm"  onclick="delete_restore_staff('<?=$st['staff_id']?>','<?=$st['name']?>',1);">Delete</button>

                                    
                                    <?php } }?>
                                          <button class="btn btn-success btn-sm"  onclick="block_history('<?=$st['staff_id']?>','<?=$st['name']?>','<?=$type?>');">Block History</button>

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


<div class="modal fade" id="blockModal" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="blockModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="block_title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input type="text" id="bstaff_id" hidden>
      <div class="modal-body">
        <div class="col-lg-12 mb-2">
            <label for="">Name</label>
            <input type="text" id="bstaff_name" class="form-control" readonly>
        </div>
        <div class="col-lg-12 mb-2">
            <label for="">Reason of Blocking</label>
            <textarea type="text" id="breason" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="block_now()">Block Now</button>

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="historyModal" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="blockModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="history_title" style="text-transform:uppercase"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input type="text" id="hstaff_id" hidden>
      <div class="modal-body">
       
        <div class="col-lg-12 mb-2">
        <div class="table-wrap table-responsive">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">

                <thead>
                    <th>#</th>
                    <th>Date</th>
                    <th>Reason</th>
                    <th>BLock By</th>

                </thead>
                <tbody id="block_body">

                </tbody>

                </table>
            </div>
       
        </div>
      </div>
      <div class="modal-footer">    
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>






<script type="text/javascript">

staff_edit=function(staff_id,name,mobile,agency,balance,is_updated,designation,emp_id,location,bank_ac,ifsc,pf_ac,esic_ac,monthly_wages,daily_wages,allowance,license_no,valid_till,off_day,joining_date)
{
    $("#staff_id").val(staff_id);
    $("#name").val(name);
    $("#mobile_no").val(mobile);
    $("#agency").val(agency);
    $("#balance").val(balance);

    $("#designation").val(designation);
    $("#emp_id").val(emp_id);
    $("#location").val(location);
    $("#bank_ac").val(bank_ac);
    $("#ifsc_code").val(ifsc);
    $("#pf_ac").val(pf_ac);
    $("#esi_ac").val(esic_ac);
    $("#monthly_wages").val(monthly_wages);
    $("#daily_wages").val(daily_wages);
    $("#allowance").val(allowance);
    $("#license_no").val(license_no);
    $("#valid_till").val(valid_till);
    $("#off_day").val(off_day);
    $("#joining_date").val(joining_date);

    

   



    $("#balance").attr('readonly',(is_updated==1?'true':false));


    $("#name").focus();
    $("#add").html("Update");

}

refresh=function()
{
   $("#name").val("");
   $("#mobile_no").val("");

   $("#staff_id").val("");
   $("#agency").val("");
   $("#designation").val("");
    $("#emp_id").val("");
    $("#location").val("");
    $("#bank_ac").val("");
    $("#ifsc_code").val("");
    $("#pf_ac").val("");
    $("#esi_ac").val("");
    $("#monthly_wages").val("");
    $("#daily_wages").val("");
    $("#allowance").val("");



   $("#add").html("Add <?=($type=='d'?'Driver':($type=='c'?'Conductor':'Technician'))?>");
}
function add_staff(x) { 


    if($("#name").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Please enter name.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }

    if($("#mobile_no").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Invalid mobile no. Please enter valid one.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }
  
    $('#loader').css("display",'block');
   $(x).attr("disabled",true);   
    var d={
        "name":$("#name").val(),
        "contact_no":$("#mobile_no").val(),
        "type":$("#type").val(),
        "agency":$("#agency").val(),     
        "balance":$("#balance").val(),        
        "designation":$("#designation").val(),
        "emp_id":$("#emp_id").val(),
        "location":$("#location").val(),
        "bank_ac":$("#bank_ac").val(),
        "ifsc_code":$("#ifsc_code").val(),
        "pf_ac":$("#pf_ac").val(),
        "esi_ac":$("#esi_ac").val(),
        "monthly_wages":$("#monthly_wages").val(),
        "daily_wages":$("#daily_wages").val(),
        "allowance":$("#allowance").val(),
        "license_no":$("#license_no").val(),
        "valid_till":$("#valid_till").val(),
        "staff_id":$("#staff_id").val(),
        "off_day":$("#off_day").val(),
        "joining_date":$("#joining_date").val()


        
    } 
    // alert("Hi");

    $.ajax({
        url: '<?= base_url('master/add_staff') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            // alert(data);
            if(data=='d'){
                Swal.fire({
                    title: 'Error!',
                    text: 'Mobile No already exist. Please try another one.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $(x).attr("disabled",false);  
                           

            }
            else if(data=='e'){
                Swal.fire({
                    title: 'Error!',
                    text: 'Employee Id already exist. Please try another one.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $(x).attr("disabled",false);   
                           

            }

            else if(data=='l'){
                Swal.fire({
                    title: 'Error!',
                    text: 'Licence No already exist. Please try another one.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $(x).attr("disabled",false);  

            }
            else if(data==1){
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: ($("#staff_id").val()==""?"Saved":"Updated")+" Successfully",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            navigator.vibrate(200);  /**Mobile vibration */
                           window.setTimeout(() => {
                            window.location.reload();
                           }, 1000);
                           

            }
        //   else
        //   {
        //     Swal.fire({
        //             title: 'Error!',
        //             text: 'Mobile no already exist. Please enter another mobile no.',
        //             icon: 'error',
        //             confirmButtonText: 'OK'
        //         });
        //         $(x).attr("disabled",false);   
              
        //   }
          $("#loader").css("display","none");
          
        },
        error:function(data)
        {
            // alert(data);
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

function block_staff(staff_id,name,type)

{
    $("#block_title").html("Block "+(type=='d'?'Driver':(type=='c'?'Conductor':'Technician')));
    $("#bstaff_id").val(staff_id);
    $("#bstaff_name").val(name);
    $("#breason").focus();


    $("#blockModal").modal("show");
}

function block_history(staff_id,name,type)

{
    $("#history_title").html("Block history of "+(type=='d'?'Driver ':(type=='c'?'Conductor ':'Technician '))+name);
    // $("#bstaff_id").val(staff_id);
    var d={
        "staff_id":staff_id
    }
   $.ajax({
    url:"<?=base_url('master/history')?>",
    method: 'POST',
    data: d,

    success:function(data)
    {
        // alert(data);
        var data1=JSON.parse(data);
            var em="";
            var i=0;
            data1.forEach(function(d)
                 {      
                    i++;           
                    em+='<tr style="cursor:pointer;font-size:9pt;" onclick='+'"get_staff('+"'"+d['staff_id']+"','"+d['name']+"','"+type+"','"+d['contact_no']+"'"+');"'+'>'
                      
                    +'<td>'                             
                              +i
                        +'</td>'
                        +'<td>'                             
                              +d['dt']
                        +'</td>'
                            +'<td>'                             
                              +d['reason']
                        +'</td>'
                        +'<td>'                             
                              +d['block_by']
                        +'</td>'

                    +'</tr>';
              
                
                                                    

                    });
                    $("#block_body").html(em);
    },
    error:function(data)
    {
       // alert(data)
    }
   })


    $("#historyModal").modal("show");
}

function block_now() { 

    if($("#breason").val().trim()=="")
    {
                        Swal.fire({
                        // position: "bottom-end",
                        customClass: 'swal-wide',
                        icon: "error",
                        title: "Please enter reason",
                        showConfirmButton: true,
                        // timer: 1500
                        });
                        navigator.vibrate(200);  /**Mobile vibration */
                    //      window.setTimeout(() => {
                    //     window.location.reload();
                    //    }, 1000);
                    return;
    }
                
                       

if(!confirm("Are you sure to block " +$("#bstaff_name").val())) return;


$('#loader').css("display",'block');


var d={
    "staff_id":$("#bstaff_id").val(),
    "reason":$("#breason").val(),
    "status":0
} 

$.ajax({
    url: '<?= base_url('block') ?>',
    method: 'POST',
    data: d,

    success: function(data) {
        // alert(data);
     
            Swal.fire({
                        // position: "bottom-end",
                        customClass: 'swal-wide',
                        // icon: "success",
                        title: "Blocked Successfully",
                        showConfirmButton: false,
                        timer: 1500
                        });
                        navigator.vibrate(200);  /**Mobile vibration */
                       window.setTimeout(() => {
                        window.location.reload();
                       }, 1000);
                       

      
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


function block_unblock(staff_id,staff,status) { 

if(!confirm("Are you sure to "+(status==1?"unblock ":"block ") +staff)) return;

$('#loader').css("display",'block');


var d={
    "staff_id":staff_id,
    "status":status
} 

$.ajax({
    url: '<?= base_url('status') ?>',
    method: 'POST',
    data: d,

    success: function(data) {
        // alert(data);
     
            Swal.fire({
                        // position: "bottom-end",
                        customClass: 'swal-wide',
                        // icon: "success",
                        title: (status==1?"Unblocked":"Blocked")+" Successfully",
                        showConfirmButton: false,
                        timer: 1500
                        });
                        navigator.vibrate(200);  /**Mobile vibration */
                       window.setTimeout(() => {
                        window.location.reload();
                       }, 1000);
                       

      
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

function delete_restore_staff(staff_id,staff,status) { 

if(!confirm("Are you sure to "+(status==1?"Deleted ":"Restore ") +staff)) return;

$('#loader').css("display",'block');


var d={
    "staff_id":staff_id,
    "status":status
} 

$.ajax({
    url: '<?= base_url('delete_restore') ?>',
    method: 'POST',
    data: d,

    success: function(data) {
        // alert(data);
     
            Swal.fire({
                        // position: "bottom-end",
                        customClass: 'swal-wide',
                        // icon: "success",
                        title: (status==1?"Deleted":"Restored")+" Successfully",
                        showConfirmButton: false,
                        timer: 1500
                        });
                        navigator.vibrate(200);  /**Mobile vibration */
                       window.setTimeout(() => {
                        window.location.reload();
                       }, 1000);
                       

      
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

daily_wages=function(x)
{
    $("#daily_wages").val((Number($(x).val())/30).toFixed(2));
}
</script>