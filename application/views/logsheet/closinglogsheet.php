<div class="main-content" >

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row" >
                <div class="col-12" style="margin-left:auto;margin-right:auto;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fa fa-bus"></i> <?=$page_name?></h4>
                            <span class="text-danger" style="font-size:14pt;" id="datetime"></span>

                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                           
                                <div class="row">
                                <div class="col-lg-12">
                                 <table  style="width:100%;text-indent:10px;">
                                        <tr>
                                            <td style="border:1px solid lightgray;text-align:center;">Vehicle No</td>
                                            <td style="border:1px solid lightgray;text-align:center;">Depot</td>

                                            <td style="border:1px solid lightgray;text-align:center;">Date</td>
                                            <td style="border:1px solid lightgray;text-align:center;">Time of Departure</td>
                                        
                                        </tr>
                                        <tr>
                                            <td style="border:1px solid lightgray;text-align:center;width:20%">
                                            <input class="form-control text-center" type="text" style="text-transform: uppercase;border:0"
                                            tabindex="0" placeholder="Vehicle No" name="vehicle_no"
                                                                            id="vehicle_no" required  onblur="bus_details(this);" value="AS20" autofocus onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">
                                                                
                                            </td>
                                            <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="" name="depo"
                                                                            id="depo" readonly >
                                                                        </td>
                                            <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="" name="date"
                                                                            id="date" readonly >
                                                                        </td>
                                            <td style="border:1px solid lightgray;text-align:center;width:20%">  <input class="form-control text-center" type="text"
                                                                            placeholder="" name="tod"
                                                                            id="tod"  style="border:0px;" readonly>
                                        </td>
                                                        </tr>
                                    </table>
                                </div>
              <div class="col-lg-12 mt-3">
                <table style="width:100%;">
                        <tr>
                            <td style="width:20%;border:1px solid lightgray;text-align:center;">Route No</td>
                            <td style="border:1px solid lightgray;text-align:left;text-indent:10px;">Route Name</td>
                            <td style="border:1px solid lightgray;text-align:center;width:20%;">Target</td>
                            
                        </tr>
                        <tr>
                            <td style="border:1px solid lightgray;text-align:center;"> <input class="form-control text-center" type="text"
                                                            placeholder="" name="route_no"
                                                            id="route_no"  style="border:0px;" readonly></td>
                            <td style="border:1px solid lightgray;text-align:left;"> <input class="form-control" type="text"
                                                            placeholder="" name="route_name"
                                                            id="route_name" style="border:0px;" readonly ></td>
                            <td style="border:1px solid lightgray;text-align:center;"> <input class="form-control text-center" type="text"
                            placeholder="" name="target"
                            id="target" onblur='$("#closing_soc").focus();' oninput="total_collection();" readonly></td>
                            
                        </tr>
                    </table>
              </div>
               
              
                <div class="col-lg-12">
                    <table class="table table-borderless">
                            <tr>
                                <td style="text-align:left;" id="driver">Driver : XXXXX</td>
                                <td style="text-align:right;" id="conductor" >Conductor : XXXXX</td>
                            
                            </tr>  
                            <tr >
                                <td style="text-align:left;" id="driver_balance">Balance : 0</td>
                                <td style="text-align:right;" id="conductor_balance" >Balance : 0</td>                            
                            </tr>  

                        </table>
                </div>

                <div class="col-lg-12">
                <table style="width:100%;text-indent:10px;">
                        <tr>
                            <td rowspan="2" style="width:20%;border:1px solid lightgray;text-align:center;">Place</td>
                            <td colspan="3" style="border:1px solid lightgray;text-align:center;">State of Charge</td>
                            <td colspan="3" style="border:1px solid lightgray;text-align:center;">Meter Reading</td>
                            
                        </tr>
                        <tr>
                            <td style="border:1px solid lightgray;text-align:center;">Opening SOC</td>
                            <td style="border:1px solid lightgray;text-align:center;">Closing SOC</td>
                            <td style="border:1px solid lightgray;text-align:center;">Consumed SOC</td>

                            <td style="border:1px solid lightgray;text-align:center;">Opening Km</td>
                            <td style="border:1px solid lightgray;text-align:center;">Closing Km</td>
                            <td style="border:1px solid lightgray;text-align:center;">Covered Km</td>

                            
                        </tr>
                        <tr>
                        <td style="border:1px solid lightgray;text-align:center;" id="place">
                                                        </td>
                            <td style="border:1px solid lightgray;text-align:center;"><input class="form-control text-center" type="text"
                                                            placeholder="" name="opening_soc"
                                                            id="opening_soc" style="border:0px;" readonly ></td>
                            <td style="border:1px solid lightgray;text-align:center;"><input class="form-control text-center" type="text"
                                                            placeholder="closing soc" name="closing_soc"
                                                            id="closing_soc" oninput="consumed_soc();" onblur='$("#closing_km").focus();'></td>
                            <td style="border:1px solid lightgray;text-align:center;"><input class="form-control text-center" type="text"
                                                            placeholder="" name="consumed_soc"
                                                            id="consumed_soc" style="border:0px;" readonly ></td>

                            <td style="border:1px solid lightgray;text-align:center;"><input class="form-control text-center" type="text"
                                                            placeholder="" name="opening_km"
                                                            id="opening_km" style="border:0px;" readonly ></td>
                            <td style="border:1px solid lightgray;text-align:center;"><input class="form-control text-center" type="text"
                                                            placeholder="closing km" name="closing_km"
                                                            id="closing_km" oninput="covered_km();" onblur='$("#ticket_count").focus();'  ></td>
                            <td style="border:1px solid lightgray;text-align:center;"><input class="form-control text-center" type="text"
                                                            placeholder="" name="covered_km"
                                                            id="covered_km" style="border:0px;" readonly ></td>

                            
                        </tr>
                    </table>
              </div>

