

<link href="<?=str_replace('restaurant','',base_url())?>assets_dash/css/vendor.min.css" rel="stylesheet">
<link href="<?=str_replace('restaurant','',base_url())?>assets_dash/css/app.min.css" rel="stylesheet">



<!-- <div id="app" class="app app-content-full-height app-without-sidebar app-without-header"> -->

<!-- <div id="content" class="app-content p-1 ps-xl-4 pe-xl-4 pt-xl-3 pb-xl-3"> -->
	<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
				
<div class="col-sm-12">    

<div class="pos pos-vertical card" id="pos">

<div class="pos-container card-body">

<div class="pos-header">
<div class="col-sm-12" id="time" style="font-size:16pt;font-weight:bold" ><?=$table?></div>
</div>

<div class="pos-content">
						<div class="pos-content-container h-100 p-0" data-scrollbar="true" data-height="100%" id="details">
							<!-- New Table start -->
                            <?php 
                            foreach($order as $ord) { 
                                $total=0;
                                $c=&get_instance();
                                $sql="SELECT *,p.image as img,o.id as odid FROM (order_details o INNER JOIN product_master p on o.product_id=p.product_id) WHERE o.order_id='".$ord['id']."';";
                                $result=$c->db->query($sql)->result_array();

                                ?>
							<div class="pos-task" id="<?=$ord['id']?>">
								<div class="pos-task-info">
									<div class="row">
										<div class="col-8">
											<div class="h3 mb-1"><?=$ord['mobile_no']?> (M)</div>
											<div class="mb-3">Order No: <?=$ord['id']?></div>
										</div>
										<div class="col-4" style="text-align:right;">
											<div class="mb-2">
												<span class="badge bg-success text-black fs-14px">Dine-in</span>
											</div>
											<div><?=$ord['tm']?></div>
										</div>
									</div>
                                    <h1 class="text-<?=($ord['status']==0?"warning":($ord['status']==1?"info":"success"))?>"><?=($ord['status']==0?"Pending":($ord['status']==1?"Preparing":"Served"))?></h1>
								</div>
                               
								<div class="pos-task-body">
									<div class="fs-16px mb-3">
										Items
									</div>
									<div class="row gx-4">
										<div class="col-lg-12">
											<div class="pos-task-product">
                                            <?php foreach($result as $rs){ 
                                                $total+=$rs['amount'];
                                                $imageArray = explode(',', $rs['img']);
                                                $im=rand(0,count($imageArray)-1);
                                                $sql = "SELECT * FROM `image_master` WHERE `id` = '".$imageArray[$im]."'";                       
                                                $image_url = $this->db->query($sql)->result_array();
                                                ?>
												<div class="row" id="<?=$rs['odid']?>">

													<div class="col-4">
														<div class="pos-task-product-img">
															<div class="cover" style="background-image: url(<?=str_replace("restaurant/","",base_url("uploads/image/")).$image_url[0]['image']?>"></div>

														
														</div>
													</div>
													<div class="col-8">
														<div class="pos-task-product-info">
															<div class="flex-1">
																<div class="d-flex mb-2">
																	<div class="h5 mb-0 flex-1"><?=$rs['product_name']?>
                                                                   
                                                                </div>
                                                                    

																	<div class="h5 mt-1"><a href="#" onclick="delete_order('<?=$rs['odid']?>');"><i class="fa fa-trash text-danger"></i></a></div>
																</div>
																<div>
																	&#8377; <?=$rs['sale_price']." X ".$rs['qty']." ".$rs['unit']?><br>
																	&#8377;  <span id="price<?=$rs['odid']?>" class="text-danger"><?=$rs['amount']?></span> 
																</div>
															</div>
														</div>
													</div>
												</div>
                                                <?php } ?>

                                                <div class="pos-task-product-action">
													<div class="row">
														<div class="col-4 mb-2" style="text-align:right">
															<h1></h1>
														</div>
														<div class="col-8 mb-2" style="text-align:left">
															<h3>Total : &#8377; <span id="total"><?=$total;?></span></h3>
														</div>
													</div>
												</div>

												
												
												<div class="pos-task-product-action">
													<div class="row">
														<div class="col-6">
															<a href="#" class="btn btn-success" onclick="order_status('<?=$ord['id']?>',3);">Complete</a>
														</div>
														<div class="col-6">
															<a href="#" class="btn btn-outline-default" onclick="order_status('<?=$ord['id']?>',4);" >Cancel</a>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>

                            <?php } ?>

							

						</div>
					</div>

				</div>
