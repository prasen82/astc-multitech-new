<div class="main-content" >

    <div class="page-content">
        <div class="container-fluid">

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->

            <div class="row" >
                <div class="col-10" style="margin-left:auto;margin-right:auto;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-primary"><i class="fa fa-bus"></i> <?=$vehicle_no?></h4>
                           <input type="text" id="log_id" value="<?=$log_id?>" hidden>
                            <p class="card-title-desc"></p>

                        
                        </div>
                        <?php if($this->session->userdata('multitech_role_id')==3) { ?>
                     
                        <div class="row m-3">
                                <div class="col-lg-4">
                                    <label for="">Technician</label>
                                    <input type="text" id="technician" class="form-control" oninput="staff(this,'t');" placeholder="Search technician">
                                    <div class="bg-light" id="driver_list" style="position:absolute;width:95%;z-index:10000;max-height:200px;overflow-Y:auto;border:1px solid gray;display:none" >
                                                                
                                                                </div> 
                                </div>
                                 <div class="col-lg-4 mt-4">
                                          <button class="btn btn-success mt-1" onclick="assign()"><i class="fa fa-plus"> Assign</i></button>

                                </div>
                        </div>
                        <?php } ?>
                       
                        <div class="card-body p-4">                       
                        <div class="row">                           
                                <div class="col-lg-12">                                    
                                    <h5 class="text-success">Technician Assigned</h5>
                                </div>
                                <hr>
                                <div class="col-lg-12">
                                    <table class="table table-striped" style="width:100%;" id="tech">
                                  <thead>
                                        <tr>
                                        <th>Name</th>
                                             <th>Mobile</th>
                                             <?php if($this->session->userdata('multitech_role_id')==3) { ?>
                     
                                             <th></th>
                                             <?php } ?>

                                        </tr>
                                  </thead>
                                    <tbody id="tbody">
                                    <?php 
                                    $i=0;

                                    foreach($assign_tech as $is) { 
                                        // if($i%2==0)
                                        {               
                                        ?>
                                        <tr>
                                        <?php } ?>                                              
                                            <td class="text-left"><?=++$i.". ".$is['name']?></td>
                                            <td class="text-left"><?=$is['contact_no']?></td>    
                                            <?php if($this->session->userdata('multitech_role_id')==3) { ?>
                     
                                            <td class="text-center"><a href="#" onclick="de_assign(this,'<?=$is['technician_staff_id']?>')"><i class="fa fa-trash text-danger"></i></a></td>                                                   
                                                <?php } ?>
                                        </tr>
                                        <?php }
                                        ?>

                                        </tbody>
                                    </table>
                
                                </div>
        
   
                        </div> 
                      
                           
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="text-success">Job (Work) Booking</h5>
                                </div>
                                <hr>
                                <!-- <div class="col-lg-12"> -->
                                    <!-- <table class="table table-striped" style="width:100%;">
                                    <tr>
                                        <th>Issue</th>
                                        <th>Remarks</th>
                                        <th>Action</th>                                        
                                    </tr> -->

                                    <?php 
                                    $i=0;

                                    foreach($issue as $is) { 
                                                   
                                        ?>
                                       
                                        <div class="row">
                                        <div class="col-lg-4 mt-1">
                                             <?=++$i.". ".$is['work_description']?>
                                        </div>
                                        <div class="col-lg-4 mt-1 mb-2" id="r_<?=$is['id']?>">
                                        <?php if($is['status']==1 || $this->session->userdata('multitech_role_id')!=3) { ?>
                                                    <?=$is['remarks']?>
                                                <?php } else { ?>
                                                    <input type="text"  class="form-control" id="<?=$is['id']?>" value="<?=$is['remarks']?>" >
                                                   <?php } ?> 
                                        </div>
                                        <div class="col-lg-4 mt-1">
                                        <?php if($is['status']==0) { ?>
                                                <?php if($this->session->userdata('multitech_role_id')==3) { ?>
                     
                                                <button class="btn btn-warning mb-1" onclick="remarks_update('<?=$is['id']?>')"><i class="fa fa-save"></i> Update Remarks</button>
                                                <button class="btn btn-success mb-1" onclick="status_update('<?=$is['id']?>')"><i class="fa fa-check"></i> Mark as done</button>
                                                <?php } else {?>
                                                    <span class="badge bg-danger"> Not done </span>
                                                <?php } } else {?>
                                                <span class="badge bg-success"> Task Comleted </span>
                                            <?php }    ?>
                                        </div>
                                        </div>
                                        <?php }
                                        ?>
                                 
        
   
                        </div> 


                                




                                <div class="row mt-3">
                                    <span class="text-danger">** Please confirm all tasks</span>
                                </div>
                          
                        </div>
                    </div>
                </div>              
            </div>
    </div>