<input type="text" id="driver_id" hidden>
<input type="text" id="conductor_id" hidden>

              <div class="col-lg-12 mt-3">
                                 <table  style="width:100%;text-indent:10px;">
                                        <tr>
                                        <td style="border:1px solid lightgray;text-align:center;">Chalo Ticket Count</td>

                                        <td style="border:1px solid lightgray;text-align:center;">Collection as per chalo *</td>
                                        <td style="border:1px solid lightgray;text-align:center;">Phone Pay</td>
                                        <!-- <td style="border:1px solid lightgray;text-align:center;">Parking</td>
                                        <td style="border:1px solid lightgray;text-align:center;">Fastag</td>
                                        <td style="border:1px solid lightgray;text-align:center;">Extra</td> -->
                                        <td style="border:1px solid lightgray;text-align:center;">Cash Collection *</td>
                                        <td style="border:1px solid lightgray;text-align:center;">Total</td>
                                         
                                        <!-- <td style="border:1px solid lightgray;text-align:center;">Manual Collection</td> -->
                                        
                                        </tr>

                                        <tr>
                                        <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="" name="ticket_count"
                                                                            id="ticket_count" onblur='$("#machine_collection").focus();' >
                                                                        </td>
                                             <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="machine_collection"
                                                                            id="machine_collection" oninput="total_collection();" onblur='$("#phone_pay").focus();'>
                                                                        </td>

                                                                        
                                                                        <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="phone_pay"
                                                                            id="phone_pay" oninput="total_collection();" onblur='$("#cash_collection").focus();'>
                                                                        </td>
<!--                                                                         
                                                                        <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="fooding"
                                                                            id="fooding" oninput="total_collection();">
                                                                        </td>
                                                                        <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="pump"
                                                                            id="pump" oninput="total_collection();">
                                                                        </td>
                                                                        <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="parking"
                                                                            id="parking" oninput="total_collection();">
                                                                        </td>
                                                                        <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="fastag"
                                                                            id="fastag" oninput="total_collection();">
                                                                        </td>
                                                                        
                                            <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="text-transform: uppercase;border:0"
                                                                            placeholder="&#8377;" name="extra"
                                                                            id="extra" required  oninput="total_collection();">
                                                                
                                            </td> -->
                                            <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="text-transform: uppercase;border:0"
                                                                            placeholder="&#8377;" name="cash_collection"
                                                                            id="cash_collection" required  oninput="total_collection();" onblur='$("#driver_payment").focus();'>
                                                                
                                            </td>
                                            <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="total"
                                                                            id="total" readonly>
                                                                        </td>
                                             
                                                                        <!-- <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="manual"
                                                                            id="manual"  readonly>
                                                                        </td> -->
                                       
                                                        </tr>
                                    </table>
                                </div>
                                   
                                <div class="col-lg-2 mt-3">
                                 <table  style="width:100%;text-indent:10px;">
                                        <tr>
                                        <td style="border:1px solid lightgray;text-align:center;">Payment Due</td>
                                       </tr>
                                        <tr>
                                             <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="payment_due"
                                                                            id="payment_due" >
                                                                        </td>
                                                                       
                                                          
                                       
                                                        </tr>
                                    </table>
                                </div>
<div class="col-lg-6">

