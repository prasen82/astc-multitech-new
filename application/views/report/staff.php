<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Active <?=$page_name?></h4>
                        

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Report</a></li>
                                <li class="breadcrumb-item active"><?=$page_name?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>              
                  
                            <div class="row mb-3"  <?=(($type=='d' || $type=='c')?'':'hidden')?> >
                                    <div class="col-lg-12">
                                            <form action="<?=base_url(($type=='d'?'drivers':'conductors'))?>" method="POST">
                                                <div class="row">
                                                   
                                                    <div class="col-sm-3">
                                                        <table class="table table-borderless" style="width:500px;">
                                                            <td style="width:10%;"><h5>Agency</h5></td>
                                                        
                                                        <td ><select name="agency" id="agency" class="form-select">
                                                                <option value="0">Select Agency</option>
                                                                <?php foreach($agency as $ag){?>
                                                                <option <?=($agency_id==$ag['staff_id']?"selected":"")?> value="<?=$ag['staff_id']?>"><?=$ag['name']?></option>
                                                                <?php } ?>
                                                        </select></td>
                                                        <td><button class="btn btn-info ">Display</button></td>
                                                        </table>
                                                        
                                                    </div>
                                                
                                                
                                            </div>
                                        </form>  
                                </div>
                          
                        </div>
<hr>
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
                                
                                 <?php } ?>  
                                <th <?=($type!='s'?"hidden":"")?>>Designation</th>   
                                <th>Employee Id</th>   
                                <th>Address</th>   

                                <th <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?>>Bank A/c No</th>   
                                <th  <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >IFSC Code</th>   
                                <th <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >PF A/c No</th>   
                                <th <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >ESIC A/c No</th>   
                                <th <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >Monthly basic wages</th>   
                                <th <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >Daily basic wages</th>   
                                <th <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> >Allowance</th>  
                              
                                
                                

                                <?php if($type!='t'){?>
                           
                                <th class="text-center">Balance</th>

                                 <?php } ?>  
                                 <th <?=(($type=='c' || $type=='d')?"":"hidden")?> class="text-center text-danger">Off Day</th>   
                             <th>Status</th>                          
                                                          
                               
                               
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
                                          
                                    <?php } ?>     
                                    <td <?=($type!='s'?"hidden":"")?>><?= $st['designation'] ?></td>   
                                    <td><?= $st['employee_id'] ?></td>   
                                    <td><?= $st['location_of_work'] ?></td>   
                                    <td <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['bank_ac_no'] ?></td>   
                                    <td <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['ifsc_code'] ?></td>   
                                    <td <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['pf_ac_no'] ?></td>   
                                    <td <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['esi_ac_no'] ?></td>   
                                    <td <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['monthly_basic_wages'] ?></td>   
                                    <td <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['daily_basic_wages'] ?></td>   
                                    <td <?=($type=='t'||($this->session->userdata('multitech_role_id')!=1 && $this->session->userdata('multitech_role_id')!=5)?"hidden":"")?> ><?= $st['allowance'] ?></td>   
 

                                    <?php if($type!='t'){?>                                  
                                   
                                 
                                    
                                        <td class="text-center"><a href="#" onclick="transaction_details('<?=$st['staff_id']?>','<?=$st['name']?>','<?=$st['contact_no']?>')"><?= $st['balance'] ?></a></td>
                               
                                        
                                    <?php } ?>    
                                    <td <?=(($type=='c' || $type=='d')?"":"hidden")?> class="text-center text-danger"><?=$st['off_day']?></td>  
                                    <td>
                                        <?php if($st['status']==1) { ?>
                                        <span class="badge bg-success">Active</span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger">Blocked on <?=$st['bdate']?></span>
                                            <br><span class="text-danger"><?=$st['block_reason']?></span>


                                        
                                        <?php } ?>
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

<form action="<?=base_url('transaction_details')?>" id="transaction" method="POST" hidden>
<input type="text" id="staff_id" name="staff_id" >
<input type="text" id="staff_name" name="staff_name" >
<input type="text" id="contact_no" name="contact_no" >


<input type="text" id="type" name="type" value="<?=$type?>">

</form>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script type="text/javascript">

