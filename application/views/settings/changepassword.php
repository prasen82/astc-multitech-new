<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <?php $this->load->view('layouts/page_top.php') ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- <div class="card-header">
                            <h4 class="card-title">Profile</h4>
                            <p class="card-title-desc"></p>
                        </div> -->
                        <div class="card-body p-4">

                            <div class="row">
                                            <div class="mb-3">
                                                <label class="form-label">Current Password *</label>
                                                <input type="password" class="form-control" id="opwd" name="opwd" placeholder="Enter current password" required value="<?=$pr['business_name']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="npwd" name="npwd" placeholder="Enter new password" required value="<?=$pr['business_name']?>">
                                          </div>
                                            <div class="mb-3">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Enter confirmation password" value="<?=$pr['pin']?>">
                                            </div>
                                           

                                

                               
                                <div class="col-lg-12" style="text-align:right">
                                    <div class="text-right">
                                        <button onclick="change_password()" class="btn btn-success">Change</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

               
            </div>
            <!-- end row -->
        </div>
    </div>
</div>

<img src="<?php echo base_url('../assets/images/tick.png') ?>" alt="Tick Icon" class="tick-icon" style="display: none;">

<!-- Category Modal -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<style>
    .swal-wide{
    width:80%;
    margin-left:auto;
    margin-right:auto;
    font-size:9pt;
}
</style>
<script>
function change_password() {
    var opwd = $('#opwd').val();
    var npwd = $('#npwd').val();
    var cpwd = $('#cpwd').val();
 
    if(npwd!=cpwd)
    {
        Swal.fire({
                    title: 'Error!',
                    text: 'Password & confirmation password mismatched.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
        return;
    }
   
    if (opwd == '') {
        $('#opwd').addClass('border-danger');
        return
    }
    $('#business_name').removeClass('border-danger');

    if (npwd == '') {
        $('#npwd').addClass('border-danger');
        return
    }

    $('#npwd').removeClass('border-danger');

    if (cpwd == '') {
        $('#cpwd').addClass('border-danger');
        return
    }

    $('#cpwd').removeClass('border-danger');
    $("#loader").css("display","block");
    var details = {
       
        'opwd': opwd,
        'npwd': npwd,
        'cpwd': cpwd

    }

    $.ajax({
        url: '<?= base_url('dashboard/reset_password') ?>',
        method: 'POST',
        data: details,

        success: function(data) {
            // alert(data);
            if (data == 1) {
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: "Password Changed",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            navigator.vibrate(200);  /**Mobile vibration */
                            $('#opwd').val("");
                            $('#npwd').val("");
                            $('#cpwd').val("");
                            

            } else if(data==0)
            {
                Swal.fire({
                    title: 'Error!',
                    text: 'Invalid password.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
            else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
            $("#loader").css("display","none");
        },
        error:function(data)
        {
            // alert(data);
        }
    })
}


</script>