</div>
                                <div class="col-lg-4 mt-3">
                                 <table  style="width:100%;text-indent:10px;">
                                        <tr>
                                        <td style="border:1px solid lightgray;text-align:center;">Driver Payment</td>
                                        <td style="border:1px solid lightgray;text-align:center;">Conductor Payment</td>
                                       
                                        </tr>
                                        <tr>
                                          
                                                                        <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="driver_payment"
                                                                            id="driver_payment" oninput="total_collection();" onblur='$("#conductor_payment").focus();'>
                                                                        </td>
                                                                        <td style="border:1px solid lightgray;text-align:center;">
                                            <input class="form-control text-center" type="text" style="border:0px;"
                                                                            placeholder="&#8377;" name="conductor_payment"
                                                                            id="conductor_payment" oninput="total_collection();">
                                                                        </td>
                                                          
                                       
                                                        </tr>
                                    </table>
                                </div>

                                            

                                            
                                            <input type="text" id='vehicle_id' name='vehicle_id' hidden/>

                                            <input type="text" id='driver_id' name='driver_id' hidden/>
                                            <input type="text" id='conductor_id' name='conductor_id' hidden/>

                                  
                                </div>
                                

<div class="row mt-3">
    <div class="col-lg-12">
        <label for="remarks">Departure Remarks</label>
        <input type="text" class="form-control" id="remarks" readonly>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12">
        <h5>Job (Work) Booking Driver</h5>
    </div>
    <hr>
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
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="<?=$is['work_id']?>">
            <label class="form-check-label" for="flexCheckDefault">
            <?=$is['work_description']?>
            </label>
         </div>
           
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
<div class="row">

<div class="row mt-3">
    <div class="col-lg-12">
        <label for="remarks">Closing Remarks ( If any )</label>
        <textarea  class="form-control" id="closing_remarks" ></textarea>
    </div>
</div>
</div>


                                <div class="row">
                                <div class="col-lg-3 mt-3">
                                                    <div class="row">
                                                            <div class="col-lg-6 mt-1">
                                                                <button id="add" onclick="log_save()" class="btn btn-success" style="width:100%">Submit</button>
                                                        
                                                            </div>
                                                            <div class="col-lg-6  mt-1">
                                                                <button i onclick="refresh()" class="btn btn-success">Refresh</button>
                                                            </div>
                                                    </div>
                                                    
                                            </div> 
                                            
                                </div>
                                <div class="row mt-3">
                                    <span class="text-danger">** All fields are mandatory</span>
                                </div>
                          
                        </div>
                    </div>
                </div>              
            </div>
    </div>
</div>
<form action="<?=base_url('print_logsheet')?>" method="POST" id="printsheet" hidden>
    <input type="text" id="log_id" name="log_id">
    <input type="text" id="type"  name="type" value="c" >


</form>



<div class="modal" tabindex="-1" id="confirmation">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-danger">
        <i class="fa fa-exclamation"> Warning</i>
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-danger">
        <span >Following issues are still not resolved</span>
        <ul id="issue">
            

        </ul>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12 text-left mb-2">
        <span class="text-success">** Still you want to generate the logsheet then click on continue.</span>

        </div>


        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="log_save();">Continue</button>
      </div>
    </div>
  </div>
</div>








<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script type="text/javascript">
    consumed_soc=function()
    {
        $("#consumed_soc").val(Number($("#opening_soc").val())-Number($("#closing_soc").val()));
    }

    covered_km=function()
    {
        $("#covered_km").val(Number($("#closing_km").val())-Number($("#opening_km").val()));
        total_collection();
    }

    total_collection=function()
    {
        if( Number($("#covered_km").val())==0) var target=0;
        else 
        var target=Number($("#target").val());
        // alert(target); 
        $("#total").val(Number($("#phone_pay").val())+Number($("#cash_collection").val()));
        // $("#manual").val(Number($("#cash_collection").val())-Number($("#total").val()));
        var due=target-Number($("#total").val());
        $("#payment_due").val(due>0?due:0);

    }

    // manual_collection=function()
    // {
      
    //     $("#manual").val(Number($("#cash_collection").val())-Number($("#total").val()));
    //     var due=Number($("#target").val())-Number($("#cash_collection").val());
    //     $("#payment_due").val(due>0?due:0);

    // }

bus_details=function(x)
{
    var em="";
    $("#issue").html("");
    $("#loader").css("display","block");
    var d={
        "vehicle_no":$(x).val()
    }

    $.ajax({
        url:"<?=base_url('master/departure_log')?>",
        type:"POST",
        dataType:"JSON",
        data:d,
        success:function(data)
        {
            // alert(data);
        //    var data1=JSON.parse(data);
        //    alert(data['driver_balance']);
            data['log'].forEach(function(d)
            {
                
                $("#log_id").val(d['log_id']);
                $("#driver_id").val(d['driver_staff_id']);
                $("#conductor_id").val(d['conductor_staff_id']);

                $("#depo").val(d['depo']);
                $("#date").val(d['ldate']);
                $("#tod").val(d['dtime']);
                $("#route_no").val(d['route_no']);
                $("#route_name").val(d['route_name']);
                $("#target").val(d['target']);

                $("#place").html(d['place']);
                $("#opening_soc").val(d['opening_charge']);
                $("#opening_km").val(d['opening_meter_reading']);
                $("#remarks").val(d['departure_reamrks']);

                $("#driver").html("Driver : "+d['dname']+" ( Mobile : "+d['dmobile']+" )");
                $("#conductor").html("Conductor : "+d['cname']+" ( Mobile : "+d['cmobile']+" )");
                $("#driver_balance").html('Balance : '+d['dbalance']);
                $("#conductor_balance").html('Balance : '+d['dbalance']);

                
                 })
          
                 total_collection();

              $("#target").focus();
              $("#loader").css("display","none");

        }
    })
}






