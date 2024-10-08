<div class="main-content" id="invoice-POS">

    <div class="page-content">
        <!-- <div class="container-fluid"> -->

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row mt-2"  >
                <div class="col-lg-12" style="border:0px solid red">
                    <table  style="width:100%;text-indent:10px;">
                        <tr>
                            <td style="width:10%"><img src="<?=base_url('assets/images/logo.png')?>" alt="" style="height:50px;margin-top:-30px;"></td>
                            <td class="text-center">
                            <h6>MULTITECH ENGINEERING CONSULTANTS</h6>
                        <p>Electric Vehicle Log Sheet</p>
                            </td>
                        </tr>
                    </table >
                </div>

                <?php foreach($log as $lg) {
                  
                    ?>
              <div class="col-lg-12">
                <table style="width:100%;text-indent:10px;">
                        <tr>
                            <td style="border:1px solid gray;text-align:center;">Vehicle No</td>
                            <td style="border:1px solid gray;text-align:center;">Depot</td>

                            <td style="border:1px solid gray;text-align:center;">Date</td>
                            <td style="border:1px solid gray;text-align:center;">Time of Departure</td>
                            <td style="border:1px solid gray;text-align:center;">Time of Closing</td>
                            <td style="border:1px solid gray;text-align:center;">Drive In Hous</td>
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['vehicle_no']?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['depo']?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['ldate']?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['dtime']?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['ctime']?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=(int)($lg['diff'])."h:".(int)(($lg['diff']-(int)($lg['diff']))*60)."m" ?></td>
                        </tr>
                    </table>
              </div>

              <div class="col-lg-12 mt-3">
                <table style="width:100%;text-indent:10px;">
                        <tr>
                            <td style="width:20%;border:1px solid gray;text-align:center;">Route No</td>
                            <td style="border:1px solid gray;text-align:left;">Route Name</td>
                            
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['route_no']?></td>
                            <td style="border:1px solid gray;text-align:left;"><?=$lg['route_name']?></td>
                            
                        </tr>
                    </table>
              </div>
               
              
                <div class="col-lg-12">
                    <table class="table table-borderless">
                            <tr>
                                <td style="text-align:left;">Driver Name : <?=$lg['dname']?> ( M : <?=$lg['dmobile']?> )</td>
                                <td style="text-align:right;">Conductor Name : <?=$lg['cname']?> ( M : <?=$lg['cmobile']?> )</td>
                            
                            </tr>                        
                        </table>
                </div>

                <div class="col-lg-12">
                <table style="width:100%;text-indent:10px;">
                        <tr>
                            <td rowspan="2" style="width:20%;border:1px solid gray;text-align:center;">Place</td>
                            <td colspan="3" style="border:1px solid gray;text-align:center;">State of Charge</td>
                            <td colspan="3" style="border:1px solid gray;text-align:center;">Meter Reading</td>
                            
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;text-align:center;">Opening SOC</td>
                            <td style="border:1px solid gray;text-align:center;">Closing SOC</td>
                            <td style="border:1px solid gray;text-align:center;">Consumed SOC</td>

                            <td style="border:1px solid gray;text-align:center;">Opening Km</td>
                            <td style="border:1px solid gray;text-align:center;">Closing Km</td>
                            <td style="border:1px solid gray;text-align:center;">Covered Km</td>

                            
                        </tr>
                        <tr>
                        <td style="border:1px solid gray;text-align:center;"><?=$lg['place']?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=$lg['opening_charge']?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=($lg['closing_charge']>0?$lg['closing_charge']:'')?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=($lg['charge_consumed']>0?$lg['charge_consumed']:'')?></td>

                            <td style="border:1px solid gray;text-align:center;"><?=$lg['opening_meter_reading']?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=($lg['closing_meter_reading']>0?$lg['closing_meter_reading']:'')?></td>
                            <td style="border:1px solid gray;text-align:center;"><?=($lg['distance_covered']>0?$lg['distance_covered']:'')?></td>

                            
                        </tr>
                    </table>
              </div>
              <div class="col-lg-12 mt-3">
              <table style="width:100%;text-indent:10px;">
                        <tr >
                             <td colspan="6" style="border:1px solid gray;text-align:center;">
                                <b style="text-decoration:underline;font-size:13pt;">General Checked List</b>
                                <p style="font-size:1opt;">( To be checked before taking out of depo ) </p>

                            </td>
                            
                        </tr>
                        <tr>
                            <td style="width:20%;border:1px solid gray;text-align:left;">1. Cleanliness</td>
                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">7. Coolant Level</td>

                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">13. Light</td>
                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            
                        </tr>
                        <tr>
                            <td style="width:20%;border:1px solid gray;text-align:left;">2. Seat</td>
                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">8. Tyre Pressure</td>

                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">14. Body</td>
                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            
                        </tr>
                        <tr>
                            <td style="width:20%;border:1px solid gray;text-align:left;">3. Horns</td>
                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">9. Tools</td>

                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">15. Raditor</td>

                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            
                        </tr>
                        <tr>
                            <td style="width:20%;border:1px solid gray;text-align:left;">4. Wiper</td>
                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">10. Belt</td>

                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">16. Jack and Lever</td>

                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            
                        </tr>
                        <tr>
                            <td style="width:20%;border:1px solid gray;text-align:left;">5. RV Mirror</td>
                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">11. Suspension</td>

                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">17. CC Camera</td>

                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            
                        </tr>
                        <tr>
                            <td style="width:20%;border:1px solid gray;text-align:left;">6. SOC</td>
                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">12. Brake</td>

                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            <td style="width:20%;border:1px solid gray;text-align:left;">18. First Aid Box</td>
                            <td style="width:10%;border:1px solid gray;text-align:center;"></td>
                            
                        </tr>
                
                        
                    </table>
                </div>
                
              </div>
              <?php if($lg['departure_reamrks']!="") { ?>
            
                <div class="row mt-4">
                  <div class="col-lg-12">
                        <span>Departure Remarks : </span>
                        <span><?=$lg['departure_reamrks']?></span>
                    </div>
                </div>
            <?php } if($lg['closing_remarks']!="") {  ?>
                <div class="row mt-4">
                  <div class="col-lg-12">
                        <span>Closing Remarks : </span>
                        <span><?=$lg['closing_remarks']?></span>
                    </div>
                </div>
              <?php } }?>
             
              <div class="row">
                <div class="col-lg-12 mt-3 mb-3">
                    <span style="text-decoration:underline">Job ( Work ) Booking Driver</span>
                </div>
            </div>
            

               <div class="row">
                <div class="col-lg-12">
                <table style="width:100%;">

