<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row" >
                <div class="col-10" style="margin-left:auto;margin-right:auto;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fa fa-bus"></i> <?=$page_name?></h4>
                            <span class="text-danger" style="font-size:14pt;" id="datetime"></span>

                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                           
                                <div class="row">
                                    
                                            <div class="col-lg-3">
                                               
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Vehicle No *</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Vehicle No" name="vehicle_no"
                                                            id="vehicle_no" required style="text-transform: uppercase;" onblur="bus_details(this);" value="AS20" autofocus onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">
                                                    </div>
                                               
                                            </div>

                                            <div class="col-lg-3">
                                               
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Depot</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter dipo" name="depo"
                                                            id="depo" required value="Rupnagar">
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
                                                     <option value="<?=$rt['route_no'].'?'.$rt['route_name'].'?'.($day=='Sunday'?($rt['target']>=1000?$rt['target']-1000:$rt['target']):$rt['target'])?>"><?=$rt['route_no']?></option>
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
                                                   id="target" required readonly>
                                                         
                                               </div>    
                                           
                                      
                                   </div>
                         
                       </div>
                       <div class="row">
                                   
                                       
                                            <div class="col-lg-4">
                                               
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Place *</label>
                                                        <select name="place" id="place" class="form-select">
                                                        <?php foreach($place as $rt){ ?>
                                                     <option value="<?=$rt['place']?>"><?=$rt['place']?></option>
                                                <?php } ?>

                                                        </select>
                                                        </div>
                                               
                                            </div>

                                            <div class="col-lg-4" >
                                               
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Opening SOC (State of cherge) *</label>
                                                       
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
                                <div class="row">
                                <div class="col-lg-3 mt-3">
                                                    <div class="row">
                                                            <div class="col-lg-6 mt-1">
                                                                <button id="add" onclick="log_submit()" class="btn btn-success" style="width:100%">Submit</button>
                                                        
                                                            </div>
                                                            <div class="col-lg-6  mt-1">
                                                                <button i onclick="refresh()" class="btn btn-success">Refresh</button>
                                                            </div>
                                                    </div>
                                                    
                                            </div> 
                                            
                                </div>
                                <div class="row mt-3">
                                    <span class="text-danger">** All fields are mandatory</span>
                                </div>
                          
                        </div>
                    </div>
                </div>              
            </div>
    </div>
</div>
<form action="<?=base_url('print_logsheet')?>" method="POST" id="printsheet" hidden>
    <input type="text" id="log_id" name="log_id">
    <input type="text" id="type"  name="type" value="d" >


</form>



<div class="modal" tabindex="-1" id="confirmation">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-danger">
        <i class="fa fa-exclamation"> Warning</i>
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-danger">
        <span >Following issues are still not resolved</span>
        <ul id="issue">
            

        </ul>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12 text-left mb-2">
        <span class="text-success">** Still you want to generate the logsheet then click on continue.</span>

        </div>


        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="log_save();">Continue</button>
      </div>
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="absentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="absentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title fs-8 text-danger" id="modalTitle" >Absent Update</h6>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <input type="text" id="absent_staff_id" hidden>
      <div class="modal-body">
        <select name="reason" id="reason" class="form-select">
            <option value="">Select Reason</option>
            <?php foreach ($condition as $cn) {?>
               <option value="<?=$cn['id']?>"><?=$cn['condition']?></option>
            <?php }?>
        </select>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" onclick="submit_absent_reason();">Submit</button>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script type="text/javascript">



    find_route=function(x)
    {
     
        var r=$(x).val().split("?");
        $("#route_name").val(r[1]);
        $("#target").val(r[2]);

    }

