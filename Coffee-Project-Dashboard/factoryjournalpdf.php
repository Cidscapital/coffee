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
    <h3> Factory Journal </h3>
    <table style="width: 100%" border="1">
        <thead>
        <tr>
            <th colspan="3">KILOS DELIVERED</th>


            <th rowspan="2">Members Name</th>
            <th rowspan="2">Members Number</th>
            <th rowspan="2">Date</th>
        </tr>
        <tr>
            <th>Cherry Grade I</th>
            <th>Cherry Grade II</th>
            <th>Mbuni</th>



        </tr>
        </thead>
        <tbody>';
            
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM deliveries WHERE factory_id = $id ";
            $deliveries = mysqli_query($conn, $sql);
            if(mysqli_num_rows($deliveries)>0){
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
                    
                    $id = $delivery['farmer_id'];
                    $farmer_query = "SELECT * FROM farmer WHERE id= $id ";
                    $farmer = mysqli_query($conn, $farmer_query);
                    if(mysqli_num_rows($farmer) > 0){
                        $data = mysqli_fetch_array($farmer);

                    }


                    $html .='<tr>
                    <td>'.$cherryI.'</td>
                    <td>'.$cherryII.'</td>
                    <td>'.$mbuni.'</td>
                    <td>'.$data['first_name'].' '.$data['last_name'].'</td>
                    <td>'.$data['member_number'].'</td>
                    <td>'.$delivery['date'].'</td>
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
$dompdf->stream('FactoryJournal.pdf', ['Attachment'=>0]);

?>