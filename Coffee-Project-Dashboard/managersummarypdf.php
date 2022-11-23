<?php 
session_start();
if(isset($_SESSION['auth'])){
  if($_SESSION['auth_user']['role'] == 'manager'){
    $_SESSION['middleware'] = '';
  }else{
    $_SESSION['redirect'] = "You are not authorized to access this page.";
    header('Location: ../Login-Page/managerlogin.php');
  }
}else{
  $_SESSION['redirect'] = "Login to continue.";
  header('Location: ../Login-Page/managerlogin.php');
}
include('functions/sqlfunctions.php');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if(isset($_SESSION['auth_user'])){
  $societyid = $_SESSION['auth_user']['societyid'];
  $factory = getByID('society', $societyid);
  if(mysqli_num_rows($factory) > 0){
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
            width: 900px;
            margin-bottom: 8em;
        }

        .col1{
            width: 200px;
            float: left;
            margin: 10px;
        }
        
        .col2{
            width: 360px;
            float: left;
            margin: 10px;
            margin-right: 2cm;
            text-align: center;
        }
        
        .col3 {
            width: 430px;
            float: left;
        }

        table,
        td,
        th {
            border:2px solid #000;
            border-collapse: collapse;
        }

    </style>
  </head>
  <body>
    <div id="container">
        <div class="col1">
            <h3>SUMMARY OF FACTORY JOURNALS SOCIETY COPY</h3>
        </div>
        <div class="col2">
            <h4>MIRIGAMIERU C.S. LTD</h4>
            <h4>'.$factorydata['name'].' Summary</h4>
        </div>
        <div class="col3">
            <table>

                  <tr>
                    <th style="text-align: left; width: 6cm;">PAGE NO.</th>
                    <td style="width: 7mm;"></td>
                    <td style="width: 7mm;"></td>
                    <td style="width: 7mm;"></td>
                    <td style="width: 7mm;"></td>
                  </tr>
                  <tr>
                    <th style="text-align: left;">ACTIVITY NO.</th>
                    <td style="width: 7mm;"></td>
                    <td style="width: 7mm;"></td>
                    <td style="width: 7mm;"></td>
                    <td style="width: 7mm;"></td>
                  </tr>
                  <tr>
                    <th style="text-align: left;">C.S/NO.</th>
                    <td style="width: 7mm;"></td>
                    <td style="width: 7mm;"></td>
                    <td style="width: 7mm;"></td>
                    <td style="width: 7mm;"></td>
                  </tr>
                  <tr>
                    <th style="text-align: left;">FROM........................../...................</th>
                    <th rowspan="2" colspan="4" style="width: 7mm;">20..............</th>
                    
                  </tr>
                  <tr>
                    <th style="text-align: left;">TO............................./......................</th>
                    
                  </tr>
            </table>
        </div>
    </div>';

  $html .='<table style="width: 100%">
        <thead>
          <tr>
            <th scope="col" rowspan="2">Date</th>
            <th scope="col" rowspan="2">FJ No</th>
            <th scope="col" colspan="2">CHERY GRADE I</th>
            
            <th scope="col" colspan="2">CHERY GRADE II</th>

            <th scope="col" colspan="2">MBUNI</th>

            <th scope="col" rowspan="2">SIGNATURE</th>
          </tr>
          <tr>


            <th scope="col">Kilos/FJ</th>
            <th scope="col">RUNNING TOTAL</th>
            <th scope="col">Kilos/FJ</th>
            <th scope="col">RUNNING TOTAL</th>
            <th scope="col">Kilos/FJ</th>
            <th scope="col">RUNNING TOTAL</th>

          </tr>
        </thead>
        <tbody>';
            
        $current_date = date("Y-m-d");
        $fjno = 637;
        $total = 0;
        $running_total = 0;
        $totalII = 0;
        $running_totalII = 0;
        $totalm = 0;
        $running_totalm = 0;
        $sql = "SELECT * FROM deliveries GROUP BY date";
        $deliveries = mysqli_query($conn, $sql);
        foreach ($deliveries as $delivery) { 
            $date = $delivery['date'];
            $sql2 = "SELECT * FROM deliveries WHERE factory_id=$societyid AND date = '$date' ";
            $sql2_run = mysqli_query($conn, $sql2);
            foreach ($sql2_run as $item) {
                if($item['item_id'] == 12){
                    $cheryI = $item['qty_delivered'];
                    $total = $total + $cheryI;
                    $running_total = $running_total + $cheryI;
                }else if($item['item_id'] == 14){
                    $cheryII = $item['qty_delivered'];
                    $totalII = $totalII + $cheryII;
                    $running_totalII = $running_totalII + $cheryII;
                } else if($item['item_id'] == 13){
                    $mbuni = $item['qty_delivered'];
                    $totalm = $totalm + $mbuni;
                    $running_totalm = $running_totalm + $mbuni;
                }
            }

            $html .='<tr>
                    <td>'.$delivery['date'].'</td>
                    <td>'.$fjno.'</td>
                    <td>'.$total.'</td>
                    <td>'.$running_total.'</td>
                    <td>'.$totalII.'</td>
                    <td>'.$running_totalII.'</td>
                    <td>'.$totalm.'</td>
                    <td>'.$running_totalm.'</td>
                    <td></td>
                </tr>';
            
            $fjno = $fjno + 1;
            $total = 0;
            $totalII = 0;
            $totalm = 0;

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
$dompdf->stream('FactoryJournalSummary.pdf', ['Attachment'=>0]);

?>