bus_details=function(x)
{
    var em="";
    $("#issue").html("");
    $("#loader").css("display","block");
    var d={
        "vehicle_no":$(x).val()
    }

    $.ajax({
        url:"<?=base_url('master/vehicle')?>",
        type:"POST",
        dataType:"JSON",
        data:d,
        success:function(data)
        {
            var driver_name_="";                
            var driver_id="";
            var conductor_name_="";                
            var conductor_id="";
        //    var data1=JSON.parse(data);
        // alert(data['is_penalty']);
            data['bus'].forEach(function(d)
            {
                
                $("#vehicle_id").val(d['vehicle_id']);
               
               

                if(d['dstatus']==1) {
                    $("#driver_id").val(d['driver_staff_id']);
                    $("#driver_name").val(d['dname']);

                    
                    $("#d_mobile").html("Mobile : "+d['dmobile']);
                     driver_name_=d['dname'];
                
                     driver_id=d['driver_staff_id'];


                    
                }
                if(d['cstatus']==1) {
                    $("#conductor_id").val(d['conductor_staff_id']);
                    $("#conductor_name").val(d['cname']);
                    $("#c_mobile").html("Mobile : "+d['cmobile']);

                    conductor_name_=d['cname'];                
                    conductor_id=d['conductor_staff_id'];
                }
             
                
               


                
                 })

                //  Issue not resolved
              
                data['issue'].forEach(function(d)
                 {
                
                       em+="<li>"+d['work_description']+"<span class='text-info'> - "+d['remarks']+"<span></li>";
                
                 }
                
               
         
            )
              $("#issue").html(em);
            //   $("#opening_soc").val(data['opening_soc']);
              $("#opening_reading").val(data['opening_km']);

              $("#loader").css("display","none");
              if(data['driver_penalty'])
              {
                                  
                    var msg="! Driver <b style='color:blue;'>"+driver_name_+"</b> was absent. Please update the proper reason of absent to continue.";
                //    absent_update(driver_id,msg);
              }
              else if(data['conductor_penalty'])
              {
                    var msg="! Conductor <b style='color:orange;'>"+conductor_name_+"</b> was absent. Please update the proper reason of absent to continue.";
                //    absent_update(conductor_id,msg);
              }

        }
    })
}

