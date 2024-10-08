<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row" >
                <div class="col-6" style="margin-left:auto;margin-right:auto;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title <?=$transaction_type==1?'text-info':($transaction_type==2?'text-success':'text-warning')?>">
                            <?php if($transaction_type==1){ ?>    
                            <i class="fa fa-rupee-sign " style="font-size:14pt;"></i> <?=$page_name?>
                            <?php } else {?>
                                <i class="fa fa-hand-point-up " style="font-size:14pt;"></i> <?=$page_name?>
                            
                            <?php } ?>
                            </h4>

                            <p class="card-title-desc"></p>
                        </div>
                        <div class="card-body p-4">
                            <?php $this->load->view('messages') ?>
                           
                                <div class="row">
                                    
                                          

                                            <div class="col-lg-7" >
                                               
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Employee *</label>
                                                       
                                                        <input class="form-control" type="text"
                                                            placeholder="Enter employee name" name="driver_name"
                                                            id="driver_name" required oninput="staff(this,'d');">
                                                            <small class="text-info" id="d_mobile"></small>
                                                        <div class="bg-light" id="driver_list" style="position:absolute;width:95%;z-index:10000;max-height:200px;overflow-Y:auto;border:1px solid gray;display:none" >
                                                         
                                                        </div>    
                                                    </div>
                                               
                                            </div>
                                            <div class="col-lg-5" >
                                               
                                               <div class="mb-3">
                                                   <label for="name" class="form-label">Amount (&#8377;) *</label>
                                                  
                                                   <input class="form-control" type="text"
                                                       placeholder="&#8377;" name="amount"
                                                       id="amount" required >
                                                       <small class="text-danger" id="balance"></small>

                                                     
                                              
                                               </div>
                                          
                                       </div>
                                                                                 

                                            

                                     
                                            <input type="text" id='driver_id' name='driver_id' hidden/>
                                        
                                  
                                </div>
                                

                                
                       
<div class="row">
    <div class="col-lg-12">
        <label for="remarks">Remarks</label>
        <input type="text" class="form-control" id="remarks">
    </div>
</div>
                                <div class="row">
                                <div class="col-lg-6 mt-3">
                                                    <div class="row">
                                                            <div class="col-lg-6 mt-1">
                                                                <button id="add" onclick="payment()" class="btn btn-success" style="width:100%">Submit</button>
                                                        
                                                            </div>
                                                            <div class="col-lg-6  mt-1">
                                                                <button i onclick="refresh()" class="btn btn-success">Refresh</button>
                                                            </div>
                                                    </div>
                                                    
                                            </div> 
                                            
                                </div>
                               
                          
                        </div>
                    </div>
                </div>              
            </div>
    </div>
</div>







<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script type="text/javascript">



    find_route=function(x)
    {
     
        var r=$(x).val().split("?");
        $("#route_name").val(r[1]);
        $("#target").val(r[2]);

    }



get_staff=function(staff_id,name,type,mobile,balance)
{
   
   
        $("#d_mobile").html("Mobile No : "+mobile);
        $("#driver_id").val(staff_id);
        $("#driver_name").val(name);
        $("#balance").html("Balance : &#8377; "+balance+" /-");

        $("#driver_list").css("display","none");
   
}

staff=function(x,type)
{
    if(type=='d') $("#d_mobile").html("");
    else $("#c_mobile").html("");
   
    if($(x).val().length<3)
    {
        $("#driver_list").html("");      
         $("#driver_list").css("display","none");
       
        return;
    }
   
    var d={
        "search":$(x).val()
    }

    $.ajax({
        url: '<?= base_url('view_employee') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            var data1=JSON.parse(data);
            var em="";
            data1.forEach(function(d)
                 {      
                                               
                    em+='<table class="table table-striped">'                  
                   
                    +'<tbody>'
                      
                        +'<tr style="cursor:pointer;font-size:9pt;" onclick='+'"get_staff('+"'"+d['staff_id']+"','"+d['name']+"','"+type+"','"+d['contact_no']+"','"+d['balance']+"'"+');"'+'>'
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
        
                    if(type=='d') 
                    {
                        $("#driver_list").html(em);    
                        $("#driver_list").css("display",(em==""?"none":"block"));   
                    }
                    else 
                    {
                        $("#conductor_list").html(em);    
                        $("#conductor_list").css("display",(em==""?"none":"block"));   
                    }
           


        },
        error:function(data)
        {

        }
    })
}





refresh=function()
{
 
   $("#driver_name").val("");
 
   $("#driver_id").val("");
   $("#amount").val("");
   
   $("#remarks").val("");
   $("#d_mobile").html("");
   $("#balance").html("");


   $("#add").attr("disabled",false);  
}


function payment() { 

    
    $("#add").attr("disabled",true);  

    if($("#driver_id").val()=="")
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Invalid employee . Please choose valid one.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }

    if(Number($("#amount").val())==0)
    {
            Swal.fire({
                    title: 'Error!',
                    text: 'Invalid amount. Please enter valid amount.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              return;
          }  


    $('#loader').css("display",'block');
   
    var d={
       
        "driver_id":$("#driver_id").val(),  
        "amount":Number($("#amount").val()),        
        "remarks":$("#remarks").val() ,
        "type":'<?=$transaction_type?>'      
    } 

    
    $.ajax({
        url: '<?= base_url('master/payment') ?>',
        method: 'POST',
        data: d,

        success: function(data) {
            // alert(data);
            // alert(JSON.parse(data));
            
                Swal.fire({
                            // position: "bottom-end",
                            customClass: 'swal-wide',
                            icon: "success",
                            title: "Submited Successfully",
                            confirmButtonText: 'OK'
                            });
                        
                        refresh();
   
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