</div>
<form action="<?=base_url('under-maintanance')?>" methid="POST" id="mnc"></form>

<input type="text" id="tech_id" hidden>
<input type="text" id="tmobile" hidden>



<div class="modal" tabindex="-1" id="confirmation">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-danger">
        <i class="fa fa-user">Technitian</i>
       
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

    <script>
        staff=function(x,type)
{
   
   
    if($(x).val().length<3)
    {
        $("#driver_list").html("");      
         $("#driver_list").css("display","none");
       
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
                      
                        +'<tr style="cursor:pointer;" onclick='+'"get_staff('+"'"+d['staff_id']+"','"+d['name']+"','"+type+"','"+d['contact_no']+"'"+');"'+'>'
                        //     +'<td>'                             
                        //       +d['staff_id']
                        // +'</td>'
                   
                            +'<td>'                             
                              +d['name']
                        +'</td>'
                    +'</tr>'
              
            +'</tbody>'
            +'</table>';           
                                                    

                    });
        
                  
                        $("#driver_list").html(em);    
                        $("#driver_list").css("display",(em==""?"none":"block"));   
                   
           


        },
        error:function(data)
        {

        }
    })
}

get_staff=function(staff_id,name,type,mobile)
{
   
      
        $("#tech_id").val(staff_id);
        $("#technician").val(name);
        $("#tmobile").val(mobile);

        $("#driver_list").css("display","none");
    

}


assign=function()
{
   if($("#tech_id").val()=="") return;
    var n=$("#tech").length;
    var d={
        "log_id":$("#log_id").val(),
        "tech_id":$("#tech_id").val()
    }

    $.ajax({
        url:"<?=base_url('tech_assign')?>",
        type:"POST",
        dataType:"JSON",
        data:d,
        success:function(data)
        {
           
            if(data==1)
            {
                var em="<tr>"+
                            "<td>"+ n+". "+$("#technician").val()+"</td>"+
                            "<td>"+$("#tmobile").val()+"</td>"+
                            '<td class="text-center"><a href="#" onclick="de_assign(this,'+$("#tech_id").val()+')"><i class="fa fa-trash text-danger"></i></a></td>'+                                                   

                        "</tr>";
                        $("#tbody").append(em);
                        $("#tech_id").val("");
                        $("#technician").val("");
                        $("#tmobile").val("");
                        Swal.fire({
                    title: 'Success!',
                    text: 'Assigned Successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }
            else
            {
                Swal.fire({
                    title: 'Error!',
                    text: 'Already assigned.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
               
                        
        },
        error:function(data)
        {
            alert(data);
        }

    })
}

de_assign=function(x,tech_id)

{
   
    var d={
        "log_id":$("#log_id").val(),
        "tech_id":tech_id
    }

    $.ajax({
        url:"<?=base_url('tech_de_assign')?>",
        type:"POST",
        dataType:"JSON",
        data:d,
        success:function(data)
        {
           
                    $(x).parent().parent().remove();
                    Swal.fire({
                    title: 'Success!',
                    text: 'Removed Successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
           
                        
        },
        error:function(data)
        {
            alert(data);
        }

    })
}



remarks_update=function(x)
{
   
    var d={
        "m_id":x,
        "remarks":$("#"+x).val()
    }

    $.ajax({
        url:"<?=base_url('remarks_update')?>",
        type:"POST",
        dataType:"JSON",
        data:d,
        success:function(data)
        {
           
                   
                    Swal.fire({
                    title: 'Success!',
                    text: 'Remarks Updated.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
           
                        
        },
        error:function(data)
        {
            // alert(data);
        }

    })
}


status_update=function(x)

{
  
    var d={
        "m_id":x,
        "status":1,
        "log_id":$("#log_id").val()
    }

    $.ajax({
        url:"<?=base_url('status_update')?>",
        type:"POST",
        dataType:"JSON",
        data:d,
        success:function(data)
        {
           
                $("#r_"+x).html($("#"+x).val());
                    $("#t_"+x).html('<span class="badge bg-success">Task Completed</span>');
                    Swal.fire({
                    title: 'Success!',
                    text: 'Task Completed.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            if(data==0)
            {
                $("#mnc").submit();
            }  
           
                        
        },
        error:function(data)
        {
            // alert(data);
        }

    })
}
    </script>
   