<?php 
$i=0;

foreach($issue as $is) { 
    if($i%2==0)
    {               
    ?>
    <tr>
     <?php } ?>   
        <td>    
            <?=($i+1).". ".$is['work_description']."  "?>
            <?php if($is['status']==1){ ?>
                <i class="fa fa-check"></i>
            <?php } else { ?>
                <!-- <span ><?=" ( ".$is['remarks']." ) " ?></span> -->
             
           <?php } ?>
        </td>
        <?php  if($i%2>0)
        { ?>                
        
    </tr>
    <?php }
    ++$i;
    ?>


   

 <?php } ?>
 </table>
 
                </div>
        
   
</div> 



              </div>

          
            
<!-- </div> -->

  

<footer class="fixed-bottom">
    <table style="width:100%">
        <tr>
            <td class="text-center">Checked By</td>
            <td class="text-center">Incharge</td>
            <td class="text-center">Driver Signature</td>

        </tr>
    </table>

    <div class="row mt-3">
        <span>Help Line No : 8822771309</span>
    </div>
        </footer>
            <form action="<?=base_url($type)?>" method="POST" id="back" hidden >
                <input type="text" id="log_id" name="log_id">
              
                                        <input type="date" class="form-control" name="from" value="<?=$from?>">                                  
                                        <input type="date" class="form-control"  name="to" value="<?=$to?>">
                                   
            </form>
        </div>
    </div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>




<script>
	   $(document).ready(function() {  
		printDiv();
		});

	function printDiv() {
     var printContents = document.getElementById("invoice-POS").innerHTML;
    //  alert(printContents);
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

	 $("#back").submit();
    //  document.body.innerHTML = originalContents;
}
  </script>