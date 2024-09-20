<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card border:0">
                        <div class="card-header">
                            <h4 class="card-title">Day Book</h4>
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <form action="<?=base_url('daybook')?>" method="POST">
                            <div class="row">

                            <div class="col-sm-4">
                                <label for="">Date</label>
                                <input type="date" class="form-control" value="<?=$date?>" name="date">
                            </div>
                            <div class="col-sm-4 mt-4" style="text-align:left">
                                <button class="btn btn-info mt-1">Display</button>
                            </div>  
                            </div>
                           
                            </form>                        
                            <div class="col-sm-12 mt-3" style="overflow-Y:auto;">
                            <div class="">
                             <div class="table-responsive">
                             <!-- <table class="table align-middle table-nowrap table-borderless" > -->
                             <table class="table table-borderless table-wrap ">

                                            <!-- <thead class="bg-info text-light">
                                            
                                                <th colspan="2" >Item</th>
                                                <th class="text-center">Qty</th>
                                                <th style="text-align:right;">Amount</th>
                                            </thead> -->
                                            <tbody id="today_sale">
                                                <?php 
                                                $total=0;
                                                foreach($item_sale as $sl) { 
                                                      $total+=$sl['amt'];
                                                    //   $imageArray = explode(',', $sl['image']);
                                                    //   $im=rand(0,count($imageArray)-1);
                                                    //   $sql = "SELECT * FROM `image_master` WHERE `id` = '".$imageArray[$im]."'";                       
                                                 
                                                    //   $image_url = $this->db->query($sql)->result_array();
                                                    ?>
                                                <tr>

                                            
                                                    <td style="width:50px;text-left">
                                                      <img style="width:50px;height:50px;border-radius:15px;object-fit: contain;" src="<?=str_replace("restaurant/","",base_url("uploads/image/")).$sl['img']?>">

                                                    </td>
                                                    <td class="text-left">
                                                        <span><?=$sl['product_name'].' X '.$sl['qty']." ".$sl['unit']?></span></td>
                                                    <td style="text-align:right"><?=$sl['amt']?></td>

                                                   
                                                </tr>

                                                <?php } ?>                                              

                                            </tbody>
                                            <tfoot >
                                                    <th colspan="2"  style="text-align:right"><h4>Total</h4></th>
                                                    <th style="text-align:right"><h4><?=$total?></h4></th>
                                                </tfoot>
                                        </table>
                            </div>
                            </div>
                        </div>
                        </div>
                       
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo base_url('update-product') ?>" method="post" id="edit-product-details">
    <input type="hidden" id="product_id" name="product_id">
</form>

<!-- Details Modal -->
<div class="modal fade" id="pDetailsModal" tabindex="-1" aria-labelledby="pDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pDetailsModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="details">

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
/* Set a maximum width for the container */
    .container {
      max-width: 800px; /* Adjust the value as needed */
    }

    /* Enable word wrapping in table cells */
    .table-responsive {
      display: block;
      width: 100%;
      overflow-x: auto;
      -ms-overflow-style: -ms-autohiding-scrollbar;
    }
  </style>

<script>
editProduct = function(x) {
    $('#product_id').val(x)
    $('#edit-product-details').submit()
}
detailsProduct = function(x) {
    $.ajax({
        url: '<?php echo base_url('product/product_details') ?>',
        method: 'POST',
        data: 'id=' + x,

        success: function(data) {
            $('#pDetailsModal').modal('show')
            $('#details').html(data)
        }
    })
}

changeStatus = function(x, y){
    $.ajax({
        url: '<?php echo base_url('product/change_status') ?>',
        method: 'POST',
        data: {
            id : x.id,
            status : y
        },

        success: function(data) {
            if(data == 1){
                location.reload()
            }
        }
    })
}
</script>