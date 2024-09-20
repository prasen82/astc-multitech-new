<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fa fa-bus"></i> <?=$page_name?></h4>
                            <span class="text-danger">** Only the departure logsheet will be editable. Once the logsheet is closed you will not be able to edit it.</span>
                            <input type="text" id='type' name='type' hidden value="<?=$type?>" />

                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                           
                                <div class="row">
                                    <div class="col-lg-12">
                                    <form action="<?=base_url('logsheet')?>" method="POST">
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
                                <?php if($this->session->userdata('multitech_role_id')==1) {?>
                                    <th>Action</th>
                                   <?php } ?> 
                                <th>Vehicle No</th>
                                <th>Depot</th>
                                <th>Log Date</th>    
                                <th>Departure Time</th>  
                                <th>Closing Time</th>     
                                <th>Driver Name</th> 
                                <th>Mobile No</th> 
                                <th>Agency</th> 

                               
                                <th>Conductor Name</th> 
                                <th>Mobile No</th> 
                                <th>Agency</th> 

                                <th>Route No</th>  
                                <th>Route Name</th>    

                                <th>Place</th>
                                <th>Opening SOC</th>
                                <th>Closing SOC</th>
                                <th>Consumed SOC</th>
                                <th>Opening Km</th>

                                <th>Closing Km</th>
                                <th>Covered Km</th>
                                <th>Ticket Count</th>
                                <th>As Per Chalo Collection</th>
                                <th>Phone Pay Collection</th>

                                <th>Cash Collection</th>
                                <th>Total Collection</th>


                                <th>Departure Remarks</th>
                                <th>Closing Remarks</th>
                                             

                                <th>Print</th>                               
                               
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($log as $st) {                             

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                    <?php if($this->session->userdata('multitech_role_id')==1) {?>
                                        <td>
                                        <?php  if($st['attendance_status']==1){?>
                                        <button class="btn btn-danger btn-sm" onclick="present_absent(0,'<?=$st['log_id']?>');">Mark as absent</button>
                                    <?php
                                    } else {
                                    ?>
                                     <button class="btn btn-success btn-sm" onclick="present_absent(1,'<?=$st['log_id']?>');">Mark as present</button>

                                    <?php } ?>
                                    </td>
                                    <?php } ?>
                                    <td><?= $st['vehicle_no'] ?><?php if($this->session->userdata('multitech_role_id')==1 && $st['closing_charge']==0){?>
                                        <i class="fa fa-edit text-success" style="cursor:pointer" onclick="edit_logsheet('<?=$st['log_id']?>','<?=$st['vehicle_no']?>','<?=$st['depo']?>','<?=$st['dname']?>','<?=$st['cname']?>','<?=$st['driver_staff_id']?>','<?=$st['conductor_staff_id']?>','<?=$st['route_no']?>','<?=$st['route_name']?>','<?=$st['target']?>','<?=$st['place']?>','<?=$st['opening_charge']?>','<?=$st['opening_meter_reading']?>','<?=$st['departure_reamrks']?>','<?=$st['rtarget']?>',)"></i>
                                        <?php } ?>
                                       
                                    </td>
                                    <td><?= $st['depo'] ?></td>
                                    <td><?= $st['ldate'] ?></td>
                                    <td><?= $st['dtime'] ?></td>
                                    <td><?= $st['ctime'] ?></td>
                                    <td><?= $st['dname'] ?><br>
                                   
                                   </td> 
                                    <td><?= $st['dmobile'] ?></td>
                                    <td><?= $st['dagency'] ?></td>


                                    <td><?= $st['cname'] ?></td>   
                                    <td><?= $st['cmobile'] ?></td>
                                    <td><?= $st['cagency'] ?></td> 
                                    <td><?= $st['route_no'] ?></td>                                   
                                    <td><?= $st['route_name'] ?></td>   

                                    <td><?= $st['place'] ?></td>   
                                    <td><?= $st['opening_charge'] ?></td> 
                                    <td><?= $st['closing_charge'] ?></td> 
                                    <td><?= ($st['closing_charge']==0?0:$st['opening_charge']-$st['closing_charge']) ?></td>                                      
                                    <td><?= $st['opening_meter_reading'] ?></td> 

                                    <td><?= $st['closing_meter_reading'] ?></td>       
                                    <td><?=  ($st['closing_meter_reading']==0?0:$st['closing_meter_reading'] -$st['opening_meter_reading']) ?></td>   
                                    <td style="text-align:right">&#8377; <?= $st['ticket_count'] ?></td>       
                                    <td style="text-align:right">&#8377; <?= $st['machine_collection'] ?></td>       
                                    <td style="text-align:right">&#8377; <?= $st['phone_pay_collection'] ?></td>       
                                    
                                    <td style="text-align:right">&#8377; <?= $st['cash_collection'] ?></td>       
                                    <td style="text-align:right">&#8377; <?= $st['total'] ?></td>       

                                    <td><?= $st['departure_reamrks'] ?></td>     
                                    <td><?= $st['closing_remarks'] ?></td>                                                                 
                                
                                    <td nowrap>
                                    <a href="#" onclick="print_log('<?=$st['log_id']?>')">
                                         <i class="fa fa-print" style="font-size:14pt"></i>
                                        </a>
                                    
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

<input type="text" name="from" value="<?=$from?>">
<input type="text" name="to" value="<?=$to?>">


</form>



<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Edit Logsheet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
                                    
                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Vehicle No *</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Vehicle No" name="vehicle_no"
                                                    id="vehicle_no" readonly required style="text-transform: uppercase;" onblur="bus_details(this);" value="AS20" autofocus onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-3">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Depot</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Enter dipo" name="depo"
                                                    id="depo" required value="Rupnagar" readonly>
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-3" >
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Driver *</label>
                                               
                                                <input class="form-control" type="text"
                                                    placeholder="driver" name="driver_name"
                                                    id="driver_name" required oninput="staff(this,'d');">
                                                    <small class="text-info" id="d_mobile"></small>
                                                <div class="bg-light" id="driver_list" style="position:absolute;width:95%;z-index:10000;max-height:200px;overflow-Y:auto;border:1px solid gray;display:none" >
                                                 
                                                </div>    
                                            </div>
                                       
                                    </div>

                                    <div class="col-lg-3">                                              
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Conductor *</label>
                                                <input class="form-control" type="text"
                                                    placeholder="conductor" name="conductor_name"
                                                    id="conductor_name" required oninput="staff(this,'c');">
                                                   <small class="text-info" id="c_mobile"></small>
                                                    <div id="conductor_list" class="bg-light" style="position:absolute;width:100%;z-index:10000;max-height:200px;overflow-Y:auto;border:1px solid gray;display:none" > </div>
                                      
                                             </div>      
</div>                                       

                                    

                                    
                                    <input type="text" id='vehicle_id' name='vehicle_id' hidden/>
                                    <input type="text" id='logsheet_id' name='logsheet_id' hidden/>


                                    <input type="text" id='driver_id' name='driver_id' hidden/>
                                    <input type="text" id='conductor_id' name='conductor_id' hidden/>

                          
                        </div>
                        

                        <div class="row">
                           
                               
                           <div class="col-lg-3">
                              
                                   <div class="mb-3">
                                       <label for="name" class="form-label">Route No *</label>
                                       <select name="route_no" id="route_no" class="form-select" onchange="find_route(this);">
                                        <option value="">select route</option>
                                        <?php foreach($route as $rt){ ?>
                                             <option value="<?=$rt['route_no'].'?'.$rt['route_name'].'?'.$rt['target']?>"><?=$rt['route_no']?></option>
                                        <?php } ?>

                                       </select>
                                       </div>
                              
                           </div>

                           <div class="col-lg-6" >
                              
                                   <div class="mb-3">
                                       <label for="name" class="form-label">Route Name </label>
                                      
                                       <input class="form-control" type="text"
                                           placeholder="Route Name" name="route_name"
                                           id="route_name" required readonly>
                                                 
                                       </div>    
                                   
                              
                           </div>
                           <div class="col-lg-3" >
                              
                                   <div class="mb-3">
                                       <label for="name" class="form-label">Target</label>
                                      
                                       <input class="form-control" type="text"
                                           placeholder="Target" name="target"
                                           id="target" required >
                                                 
                                       </div>    
                                   
                              
                           </div>
                 
               </div>
               <div class="row">
                           
                               
                                    <div class="col-lg-4">
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Place *</label>
                                                <input name="place" id="place" class="form-control" readonly>
                                               

                                                </div>
                                       
                                    </div>

                                    <div class="col-lg-4" >
                                       
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Opening SOC *</label>
                                               
                                                <input class="form-control" type="text"
                                                    placeholder="Opening SOC" name="opening_soc"
                                                    id="opening_soc" required >
                                                          
                                               
                                            </div>
                                       
                                    </div>
                                    
                                    <div class="col-lg-4" >
                                       
                                       <div class="mb-3">
                                           <label for="name" class="form-label">Opening Meter Reading ( km ) *</label>
                                          
                                           <input class="form-control" type="text"
                                               placeholder="Opening Meter Reading" name="opening_reading"
                                               id="opening_reading" required >
                                                     
                                          
                                       </div>
                                  
                               </div>

                                    
                          
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="remarks">Remarks</label>
                                <input type="text" class="form-control" id="remarks">
                            </div>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="log_update();">Update</button>
      </div>
    </div>
  </div>
</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script type="text/javascript">


print_log=function(log_id)
{
  
    $("#log_id").val(log_id);    
    $("#printsheet").submit();

}


edit_logsheet=function(log_id,vehicle_no,depo,dname,cname,driver_staff_id,conductor_staff_id,route_no,route_name,target,place,opening_charge,opening_meter_reading,departure_reamrks,route_target)
      {
        // alert(route_name);
        $("#logsheet_id").val(log_id);
        $("#vehicle_no").val(vehicle_no);
        $("#depo").val(depo);
        $("#driver_name").val(dname);
        $("#conductor_name").val(cname);
        $("#driver_id").val(driver_staff_id);
        $("#conductor_id").val(conductor_staff_id);
      
        $("#route_no").val(route_no+"?"+route_name+"?"+route_target);
        $("#route_name").val(route_name);
        $("#target").val(target);
        $("#place").val(place);
        $("#opening_soc").val(opening_charge);
        $("#opening_reading").val(opening_meter_reading);
        $("#remarks").val(departure_reamrks);
       
        
        $("#editModal").modal("show");
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


find_route=function(x)
    {
    
        var r=$(x).val().split("?");
        $("#route_name").val(r[1]);
        $("#target").val(r[2]);

    }


 
function log_update() {    

    
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
          
          
    if($("#route_no").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Please select route.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }
          
    if($("#opening_soc").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Please enter opening SOC.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }      
  
    if($("#opening_reading").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Please enter opening meter reading .',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          } 
    $('#loader').css("display",'block');
    // $("#add").attr("disabled",true);   
    // alert($('#route_no').val());

    var r=$('#route_no').val().split("?");

    // alert("sf");

     
    var d={
        "logsheet_id":$("#logsheet_id").val(),
        "driver_id":$("#driver_id").val(),  
        "conductor_id":$("#conductor_id").val(),        
        "route":$("#route_name").val(),
        "route_no":r[0],
        "opening_soc":$("#opening_soc").val(),
        "opening_reading":$("#opening_reading").val(),
        "target":$("#target").val(),
        "remarks":$("#remarks").val()
        
    } 
    
    $.ajax({
        url: '<?= base_url('master/log_update') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            // alert(JSON.parse(data));
            if(JSON.parse(data)=="d")
            {
             Swal.fire({
                    title: 'Error!',
                    text: 'Log sheet already generated for the vehicle no  '+$("#vehicle_no").val().toUpperCase()+' or for above the mentioned driver or the conductor.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                // $("#add").attr("disabled",false);   
              
              }
           else{
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            icon: "success",
                            title: "Saved Successfully",
                            // confirmButtonText: 'OK'
                            });
                         
                            navigator.vibrate(200);  /**Mobile vibration */
                           window.setTimeout(() => {
                            window.location.reload();
                           }, 1000);

                     //   $("#log_id").val(data);
                     //   $("#printsheet").submit();
    // return;
    //                     refresh();
    //                     $("#add").attr("disabled",false);   
                        
                           

            }
        //   else
        //   {
        //     Swal.fire({
        //             title: 'Error!',
        //             text: 'Log sheet already generated for the vehicle no .'+$("#vehicle_no").val().toUpperCase(),
        //             icon: 'error',
        //             confirmButtonText: 'OK'
        //         });
        //         $("#add").attr("disabled",false);   
              
        //   }
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
                // $("#add").attr("disabled",false);   
        }
    })
}



present_absent=function(status,log_id)
{
    if(!confirm("Are you sure to mark as "+(status==0?"absent":"present")));
    
     
    var d={
        "logsheet_id":log_id,
       
        "status":status
        
    } 
    
    $.ajax({
        url: '<?= base_url('master/present_absent') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            // alert(JSON.parse(data));
         
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            icon: "success",
                            title: (status==0?"Marked as absent successfully":"Marked as present successfully"),
                            // confirmButtonText: 'OK'
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
                // $("#add").attr("disabled",false);   
        }
    })
}

</script>