refresh=function()
{
                $("#log_id").val("");
                $("#depo").val("");
                $("#date").val("");
                $("#tod").val("");
                $("#route_no").val("");
                $("#route_name").val("");
                $("#place").html("");
                $("#opening_soc").val("");
                $("#opening_km").val("");
                $("#remarks").val("");

                $("#driver").html("Driver : XXXXX");
                $("#conductor").html("Conductor : XXXXX");



}

// log_submit=function()
// {
   
//     if($("#issue").html()=="") log_save();
//     else
//     {
//         $("#confirmation").modal("show");
//         // $("#printsheet").submit();
//     }


// }
function log_save() { 

   
    

    if($("#log_id").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Invalid vehicle no or departure log not generated.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }

    if($("#closing_soc").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Please enter closing SOC.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }

    if($("#closing_km").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'PLease enter closing Km.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }  

    if(Number($("#cash_collection").val())==0)
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'PLease enter collection details.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }  
          
        

   
    if(Number($("#total").val())>Number($("#target").val()))
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Collected amount should not be higher than the target amount .Please check it once.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          } 

    if(!confirm("Sure to submit ?")) return;
    
    $('#loader').css("display",'block');
    $("#add").attr("disabled",true);   
   
    var work="";
    <?php foreach($issue as $is) { ?>   
        if($("#<?=$is['work_id']?>").is(":checked")) work+=<?=$is['work_id']?>+"!";
    <?php } ?>

    if( Number($("#covered_km").val())==0) var target=0;
    else var target=Number($("#target").val());
    var d={
       
        "log_id":$("#log_id").val(),         
        "closing_soc":$("#closing_soc").val(),
        "closing_km":$("#closing_km").val(),
        "cash_collection":Number($("#cash_collection").val()),
        "machine_collection":Number($("#machine_collection").val()),
        "total":Number($("#total").val()),
        "ticket_count":Number($("#ticket_count").val()),
        "phone_pay":Number($("#phone_pay").val()),        
        "remarks":$("#closing_remarks").val(),
        "payment_due":Number($("#payment_due").val()),
        "driver_payment":Number($("#driver_payment").val()),
        "conductor_payment":Number($("#conductor_payment").val()),
        "driver_id":$("#driver_id").val(),
        "conductor_id":$("#conductor_id").val(),
        "work":work,
        "target":target,

        "route_no":$("#route_no").val()
        
    } 

    
    $.ajax({
        url: '<?= base_url('master/log_close') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            if(data=='d')
            {
                Swal.fire({
                        title: 'Error!',
                        text: 'You can not close shutdown attendance logsheet before 4:00 PM',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    $("#add").attr("disabled",false);   
              
          }
          else if(data==1){
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            icon: "success",
                            title: "Saved Successfully",
                            confirmButtonText: 'OK'
                            });
                        //     navigator.vibrate(200);  /**Mobile vibration */
                        //    window.setTimeout(() => {
                        //     window.location.reload();
                        //    }, 1000);

                        // $("#log_id").val(data);
                        $("#printsheet").submit();
    // return;
    //                     refresh();
    //                     $("#add").attr("disabled",false);   
                        
                           

            }
          else
          {
            Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                $("#add").attr("disabled",false);   
              
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
                $("#add").attr("disabled",false);   
        }
    })
}

</script>

<!-- Date time -->
<script>
      // create a function to update the date and time
      function updateDateTime() {
        // create a new `Date` object
        var date = new Date();
        var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        var am_pm = date.getHours() >= 12 ? "PM" : "AM";
        hours = hours < 10 ? "0" + hours : hours;
        var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
        time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
        
        const date1 = new Date().toLocaleDateString('en-GB');
        // update the `textContent` property of the `span` element with the `id` of `datetime`
        // document.querySelector('#datetime').textContent = date1+" "+time;
        document.querySelector('#datetime').textContent = time;

      }

      // call the `updateDateTime` function every second
      setInterval(updateDateTime, 1000);
    </script>

