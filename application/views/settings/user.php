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
                                            <div class="col-lg-4">
                                                <div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter item name" name="name"
                                                            id="name" required>
                                                    </div>
                                                </div>
                                            </div>

                                         


                                            <input type="text" id='user_id' name='user_id' hidden/>

                                            <div class="col-lg-2">
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Mobile
                                                            No </label>
                                                        <input class="form-control" min="0" type="number"
                                                            placeholder="Enter mobile no" name="mobile_no"
                                                            id="mobile_no" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div>
                                                    <div class="mb-2">
                                                        <label for="p_price" class="form-label">Role </label>
                                                        <select name="role" id="role" class="form-select">
                                                            <?php foreach($role as $rl){ ?>
                                                            <option value="<?=$rl['role_id']?>"><?=$rl['role_name']?></option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                    <div class="col-lg-4 mt-4">
                                        <div class="row">
                                        <div class="col-lg-6 mt-1">
                                            <button id="add" onclick="add_user(this)" class="btn btn-success" style="width:100%">Add User</button>
                                       
                                        </div>
                                        <div class="col-lg-6  mt-1">
                                            <button i onclick="refresh()" class="btn btn-success">Refresh</button>
                                        </div>
                                        </div>
                                        
                                    </div> 
                                    <div class="col-lg-12">
                                        <small class="text-danger">** default password is last 4 digit of the mobile no</small>
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
                                <th>Name</th>
                                <th>Mobile No</th> 
                                <th>Role</th>   
                                <th>User Id</th> 
                                <th>Action</th>                               
                               
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($user as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                  
                                  
                                    
                                    <td><?= $st['name'] ?></td>
                                    <td><?= $st['mobile_no'] ?></td>    
                                    <td><?= $st['role_name'] ?></td>   
                                    <td><?= $st['user_id'] ?></td>                                   


                                                             
                                
                                    <td nowrap>
                                    <button class="btn btn-info btn-sm"  onclick="user_edit('<?=$st['u_id']?>','<?=$st['name']?>','<?=$st['mobile_no']?>','<?=$st['role_id']?>');">Edit</button>
                                   
                                        <?php if($st['status'] == 1){ ?>
                                            <button onclick="block_unblock('<?= $st['u_id'] ?>','<?= $st['name'] ?>',0)" class="btn btn-danger btn-sm">Block</button>
                                        <?php }else{ ?>
                                            <button onclick="block_unblock('<?= $st['u_id'] ?>','<?= $st['name'] ?>',1)" class="btn btn-success btn-sm">Unblock</button>
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



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>






<script type="text/javascript">

user_edit=function(user_id,name,mobile,role)
{
    $("#user_id").val(user_id);
    $("#name").val(name);
    $("#mobile_no").val(mobile);
    $("#role").val(role);
    $("#name").focus();
    $("#add").html("Update");

}

refresh=function()
{
   $("#name").val("");
   $("#mobile_no").val("");

   $("#user_id").val("");
   $("#add").html("Add User");
}
function add_user(x) { 


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

    if($("#mobile_no").val().length<10)
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
        "mobile_no":$("#mobile_no").val(),
        "role_id":$("#role").val(),
        "user_id":$("#user_id").val()
    } 

    $.ajax({
        url: '<?= base_url('master/add_user') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
          
            if(data==1){
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: ($("#user_id").val()==""?"Saved":"Updated")+" Successfully",
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
                    text: 'Mobile no already exist. Please enter another mobile no.',
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




function block_unblock(u_id,user,status) { 

if(!confirm("Are you sure to "+(status==1?"unblock ":"block ") +user)) return;

$('#loader').css("display",'block');


var d={
    "u_id":u_id,
    "status":status
} 

$.ajax({
    url: '<?= base_url('changeStatus') ?>',
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

</script>