$(document).ready(function(){
             <?php if($type=='d') { ?>
                   var txt="ACTIVE DRIVERS "+($("#agency").val()=='0'?'':"OF "+$("#agency  option:selected").text());
                <?php } else if($type=='c'){ ?>                
                    var txt="ACTIVE CONDUCTORS "+($("#agency").val()=='0'?'':"of "+$("#agency  option:selected").text());;
                    <?php } else if($type=='t'){ ?>                
                        var txt="ACTIVE TECHNICIAN";
                        <?php } else if($type=='s'){ ?>                
                            var txt="ACTIVE STAFFS";
                            <?php } else { ?>                
                                var txt="ACTIVE AGENCIES";
            <?php } ?>    
            //   alert(txt);
        $('title').html(txt);
    });


    transaction_details=function(staff_id,name,contact_no)
    {
        $("#staff_id").val(staff_id);
        $("#staff_name").val(name);
        $("#contact_no").val(contact_no);

        $("#transaction").submit();


    }

get_staff=function(staff_id,name,type,mobile)
{
   
   if(type=='d')
    {
        $("#d_mobile").html("Mobile No :"+mobile);
        $("#driver_id").val(staff_id);
        $("#driver_name").val(name);
        $("#driver_list").css("display","none");
    }
    else
    {
        $("#c_mobile").html("Mobile No :"+mobile);
        $("#conductor_id").val(staff_id);
        $("#conductor_name").val(name);
        $("#conductor_list").css("display","none");
    }  

}

staff=function(x,type)
{
    if(type=='d') $("#d_mobile").html("");
    else $("#c_mobile").html("");
   
    if($(x).val().length<3)
    {
        $("#driver_list").html("");      
         $("#driver_list").css("display","none");
         $("#conductor_list").css("display","none");
        return;
    }
   
    var d={
        "search":$(x).val(),
        "type":type
    }

    $.ajax({
        url: '<?= base_url('view_staff') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            var data1=JSON.parse(data);
            var em="";
            data1.forEach(function(d)
                 {      
                                               
                    em+='<table class="table table-striped">'                  
                   
                    +'<tbody>'
                      
                        +'<tr style="cursor:pointer;" onclick='+'"get_staff('+"'"+d['staff_id']+"','"+d['name']+"','"+type+"','"+d['contact_no']+"'"+');"'+'>'
                        //     +'<td>'                             
                        //       +d['staff_id']
                        // +'</td>'
                   
                            +'<td>'                             
                              +d['name']
                        +'</td>'
                    +'</tr>'
              
            +'</tbody>'
            +'</table>';           
                                                    

                    });
        
                    if(type=='d') 
                    {
                        $("#driver_list").html(em);    
                        $("#driver_list").css("display",(em==""?"none":"block"));   
                    }
                    else 
                    {
                        $("#conductor_list").html(em);    
                        $("#conductor_list").css("display",(em==""?"none":"block"));   
                    }
           


        },
        error:function(data)
        {

        }
    })
}



// $(function() {
//   $('.selectpicker').selectpicker();
// });

bus_edit=function(vehicle_id,vehicle_no,driver_name,driver_mobile,conductor_name,conductor_mobile,driver_id,conductor_id)
{
    $("#vehicle_id").val(vehicle_id);
    $("#vehicle_no").val(vehicle_no);
    $("#driver_name").val(driver_name);
    $("#d_mobile").val(driver_mobile);

    $("#conductor_name").val(conductor_name);
    $("#c_mobile").val(conductor_mobile);
    $("#driver_id").val(driver_id);
    $("#conductor_id").val(conductor_id);

    $("#vehicle_no").focus();
    $("#add").html("Update");

}

refresh=function()
{
   $("#vehicle_id").val("");
   $("#vehicle_no").val("");
   $("#driver_name").val("");
   $("#conductor_id").val("");
   $("#driver_id").val("");
   $("#conductor_name").val("");

   $("#add").html("Save");
}
function add_bus(x) { 


    if($("#vehicle_no").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Please enter vehicle no.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }

    if($("#driver_id").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Invalid driver. Please choose valid one.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }

    if($("#conductor_id").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Invalid conductor. Please choose valid one.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }      
  
    $('#loader').css("display",'block');
    $(x).attr("disabled",true);   

    var d={
        "vehicle_no":$("#vehicle_no").val().toUpperCase(),
        "driver_id":$("#driver_id").val(),
        "vehicle_id":$("#vehicle_id").val(),
        "conductor_id":$("#conductor_id").val()
    } 

    
    $.ajax({
        url: '<?= base_url('master/add_bus') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            // alert(data);
            if(data==1){
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: ($("#vehicle_id").val()==""?"Saved":"Updated")+" Successfully",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            navigator.vibrate(200);  /**Mobile vibration */
                           window.setTimeout(() => {
                            window.location.reload();
                           }, 1000);
                           

            }
          else
          {
            Swal.fire({
                    title: 'Error!',
                    text: 'Bus already entered. Please try another one.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $(x).attr("disabled",false);   
              
          }
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

</script>