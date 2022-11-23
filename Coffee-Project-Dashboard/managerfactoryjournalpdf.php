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
    $society_querry = "SELECT * FROM society WHERE id = $societyid";
    $society = mysqli_query($conn, $society_querry);
    if(mysqli_num_rows($society)>0) {
        $societyData = mysqli_fetch_array($society);
    }
}


$html ='<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <style>
        #container{
            width:900px;
            margin-bottom: 6em;
        }

        .col1{
            width: 100px;
            float: left;
            margin: 10px;
        }
        
        .col2{
            width: 580px;
            float: left;
            margin: 10px;
            margin-left: 2cm;
            text-align: center;
        }
        
        .col3 {
            width: 300px;
            float: left;
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
            <h3>FACTORY JOURNAL</h3>
        </div>
        <div class="col2">
            <h4>NAME: '.$societyData['name'].'</h4>
        </div>
        <div class="col3">
            <table>

                    <tr>
                        <th colspan="3" style="text-align: left; width: 6cm;">ACTIVITY NO.</th>
                        <td style="width: 10mm;"></td>
                        <td style="width: 10mm;"></td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">CR/NO.</th>
                        <td style="width: 10mm;"></td>
                        <td style="width: 10mm;"></td>
                        <td style="width: 10mm;"></td>
                        <td style="width: 10mm;"></td>
                    </tr>
            </table>
        </div>
    </div>
    <table style="width: 100%">
        <thead>
        <tr>
            <th rowspan="2">Date</th>
            <th colspan="3">KILOS DELIVERED</th>


            <th rowspan="2">Members Number</th>
            <th rowspan="2">Members Name</th>
        </tr>
        <tr>
            <th>Cherry Grade I</th>
            <th>Cherry Grade II</th>
            <th>Mbuni</th>



        </tr>
        </thead>
        <tbody>';
            
        if(isset($_SESSION['auth_user'])){
            $societyid = $_SESSION['auth_user']['societyid'];
            $deliveries_query = "SELECT * FROM deliveries WHERE factory_id=$societyid";
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


                $id = $delivery['farmer_id'];
                $farmer_query = "SELECT * FROM farmer WHERE id= $id ";
                $farmer = mysqli_query($conn, $farmer_query);
                if(mysqli_num_rows($farmer) > 0){
                    $data = mysqli_fetch_array($farmer);
                }


                $html .='<tr>
                <td>'.$delivery['date'].'</td>
                <td>'.$cherryI.'</td>
                <td>'.$cherryII.'</td>
                <td>'.$mbuni.'</td>
                <td>'.$data['member_number'].'</td>
                <td>'.$data['first_name'].' '.$data['last_name'].'</td>
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
$dompdf->stream('FactoryJournal.pdf', ['Attachment'=>0]);

?>