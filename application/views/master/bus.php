<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fa fa-bus"></i> <?=$page_name?></h4>
                            <input type="text" id='type' name='type' hidden value="<?=$type?>" />

                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                           
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                               
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Vehicle No</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Vehicle No" name="vehicle_no"
                                                            id="vehicle_no" required style="text-transform: uppercase;">
                                                    </div>
                                               
                                            </div>

                                            <div class="col-lg-3" >
                                               
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Driver</label>
                                                       
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
                                                        <label for="name" class="form-label">Conductor</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="conductor" name="conductor_name"
                                                            id="conductor_name" required oninput="staff(this,'c');">
                                                       <small class="text-info" id="c_mobile"></small>
                                                            <div id="conductor_list" class="bg-light" style="position:absolute;width:100%;z-index:10000;max-height:200px;overflow-Y:auto;border:1px solid gray;display:none" >
                                                           
                                                        </div>    
                                                    </div>
                                              
                                            </div>                                    

                                            

                                            
                                            <input type="text" id='vehicle_id' name='vehicle_id' hidden/>

                                            <input type="text" id='driver_id' name='driver_id' hidden/>
                                            <input type="text" id='conductor_id' name='conductor_id' hidden/>


                             
                                            <div class="col-lg-3 mt-4">
                                                    <div class="row">
                                                            <div class="col-lg-6 mt-1">
                                                                <button id="add" onclick="add_bus(this)" class="btn btn-success" style="width:100%">Save</button>
                                                        
                                                            </div>
                                                            <div class="col-lg-6  mt-1">
                                                                <button i onclick="refresh()" class="btn btn-success">Refresh</button>
                                                            </div>
                                                    </div>
                                                    
                                            </div> 
                                   
                                    </div>
                                   

                                    
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
                                <th style="width:10%;">#</th>
                                <th>Vehicle No</th>
                                <th>Driver Name</th> 
                                <th>Driver Contact No</th>   
                                <th>Conductor Name</th> 
                                <th>Conductor Contact No</th>                                

                                <th>Action</th>                               
                               
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($bus as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                  
                                  
                                    
                                    <td><?= $st['vehicle_no'] ?></td>
                                    <td><?= $st['driver_name'] ?></td>     
                                    <td><?= $st['driver_mobile'] ?></td>                                   
                                    <td><?= $st['conductor_name'] ?></td>                                   
                                    <td><?= $st['conductor_mobile'] ?></td>                 
                                                                  


                                                             
                                
                                    <td nowrap>
                                    <button class="btn btn-info btn-sm"  onclick="bus_edit('<?=$st['vehicle_id']?>','<?=$st['vehicle_no']?>','<?=$st['driver_name']?>','<?=$st['driver_mobile']?>','<?=$st['conductor_name']?>','<?=$st['conductor_mobile']?>','<?=$st['driver_id']?>','<?=$st['conductor_id']?>');">Edit</button>
                                        
                                        <!-- <?php if($status == 1){ ?>
                                            <button onclick="changeStatus('<?= $product['product_id'] ?>',0)" class="btn btn-danger btn-sm">Block</button>
                                        <?php }else{ ?>
                                            <button onclick="changeStatus('<?= $product['product_id'] ?>',1)" class="btn btn-success btn-sm">Unblock</button>
                                        <?php } ?> -->
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






<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script type="text/javascript">

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