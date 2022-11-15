<?php 
session_start();
include('functions/sqlfunctions.php');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;



$html ='<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <h3 style="text-align: center;">Summary of Factory Journals Society Copy</h3>
    <table style="width: 100%" border="1">
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
            $sql2 = "SELECT * FROM deliveries WHERE date = '$date' ";
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