get_staff=function(staff_id,name,type,mobile)
{
   
   if(type=='d')
    {
        $("#d_mobile").html("Mobile No :"+mobile);
        $("#driver_id").val(staff_id);
        $("#driver_name").val(name);
        $("#driver_list").css("display","none");
    //    is_penalty(staff_id,type);
    }
    else
    {
        $("#c_mobile").html("Mobile No :"+mobile);
        $("#conductor_id").val(staff_id);
        $("#conductor_name").val(name);
        $("#conductor_list").css("display","none");
    //    is_penalty(staff_id,type);

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
                      
                        +'<tr style="cursor:pointer;font-size:9pt;" onclick='+'"get_staff('+"'"+d['staff_id']+"','"+d['name']+"','"+type+"','"+d['contact_no']+"'"+');"'+'>'
                        //     +'<td>'                             
                        //       +d['staff_id']
                        // +'</td>'
                   
                            +'<td>'                             
                              +d['name']+" ( "+d['employee_id']+" ) "
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





refresh=function()
{
   $("#vehicle_id").val("");
   $("#vehicle_no").val("");
   $("#driver_name").val("");
   $("#conductor_id").val("");
   $("#driver_id").val("");
   $("#conductor_name").val("");
   $("#route").val("");
   $("#route_no").val("");
   $("#opening_soc").val("");
   $("#opening_reading").val("");
   $("#remarks").val("");
//    $("#depo").val("");




   $("#add").html("Save");
}

log_submit=function()
{
   
    if($("#issue").html()=="") log_save();
    else
    {
        $("#confirmation").modal("show");
        // $("#printsheet").submit();
    }


}

function log_save() { 

    

    $("#confirmation").modal("hide");

    if($("#vehicle_id").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Invalid vehicle no.',
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
    $("#add").attr("disabled",true);   
    var r=$('#route_no').val().split("?");
    var d={
        "vehicle_no":$("#vehicle_no").val().toUpperCase(),
        "driver_id":$("#driver_id").val(),  
        "conductor_id":$("#conductor_id").val(),        
        "route":$("#route_name").val(),
        "route_no":r[0],
        "place":$("#place").val(),
        "opening_soc":$("#opening_soc").val(),
        "opening_reading":$("#opening_reading").val(),
        "depo":$("#depo").val(),
        "target":$("#target").val(),
        "remarks":$("#remarks").val()

        
    } 

    
    $.ajax({
        url: '<?= base_url('master/log_save') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            // alert(JSON.parse(data));
            if(JSON.parse(data)=="c")            
            {
             Swal.fire({
                    title: 'Error!',
                    text: 'You can not generate shutdown attendance logsheet after 4:00 PM',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $("#add").attr("disabled",false);   
              
              }
            else if(JSON.parse(data)=="d")            
            {
             Swal.fire({
                    title: 'Error!',
                    text: 'Log sheet already generated for the vehicle no  '+$("#vehicle_no").val().toUpperCase()+' or for above the mentioned driver or the conductor.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $("#add").attr("disabled",false);   
              
              }
           else{
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            icon: "success",
                            title: "Saved Successfully",
                            confirmButtonText: 'OK'
                            });
                        //     navigator.vibrate(200);  /**Mobile vibration */
                        //    window.setTimeout(() => {
                        //     window.location.reload();
                        //    }, 1000);

                        $("#log_id").val(data);
                        $("#printsheet").submit();
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
                $("#add").attr("disabled",false);   
        }
    })
}

</script>

<!-- Date time -->
<script>
      // create a function to update the date and time
      function updateDateTime() {
        // create a new `Date` object
        var date = new Date();
        var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        var am_pm = date.getHours() >= 12 ? "PM" : "AM";
        hours = hours < 10 ? "0" + hours : hours;
        var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
        time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
        
        const date1 = new Date().toLocaleDateString('en-GB');
        // update the `textContent` property of the `span` element with the `id` of `datetime`
        // document.querySelector('#datetime').textContent = date1+" "+time;
        document.querySelector('#datetime').textContent = time;

      }

      // call the `updateDateTime` function every second
      setInterval(updateDateTime, 1000);


    </script>
    <script>

        is_penalty=function(staff_id,type)
        {


            $('#loader').css("display",'block');
            var d={
                
                "staff_id":staff_id,
                "type":type
                
            } 


$.ajax({
    url: '<?= base_url('master/check_penalty') ?>',
    method: 'POST',
    data: d,

    success: function(data) {
        var data_=JSON.parse(data);
        // $("#absentModal").modal("hide");

      
        if(data_['is_penalty'])            
        {
                        if(type=='d')
                        {
                            var msg="! Driver <b style='color:blue;'>"+$("#driver_name").val()+"</b> was absent. Please update the proper reason of absent to continue.";
                        //    absent_update($("#driver_id").val(),msg);
                        }
                        else
                        {
                            var msg="! Conductor <b style='color:orange;'>"+$("#conductor_name").val()+"</b> was absent. Please update the proper reason of absent to continue.";
                            // absent_update($("#conductor_id").val(),msg);
                        }
                   
          }
       else  $("#absentModal").modal("hide");
         
      
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
       
    }
})

        }
        absent_update=function(staff_id,msg)
        {
        //    alert(msg);
            $("#reason").val("");
            $("#absent_staff_id").val(staff_id);
            $("#modalTitle").html(msg);
            $("#absentModal").modal("show");
        }

        
function submit_absent_reason() { 


if($("#reason").val()=="")
{
        Swal.fire({
                title: 'Error!',
                text: 'Please choose valid reason.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
          return;
      }


      
      

$('#loader').css("display",'block');

var d={
   
    "driver_id":$("#driver_id").val(),  
    "conductor_id":$("#conductor_id").val(),        
    "staff_id":$("#absent_staff_id").val(),  
    "reason":$("#reason").val()    
} 


$.ajax({
    url: '<?= base_url('master/absent_reason_update') ?>',
    method: 'POST',
    data: d,

    success: function(data) {
        var data_=JSON.parse(data);
        // $("#absentModal").modal("hide");

        if(!data_['driver_penalty'] && !data_['conductor_penalty'] )    $("#absentModal").modal("hide");
        if(data_['driver_penalty'])            
        {
                        
          
                    var msg="! Driver <b style='color:blue;'>"+$("#driver_name").val()+"</b> was absent. Please update the proper reason of absent to continue.";
                    // absent_update($("#driver_id").val(),msg);
          }
        else if(data_['conductor_penalty'])            
        {
       
                    
                    var msg="! Conductor <b style='color:orange;'>"+$("#conductor_name").val()+"</b> was absent. Please update the proper reason of absent to continue.";
                //    absent_update($("#conductor_id").val(),msg);
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
       
    }
})
}

    </script>

   