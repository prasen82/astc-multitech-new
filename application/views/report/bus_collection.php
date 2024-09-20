<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"><?=$page_name?></h4>
                        

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Report</a></li>
                                <li class="breadcrumb-item active"><?=$page_name?></li>
                            </ol>
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
                                <th>Vehicle No</th>
                                <th>Driver</th>   
                                <th>Conductor</th>                               
                                <th>Depot</th>
                                <th>Route No</th>
                                <th>Route Name</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                               
                                                <th  style="text-align:right">Ticket Count</th>

                                <th  style="text-align:right">Collections as per chalo</th>
                                                <th  style="text-align:right">Phone Pay Collection</th>
                                                <th  style="text-align:right"> Cash Collection</th>
                                                <th  style="text-align:right">Total</th>

                                                <th  style="text-align:right">Covered Km</th>
                                                <th  style="text-align:right">Target</th>
                                                <th  style="text-align:right">Payment Due</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $id=0;
                                foreach ($arrived as $st) { 
                                            ?>
                                    <tr>
                                        <td class="text-center"><?= ++$id ?></td>
                                        <td class="text-center"><?= $st['vehicle_no'] ?></td>

                                        <td><?= $st['dname'] ?>                                   
                                        </td>
                                        <td><?= $st['cname'] ?></td>
                                        <td ><?= $st['depo'] ?></td>
                                        <td class="text-center"><?= $st['route_no'] ?></td>
                                        <td ><?= $st['route_name'] ?></td>       
                                        <td><span class="text-info"><?= $st['ddate']." "?></span><span class="text-warning"><?= "  ".$st['dtime'] ?></span></td>   
                                        <td><span class="text-success"><?= $st['cdate']." "?></span><span class="text-warning"><?= "  ".$st['atime'] ?></span></td>   

                                        <td>
                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['ticket_count']?></h5>
                                                        </div>
                                                    </td>
                                    <td>
                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['machine_collection']?></h5>
                                                        </div>
                                                    </td>

                                                 
                                                    <td>
                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['phone_pay_collection']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>

                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['cash_collection']?></h5>
                                                        </div>
                                                    </td>
                                                    
                                   
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['total']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['distance_covered']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['target']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['payment_due']?></h5>
                                                        </div>
                                                    </td>






                                      

                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
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