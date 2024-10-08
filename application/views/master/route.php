<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fa fa-bus"></i> <?=$page_name?></h4>
                           
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                           
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-2">
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Route
                                                            No </label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter route no" name="route_no"
                                                            id="route_no" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Route Name</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter route name" name="name"
                                                            id="name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Target</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter Target" name="target"
                                                            id="target" onkeypress="return isNumber(event)" required>
                                                    </div>
                                                </div>
                                            </div>

                                         


                                            <input type="text" id='route_id' name='route_id' hidden/>

                                           

                                    <div class="col-lg-4 mt-2">
                                        <div class="row">
                                        <div class="col-lg-4 mt-1">
                                            <button id="add" onclick="add_route(this)" class="btn btn-success">Add Route</button>
                                       
                                        </div>
                                        <div class="col-lg-6  mt-1">
                                            <button i onclick="refresh()" class="btn btn-success">Refresh</button>
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
                <div class="table-wrap">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th style="width:10%;">#</th>
                                <th style="width:10%;">Rote No</th>
                                <th>Route Name</th>             
                                <th>Target</th>                   
                                <th style="width:10%;text-align:center;">Action</th>                               
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($route as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                  
                                  
                                    
                                    <td><?= $st['route_no'] ?></td>
                                    <td><?= $st['route_name'] ?></td>    
                                    <td class="text-center"><?= $st['target'] ?></td>    

                                
                                    <td nowrap style="width:10%;text-align:center;">
                                    <button class="btn btn-info btn-sm"  onclick="route_edit('<?=$st['route_id']?>','<?=$st['route_name']?>','<?=$st['route_no']?>','<?=$st['target']?>');">Edit</button>
                                        
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>






<script type="text/javascript">

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

route_edit=function(route_id,name,route_no,target)
{
    $("#route_id").val(route_id);
    $("#name").val(name);
    $("#route_no").val(route_no);
    $("#target").val(target);

    $("#route_no").focus();
    $("#add").html("Update");

}

refresh=function()
{
   $("#name").val("");
   $("#route_no").val("");
   $("#route_id").val("");
   $("#add").html("Add Route");
}
function add_route(x) { 


    if($("#name").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Please enter route name.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }

    if($("#route_no").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Invalid route no. Please enter valid one.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }
  
    $('#loader').css("display",'block');
    $(x).attr("disabled",true);   

    var d={
        "route_name":$("#name").val(),
        "route_no":$("#route_no").val(),       
        "route_id":$("#route_id").val(),
        "target":$("#target").val()

    } 

    $.ajax({
        url: '<?= base_url('master/add_route') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            // alert(data);
            if(data==1){
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: ($("#route_id").val()==""?"Saved":"Updated")+" Successfully",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            navigator.vibrate(200);  /**route_no vibration */
                           window.setTimeout(() => {
                            window.location.reload();
                           }, 1000);
                           

            }
          else
          {
            Swal.fire({
                    title: 'Error!',
                    text: 'Route no already exist. Please enter another route no.',
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