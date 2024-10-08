<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card border:0">
                        <div class="card-header">
                            <h4 class="card-title">Sales Statement</h4>
                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <form action="<?=base_url('statement')?>" method="POST">
                                    <div class="col-sm-12">
                                        <label for="">From</label>
                                        <input type="date" class="form-control"  name="from" value="<?=$from?>">
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <label for="">From</label>
                                        <input type="date" class="form-control"  name="to" value="<?=$to?>">
                                    </div>
                                    <div class="col-sm-12 mt-3" style="text-align:right">
                                        <button class="btn btn-info">Display</button>
                                    </div> 
                            </form>                         
                            <div class="col-sm-12 mt-3" style="overflow-Y:auto;">
                            <div class="container">
                             <div class="table-responsive">
                                     <table class="table table-bordered table-wrap">
                                    <thead ">
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Sale</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=0;
                                        $total=0;
                                        foreach($sale as $sl) {
                                            $total+=$sl['amt'];?>
                                            <tr>
                                                <td><?=++$i?></td>
                                                <td><?=$sl['dt']?></td>
                                                <td style="text-align:right">&#8377;<?=$sl['amt']?></td>

                                            </tr>

                                        <?php } ?>    
                                       
                                    </tbody>
                                    <tfoot ">
                                        <th colspan="2"  style="text-align:right"><h4>Total</h4></th>
                                        <th style="text-align:right"><h4>&#8377;<?=$total?></h4></th>
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