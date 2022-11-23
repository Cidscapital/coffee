<?php 
session_start();
if(isset($_SESSION['auth'])){
    if($_SESSION['auth_user']['role'] == 'admin'){
      $_SESSION['middleware'] = '';
    }else{
      $_SESSION['redirect'] = "You are not authorized to access this page.";
      header('Location: ../Login-Page/login1.php');
    }
}else{
    $_SESSION['redirect'] = "Login to continue.";
    header('Location: ../Login-Page/login1.php');
}
include('functions/sqlfunctions.php');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if(isset($_GET['id'])){
    $factoryid = $_GET['id'];
    $factory = getByID('society', $factoryid);
    if(mysqli_num_rows($factory) > 0){
        $factorydata = mysqli_fetch_array($factory);
    }
}

$html ='<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <title>Gross Payment</title>
    <style>
        #container{
            width:1000px;
            margin: 0;
            margin-bottom: 3cm;
        }

        .col1{
            width: 80px;
            float: left;
            margin: 10px;
        }

        .col4{
            width: 240px;
            float: left;
            margin: 10px;
            text-align: center;
        }
        
        .col2{
            width: 280px;
            float: left;
            margin: 10px;
            margin-left: 2cm;
            text-align: center;
        }
        
        .col3 {
            width: 205px;
            float: right;
            margin-bottom: 4mm;
            margin-top: 1cm;
        }

        table,
        td,
        th {
            border:2px solid #000;
            border-collapse: collapse;
        }

        td {
            text-align: center;
        }

    </style>
  </head>
  <body>
        <div id="container">
           
                <div class="col1">
                    <h3>GROSS PAYMENT JOURNAL</h3>
                </div>
                <div class="col2">
                    <h4>Meringamieru Society C.S LTD</h4>
                    <h4>'.$factorydata['name'].'</h4>
                </div>
                <div class="col4">
                    <h4>Cherry Delivered Up To 20/.....</h4>
                    <h4>Payment No ............................</h4>
                </div>
                <div class="col3">
                    <table>

                        <tr>
                            <th style="width: 20mm;">Page No</th>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                        </tr>
                        <tr>
                            <th style="width: 7mm; text-align: left;" colspan="3">Action No</th>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                        </tr>
                        <tr>
                            <th style="width: 7mm;">CS No</th>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                        </tr>
                    </table>
                </div>
            
        </div>
        <div id="container">
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2">Date</th>
                        <th scope="col" colspan="3" style="text-align: center;">Killos Delivered</th>
                        
                        <th scope="col" rowspan="2">Members Number</th>
                        <th scope="col" rowspan="2">Members Name</th>
                        <th scope="col" rowspan="2">Debt</th>
                        <th scope="col">Shs Grade I</th>
                        <th scope="col">Shs Grade II</th>
                        <th scope="col">Shs Mbuni</th>
                        <th scope="col" rowspan="2">Accumulated Gross Payment</th>
                        <th scope="col" rowspan="2">Entered Into NP</th>
                    </tr>
                    <tr>

                        <th scope="col">Cherry Grade I</th>
                        <th scope="col">Cherry Grade II</th>
                        <th scope="col">Mbuni</th>



                        <th scope="col">Rate CTS/KG</th>
                        <th scope="col">Rate CTS/KG</th>
                        <th scope="col">Rate CTS/KG</th>


                    </tr>
                </thead>
                <tbody>';
            
                $payments = getAll('payment', 'id');
                foreach($payments as $payment){
                    $itemid = $payment['item_id'];
                    $farmerid = $payment['farmer_id'];
                    $marketrate = $payment['market_rate'];
                    
                    // $farmer = getByID('farmer', $farmerid);
                    // $farmerdata = mysqli_fetch_array($farmer);

                    $farmer_query = "SELECT * FROM farmer WHERE id=$farmerid AND society_id=$factoryid ";
                    $farmer = mysqli_query($conn, $farmer_query);
                    if(mysqli_num_rows($farmer)>0){
                        $farmerdata = mysqli_fetch_array($farmer);
                        $sql = " SELECT debt, p.farmer_id, p.item_id, sum(qty_delivered) as total, 
                        sum(qty_delivered) * $marketrate as gross, (sum(qty_delivered) * $marketrate) - debt as net 
                        FROM deliveries d JOIN payment p on d.item_id= p.item_id WHERE d.farmer_id=$farmerid AND d.item_id=$itemid ";
                        $run = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($run)>0){ 
                            $data = mysqli_fetch_array($run);

                            if($itemid == 12) {
                                $totalI = $data['total'];
                                $rateI = $marketrate;
                                //$rateI = $ratedata['rate'];
                            } else {
                                $totalI = '';
                                $rateI= '';
                            }
                            if($itemid == 14) {
                                $totalII = $data['total'];
                                $rateII = $marketrate;
                                //$rateII = $ratedata['rate'];
                            } else {
                                $totalII = '';
                                $rateII = '';
                            }
                            if($itemid == 13) {
                                $mtotal =$data['total'];
                                $mrate = $marketrate;
                                //$mrate = $ratedata['rate'];
                            } else {
                                $mtotal = '';
                                $mrate = '';
                            }
                            $html .='<tr>
                                        <td>'. $payment['date'] .'</td>
                                        <td>'. $totalI .'</td>
                                        <td>'. $totalII .'</td>
                                        <td>'. $mtotal .'</td>
                                        <td>'. $farmerdata['member_number'] .'</td>
                                        <td>'. $farmerdata['first_name'] .'</td>
                                        <td>'. $data['debt'] .'</td>
                                        <td>'. $rateI .'</td>
                                        <td>'. $rateII .'</td>
                                        <td>'. $mrate .'</td>
                                        <td>'. round($data['gross'], 2) .'</td>
                                        <td>'. round($data['net'], 2) .'</td>
                                    </tr>';
                        }
                    }
                }
    
        
        
$html .= '</tbody>
        </table>
    </body>
</html>';       
        
        
    

$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);


$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('grosspayment.pdf', ['Attachment'=>0]);

?>