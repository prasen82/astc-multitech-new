<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=$page_name?></h4>
                            <input type="text" id='type' name='type' hidden value="<?=$type?>" />

                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                        
                                <div class="row">
                                    <div class="col-lg-12">
                                    <form action="<?=base_url($back)?>" method="POST">
                        <div class="row">
                                    <div class="col-sm-3">
                                             <label for="name" class="form-label"><?=($type=='c'?'Conductor':($type=='d'?'Driver':"Vehicle No"))?> *</label>
                                                       <?php if($type=='v') { ?>
                                                        <input class="form-control" type="text" autocomplete="off"
                                                            placeholder="vehicle no" name="staff_name"
                                                            id="staff_name" required  value="<?=$staff_name?>" >
                                                    
                                                    <?php } else { ?>
                                                        <input class="form-control" type="text" autocomplete="off"
                                                            placeholder="<?=($type=='c'?'conductor':($type=='d'?'driver':"vehicle no"))?>" name="staff_name"
                                                            id="staff_name" required oninput="staff(this,'<?=$type?>');" value="<?=$staff_name?>" >
                                                    
                                                    <?php } ?>
                                             
                                                           <small class="text-info" id="c_mobile" hidden></small>
                                                            <div id="conductor_list" class="bg-light" style="position:absolute;width:100%;z-index:10000;max-height:200px;overflow-Y:auto;border:1px solid gray;display:none" > </div>
                                              
                                                            <input type="text" id='staff_id' name='staff_id' hidden value="<?=$staff_id?>"/>

                                    </div>
                                     <div class="col-sm-3">
                                        <label for="">From</label>
                                        <input type="date" class="form-control" name="from" value="<?=$from?>">
                                    </div>
                                    <div class="col-sm-3 ">
                                        <label for="">To</label>
                                        <input type="date" class="form-control"  name="to" value="<?=$to?>">
                                    </div>
                                   
                                    
                        
                                <div class="col-sm-3 mt-4" style="text-align:left">                                   
                                   <button class="btn btn-info mt-1">Display</button>
                               </div> 
                               </div>
                            </form>  
                                   

                                    
                                </div>
                          
                        </div>
                    </div>
                </div>
                <div class="row">
            <div class="col-12">
                <div class="table-wrap" style="overflow:auto;">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            
                            <tr>
                                <th style="width:10%;">#</th>
                                <th>Date</th>
                                <th>Vehicle No</th>
                                <th>Driver Name</th>                                
                                <th>Conductor Name</th> 
                                <th>Route No</th>  
                                <th>Route Name</th>    
                                <th>Depot</th>
                                <th>Place</th>                               
                                <th>Consumed SOC</th>                             
                                <th>Covered Km</th>
                                <th>Ticket Count</th>
                                <th>As Per Chalo Collection</th>
                                <th>Phone Pay Collection</th>

                                <th>Cash Collection</th>
                                <th>Total Collection</th>   
                                <th  style="text-align:right">Covered Km</th>
                                                <th  style="text-align:right">Target</th>
                                                <th  style="text-align:right">Payment Due</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           $id=0;
                            foreach ($log as $st) {                              

                                        ?>
                                <tr>
                                    <td class="text-center"><?= ++$id ?></td>
                                    <td><?= $st['dt'] ?></td>
                                    <td><?= $st['vehicle_no'] ?></td>
                                    <td><?= $st['dname'] ?></td>

                                    <td><?= $st['cname'] ?></td>
                                    <td><?= $st['route_no'] ?></td>                                   
                                    <td><?= $st['route_name'] ?></td>   

                                    <td><?= $st['depo'] ?></td>                               
                                    
                                    <td><?= $st['place'] ?></td>   
                              
                                    <td style="text-align:center;"><?= $st['consumed_soc'] ?></td>                                      
                                     
                                    <td style="text-align:center;"><?=  $st['covered_km'] ?></td>   

                                    <td>
                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['ticket_count']?></h5>
                                                        </div>
                                                    </td>

                                          <td>
                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['machine_collection']?></h5>
                                                        </div>
                                                    </td>

                                                    <td>
                                                    <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['phone_pay_collection']?></h5>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['cash_collection']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['total']?></h5>
                                                        </div>
                                                    </td>

                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['distance_covered']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['target']?></h5>
                                                        </div>
                                                    </td>
                                                    <td>                                                    
                                                         <div  style="text-align:right">
                                                            <h5 class="font-size-14 text-muted mb-0"><?=$st['payment_due']?></h5>
                                                        </div>
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



<form action="<?=base_url('print_logsheet')?>" method="POST" id="printsheet" hidden>
    <input type="text" id="log_id" name="log_id">
    <input type="text" id="type"  name="type" value="l" >


</form>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script type="text/javascript">


print_log=function(log_id)
{
  
    $("#log_id").val(log_id);    
    $("#printsheet").submit();

}


staff=function(x,type)
{
    // if(type=='d') $("#c_mobile").html("");
    // else

    $("#c_mobile").html("");
   
    if($(x).val().length<3)
    {
        // $("#driver_list").html("");      
        //  $("#driver_list").css("display","none");
         $("#conductor_list").css("display","none");
        return;
    }
   
    var d={
        "search":$(x).val(),
        "type":type
    }

    $.ajax({
        url: '<?= base_url('view_staff') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            var data1=JSON.parse(data);
            var em="";
            data1.forEach(function(d)
                 {      
                                               
                    em+='<table class="table table-striped">'                  
                   
                    +'<tbody>'
                      
                        +'<tr style="cursor:pointer;font-size:9pt;" onclick='+'"get_staff('+"'"+d['staff_id']+"','"+d['name']+"','"+type+"','"+d['contact_no']+"'"+');"'+'>'
                        //     +'<td>'                             
                        //       +d['staff_id']
                        // +'</td>'
                   
                            +'<td>'                             
                              +d['name']+" ( "+d['employee_id']+" ) "
                        +'</td>'
                    +'</tr>'
              
            +'</tbody>'
            +'</table>';           
                                                    

                    });
        
                 
                        $("#conductor_list").html(em);    
                        $("#conductor_list").css("display",(em==""?"none":"block"));   
                  
           


        },
        error:function(data)
        {

        }
    })
}


get_staff=function(staff_id,name,type,mobile)
{
   
//    if(type=='d')
//     {
//         $("#d_mobile").html("Mobile No :"+mobile);
//         $("#staff_id").val(staff_id);
//         $("#driver_name").val(name);
//         $("#driver_list").css("display","none");
//     }
//     else
//     {
        $("#c_mobile").html("Mobile No :"+mobile);
        $("#staff_id").val(staff_id);
        $("#staff_name").val(name);
        $("#conductor_list").css("display","none");
    // }  

}

</script>