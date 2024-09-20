<?php foreach($profile as $pr) {?>
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
                                                <label class="form-label">Business Name *</label>
                                                <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter business name" required value="<?=$pr['business_name']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control" id="address" name="address" placeholder="Enter address"><?=$pr['address']?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">PIN</label>
                                                <input type="text" class="form-control" id="pin" name="pin" placeholder="Enter pin no" value="<?=$pr['pin']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">State</label>
                                                <select name="state" id="state" class="form-control">
                                                    <?php foreach($states as $st) { ?>
                                                        <option <?=($pr['states']==$st['name']?'selected':'') ?> value="<?=$st['name']?>"><?=$st['name']?></option>
                                                    <?php } ?>                                                        
                                                    
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">GST No</label>
                                                <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter gst no" value="<?=$pr['gstno']?>" >
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Mobile no *</label>
                                                <input readonly type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter phone no" required value="<?=$pr['mobile_no']?>">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email *</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email id" required value="<?=$pr['email_id']?>">
                                            </div>

                                

                               
                                <div class="col-lg-12" style="text-align:right">
                                    <div class="text-right">
                                        <button <?=($this->session->userdata('restaurant_business_mobile_no')=="123"?"disabled":"")?> onclick="profile_update()" class="btn btn-success">Update</button>
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
<?php } ?>

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
function profile_update() {
    var business_name = $('#business_name').val();
    var address = $('#address').val();
    var pin = $('#pin').val();
    var state = $('#state').val();
    var gst = $('#gst').val();   
    var email = $('#email').val();
   
    if (business_name == '') {
        $('#business_name').addClass('border-danger');
        return
    }
    $('#business_name').removeClass('border-danger');

    if (email == '') {
        $('#email').addClass('border-danger');
        return
    }

    $('#email').removeClass('border-danger');
    $("#loader").css("display","block");
    var details = {
       
        'business_name': business_name,
        'address': address,
        'pin': pin,
        'state': state,
        'gst': gst,
        'email': email

    }

    $.ajax({
        url: '<?= base_url('dashboard/profile_update') ?>',
        method: 'POST',
        data: details,

        success: function(data) {
            // alert(data);
            if (data == 1) {
                $("#title").html(business_name);
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: "Profile Updated",
                            showConfirmButton: false,
                            timer: 1500
                            });
                            navigator.vibrate(200);  /**Mobile vibration */
            } else {
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
            alert(data);
        }
    })
}


</script>