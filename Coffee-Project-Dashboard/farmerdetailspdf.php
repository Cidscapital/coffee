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
    $farmerid = $_GET['id'];
    $farmer = getByID('farmer', $farmerid);
    if(mysqli_num_rows($farmer) > 0){
        $farmerdata = mysqli_fetch_array($farmer);
        $factoryid = $farmerdata['society_id'];
        $factory = getByID('society', $factoryid);
        $factorydata = mysqli_fetch_array($factory);

    }
}

$html ='<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #container{
            width:1000px;
            margin: 0;
            margin-bottom: 3cm;
        }

        .col1{
            width: 100px;
            float: left;
            margin: 10px;
        }
        
        .col2{
            width: 360px;
            float: left;
            margin: 10px;
            margin-left: 2cm;
            text-align: center;
        }
        
        .col3 {
            width: 360px;
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
        <h3>MEMBERS PRODUCE RECORD</h3>
    </div>
    <div class="col2">
        <h4>'.$factorydata['name'].'</h4>
        <h4>'.$farmerdata['first_name'].' '.$farmerdata['last_name'].' Record </h4>
    </div>
    <div class="col3">
        <table>

            <tr>
                <td rowspan="2" colspan="3" style="width: 7mm;"></td>
                
                <td>MEMBER NO</td>
                <td colspan="4" style="width: 7mm;">'.$farmerdata['member_number'].'</td>
                
            </tr>
            <tr>
                
                <td colspan="3">ACTIVITY NO</td>
                <td style="width: 7mm;"></td>
                <td style="width: 7mm;"></td>
            </tr>
            <tr>
                <td>PAGE NO</td>
                <td style="width: 7mm;"></td>
                <td style="width: 7mm;"></td>
                <td>CSNO</td>
                <td style="width: 7mm;"></td>
                <td style="width: 7mm;"></td>
                <td style="width: 7mm;"></td>
                <td style="width: 7mm;"></td>
            </tr>
        </table>
    </div>

    </div>
    <table style="width: 1000px">
        <thead>
        <tr>
            <th scope="col" rowspan="2">Date</th>
            <th scope="col" colspan="3" class="text-center">KILOS DELIVERED</th>
            
            <th scope="col" rowspan="2">Members Number</th>
            <th scope="col" rowspan="2">Receipt Number</th>
        </tr>
        <tr>

            <th scope="col">Cherry Grade I</th>
            <th scope="col">Cherry Grade II</th>
            <th scope="col">Mbuni</th>
            
        </tr>
        </thead>
        <tbody>';
            
        if(isset($_GET['id'])){
            $farmer_id = $_GET['id'];
            $deliveries_query = "SELECT * FROM deliveries WHERE farmer_id=$farmer_id ";
            $deliveries = mysqli_query($conn, $deliveries_query);
            foreach ($deliveries as $delivery) {
                
                if($delivery['item_id']==12){
                    $cherryI = $delivery['qty_delivered'];
                }else{
                    $cherryI = '--';
                }

                if($delivery['item_id']==13){
                    $mbuni = $delivery['qty_delivered'];
                }else{
                    $mbuni = '--';
                }

                if($delivery['item_id']==14){
                    $cherryII = $delivery['qty_delivered'];
                }else{
                    $cherryII = '--';
                }


                $html .='<tr>
                <td>'.$delivery['date'].'</td>
                <td>'.$cherryI.'</td>
                <td>'.$cherryII.'</td>
                <td>'.$mbuni.'</td>
                <td>'.$farmerdata['member_number'].'</td>
                <td></td>
                </tr>';
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
$dompdf->stream('Farmerdetails.pdf', ['Attachment'=>0]);

?>