<div class="card-arrow">
<div class="card-arrow-top-left"></div>
<div class="card-arrow-top-right"></div>
<div class="card-arrow-bottom-left"></div>
<div class="card-arrow-bottom-right"></div>
</div>

</div>
</div>
</div>
</div>
<form action="<?=base_url('home')?>" method="POST" id="dash"></form>

<form action="<?=base_url('bill')?>" method="POST" id="bill" hidden>
<input type="text" id="order_id" name="order_id">

</form>



<a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

<!-- </div> -->


<script src="<?=str_replace('restaurant','',base_url())?>assets_dash/js/vendor.min.js" type="aceeb6fccc77809fb274c81c-text/javascript"></script>
<script src="<?=str_replace('restaurant','',base_url())?>assets_dash/js/app.min.js" type="aceeb6fccc77809fb274c81c-text/javascript"></script>


<script src="<?=str_replace('restaurant','',base_url())?>assets_dash/js/demo/pos-kitchen-order.demo.js" type="aceeb6fccc77809fb274c81c-text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y3Q0VGQKY3" type="aceeb6fccc77809fb274c81c-text/javascript"></script>
<script type="aceeb6fccc77809fb274c81c-text/javascript">
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-Y3Q0VGQKY3');
	</script>

<style>
    .swal-wide{
    width:80%;
    margin-left:auto;
    margin-right:auto;
    font-size:9pt;
}
</style>
    <script>
	
	order_status=function(x,status)
	{      

        var ismobile=<?= (is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"))?1:0)?>;
        
        $("#order_id").val(x);
      
    
       var child=$("#details").children().length;
	   $("#loader").css("display","block");
		$("#"+x).remove();
		var d={
        "order_id":x,
		"status":status
       }

             $.ajax({
                url:"<?=base_url('order/status/update')?>",
                type:"POST",
                data:d,
                dataType:"JSON",
               
                success:function(data)
                {
                    
					 Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: (status==3?"Paid":"Order Cancelled"),
                            showConfirmButton: false,
                            timer: 1500
                            });

                            navigator.vibrate(200);  /**Mobile vibration */
                            // alert(status);
                         
							if(child==1) {
                                if(ismobile==0)
                                {
                                    if(status==3) $("#bill").submit();
                                }
                                else  $("#dash").submit();
                                
                            }
                            else 
                            {
                                $("#order_id").val(x);
                            
                                if(ismobile==0)
                                {
                                    if(status==3) $("#bill").submit();
                                }
                                else $("#"+x).remove();
                            } 
                            $("#loader").css("display","none");

                },
                error:function(data)
                {
            alert(data);
                }
             })
	}

     delete_order=function(x)
    {      
        $("#loader").css("display","block");

     var t_amt=Number($("#price"+x).html());
     var total_amt=Number($("#total").html());
  
       var d={
        "order_id":x
       }

             $.ajax({
                url:"<?=base_url('order/delete')?>",
                type:"POST",
                data:d,
                dataType:"JSON",
               
                success:function(data)
                {
                    var net_amt=total_amt-t_amt;
                    if(net_amt==0) $("#dash").submit();
                    else
                    {
                        $("#"+x).remove();
                        $("#total").html(total_amt-t_amt);
                        Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            // icon: "success",
                            title: "Deleted",
                            showConfirmButton: false,
                            timer: 1500
                            });

                            navigator.vibrate(200);  /**Mobile vibration */
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

