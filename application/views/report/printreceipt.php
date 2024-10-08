
             
 <?php  
            
            function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return "Rupees ".($Rupees ? $Rupees . 'Rupees ' : '') . $paise." Only ";
}
            ?>

<div class="main-content" id="invoice-POS" >
<form action="<?=base_url('closing')?>" method="POST" id="back_"  >
               
            </form>
    <div class="page-content" >
        <!-- <div class="container-fluid"> -->

            <!-- <#?php $this->load->view('layouts/page_top.php') ?> -->
            <?php if($d_amount>0) { 
                $top='20px';?>
            <div class="row mt-2"  >
                <div class="col-lg-12" style="border:0px solid red">
                    <table  style="width:100%;text-indent:10px;">
                        <tr>
                            <td style="width:10%"><img src="<?=base_url('assets/images/logo.png')?>" alt="" style="height:50px;margin-top:-30px;"></td>
                            <td class="text-center">
                            <h5>MULTITECH ENGINEERING CONSULTANTS</h5>
                            <p>Address: 2nd floor, Ganesh Market, Above LIC Office, Near UCO Bank, Narengi Tiniali<br>Guwahati-26, Assam</p>
                            <h4 style="text-transform: uppercase;text-decoration:underline;">MONEY RECEIPT</h4>
                            </td>
                        </tr>
                    </table >
                </div>
                <hr>
             <div class="col-lg-12">
             <table  style="width:100%;text-indent:10px;">
                        <tr>
                            <td style="width:50%;text-transform:uppercase;">
                                <h5>Driver Name : <?=$dname?></h5>
                                <h5>Employee Id : <?=$d_empid?></h5>
                                <h5>Contact No : <?=$d_contact?></h5>
                            </td>
                            <td  style="width:50%;text-align:right;text-transform:uppercase;">
                            <h5>Receipt No : <?=$d_receipt_no?></h5>
                            <h5 >Date : <?=$date?></h5>
                            </td>
                        </tr>
                    </table >
             </div>

            
              <div class="col-lg-12 mt-4">
                <table style="width:100%;text-indent:10px;">
                      
                        <tr>
                            <th style="border:1px solid gray;width:60%">Description</th>
                            <th style="border:1px solid gray;width:40%;text-align:right;padding-right:20px;">Amount</th>

                          
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Received</td>
                            <td style="border:1px solid gray;text-align:right;padding:10px;"><?=$d_amount?></td>
                        </tr>
                        <tr>
                            <td colspan=2 style="border:1px solid gray;text-transform:uppercase;"><?=getIndianCurrency($d_amount)?></td>
                        </tr>
                    </table>                   
             
              </div>
         
              
                
              </div>



              </div>
              <hr style="border:1px dashed gray;margin-top:180px;">
              <?php } else $top=''; ?>
             <!-- Conductor -->
             <?php if($c_amount>0) { ?>
             <div class="row"  style="margin-top:<?=$top?>;">
                <div class="col-lg-12 mt-4" style="border:0px solid red;">
                    <table  style="width:100%;text-indent:10px;">
                        <tr>
                            <td style="width:10%"><img src="<?=base_url('assets/images/logo.png')?>" alt="" style="height:50px;margin-top:-30px;"></td>
                            <td class="text-center">
                            <h5>MULTITECH ENGINEERING CONSULTANTS</h5>
                            <p>Address: 2nd floor, Ganesh Market, Above LIC Office, Near UCO Bank, Narengi Tiniali<br>Guwahati-26, Assam</p>
                            <h4 style="text-transform: uppercase;text-decoration:underline;">MONEY RECEIPT</h4>
                            </td>
                        </tr>
                    </table >
                </div>
                <hr>
             <div class="col-lg-12">
             <table  style="width:100%;text-indent:10px;">
             <tr>
                            <td style="width:50%;text-transform:uppercase;">
                                <h5>Conductor Name : <?=$cname?></h5>
                                <h5>Employee Id : <?=$c_empid?></h5>

                                <h5>Contact No : <?=$c_contact?></h5>
                            </td>
                            <td  style="width:50%;text-align:right;text-transform:uppercase;">
                            <h5>Receipt No : <?=$c_receipt_no ?></h5>
                            <h5 >Date : <?=$date ?></h5>
                            </td>
                        </tr>
                    </table >
             </div>

            
              <div class="col-lg-12 mt-4">
                <table style="width:100%;text-indent:10px;">
                      
                        <tr>
                            <th style="border:1px solid gray;width:60%">Description</th>
                            <th style="border:1px solid gray;width:40%;text-align:right;padding-right:20px;">Amount</th>

                          
                        </tr>
                        <tr>
                            <td style="border:1px solid gray;">Received</td>
                            <td style="border:1px solid gray;text-align:right;padding:10px;"><?=$c_amount?></td>
                        </tr>
                        <tr>
                            <td colspan=2 style="border:1px solid gray;text-transform:uppercase;"><?=getIndianCurrency($c_amount)?></td>
                        </tr>
                    </table>                   
             
              </div>

             
              
                
              </div>


              </div>
              <?php } ?>
<!-- </div> -->

  

  
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
     document.title="Receipt";
     window.print();

	 $("#back_").submit();
    //  alert("hello");
    //  document.body.innerHTML = originalContents;
}
  </script>