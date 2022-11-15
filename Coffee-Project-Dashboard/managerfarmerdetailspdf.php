<?php 
session_start();
include('functions/sqlfunctions.php');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if(isset($_GET['id'])){
    $farmerid = $_GET['id'];
    $farmer = getByID('farmer', $farmerid);
    if(mysqli_num_rows($farmer) > 0){
        $farmerdata = mysqli_fetch_array($farmer);

    }
}

$html ='<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        td,
        h3,
        p {
            text-align: center;
        }

        thead {
            display: table-header-group; }
          
        table,
        th,
        td {
        border-bottom: 1px solid #000; }
          
        td,
        th {
        padding: 8px 16px;
        page-break-inside: avoid; }
    </style>
  </head>
  <body>
    <h3 style="text-align: center;">'.$farmerdata['first_name'].' '.$farmerdata['last_name'].' Produce Record</h3>
    <table style="width: 100%" border="1">
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