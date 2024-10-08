<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i data-feather="activity"></i> <?=$page_name?></h4>
                           
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                           
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                       
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Work Description</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Work description" name="name"
                                                            id="name" required>
                                                    </div>
                                                </div>
                                            </div>

                                         


                                            <input type="text" id='work_id' name='work_id' hidden/>

                                           

                                    <div class="col-lg-4 mt-1">
                                        <div class="row">
                                        <div class="col-lg-4 mt-1">
                                            <button id="add" onclick="add_work(this)" class="btn btn-success" style="width:100%">Save</button>
                                       
                                        </div>
                                        <div class="col-lg-4  mt-1">
                                            <button i onclick="refresh()" class="btn btn-success" style="width:100%">Refresh</button>
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
                                <th>Work Description</th>
                                                         
                                <th style="width:10%;text-align:center;">Action</th>                               
                                                                                        
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($work as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>                                   
                                    <td><?= $st['work_description'] ?></td>    
                                
                                    <td nowrap style="width:10%;text-align:center;">
                                    <button class="btn btn-info btn-sm"  onclick="work_edit('<?=$st['work_id']?>','<?=$st['work_description']?>');">Edit</button>
                                        
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

work_edit=function(work_id,work)
{
    $("#work_id").val(work_id);
    $("#name").val(work);
 
    $("#name").focus();
    $("#add").html("Update");

}

refresh=function()
{
   $("#name").val("");
   
   $("#work_id").val("");
   $("#add").html("Save");
}
function add_work(x) { 


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

   
  
    $('#loader').css("display",'block');
    $(x).attr("disabled",true);   

    var d={
        "work":$("#name").val(),       
        "work_id":$("#work_id").val()
    } 

    $.ajax({
        url: '<?= base_url('master/add_work') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            // alert(data);
            if(data==1){
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: ($("#work_id").val()==""?"Saved":"Updated")+" Successfully",
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