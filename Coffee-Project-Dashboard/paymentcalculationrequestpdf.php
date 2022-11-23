<?php 
session_start();
if(isset($_SESSION['auth'])){
    if($_SESSION['auth_user']['role'] == 'admin'){
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


$html ='<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1">
    <title>Payment Calculation Request</title>
    <style>
        #container{
            width:1000px;
            margin: 0;
            margin-bottom: 45mm;
        }

        .col1{
            width: 80px;
            float: left;
            margin: 10px;
        }

        .col4{
            width: 220px;
            float: left;
            text-align: center;
            margin-top: 1cm;
        }
        
        .col2{
            width: 220px;
            float: left;
            margin: 10px;
            margin-left: 2cm;
            text-align: center;
        }
        
        .col3 {
            width: 250px;
            float: right;
            margin-bottom: 4mm;
            margin-top: 1cm;
        }

        .col5{
            width: 280px;
            float: left;
            margin-top: 7mm;
        }

        .col6 {
            width: 450px;
            float: left;
            margin-top: 7mm;
            margin-left: 2cm;
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

        th {
            text-align: left;
        }

    </style>
  </head>
  <body>
        <div id="container">
           
                <div class="col1">
                    <h3>PAYMENT CALCULATION REQUEST</h3>
                </div>
                <div class="col2">
                    <h3>UNION COPY</h3>
                </div>
                <div class="col4">
                    <div class="box" style="border:2px solid #000; height: 1cm;">

                    </div>
                </div>
                <div class="col3">
                    <table>

                        <tr>
                            <th colspan="3" style="width: 10cm; text-align: left;">NO OF PAYMENT</th>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                        </tr>
                        <tr>
                            <th style="text-align: left;" colspan="5">FOR CHERRY DELIVERED FROM/.........TO/........</th>
                        </tr>
                        <tr>
                            <th style="text-align: left;">CS/No</th>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                            <td style="width: 7mm;"></td>
                        </tr>
                    </table>
                </div>
            
        </div>
        <div id="container">
            <table style="width: 1000PX">
                <thead>
                    <tr>
                        <th scope="col">ACTIVITY NO NAME</th>
                        <th scope="col">KGS</th>
                        <th scope="col">01.</th>
                        <th scope="col">02.</th>
                        <th scope="col">03.</th>
                        <th scope="col">04.</th>
                        <th scope="col">05.</th>
                        <th scope="col">06.</th>
                        <th scope="col">07.</th>
                        <th scope="col">08.</th>
                        <th scope="col">09.</th>
                        <th scope="col">10.</th>
                        <th scope="col">11.</th>
                        <th scope="col">TOTAL</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" colspan="15">I. STATISTICAL INFORMATION</th>
                    </tr>
                    <tr>
                        <th scope="row">A. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>A.</td>
                    </tr>
                    <tr>
                        <th scope="row">B. Cherry grade II</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>B.</td>
                    </tr>
                    <tr>
                        <th scope="row">C. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>C.</td>
                    </tr>
                    <tr>
                        <th scope="row">D. Cherry grade I</th>
                        <td>%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>D.</td>
                    </tr>
                    <tr>
                        <th scope="row">E. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>E.</td>
                    </tr>
                    <tr>
                        <th scope="row">F. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>F.</td>
                    </tr>
                    <tr>
                        <th scope="row">G. Cherry grade I</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>G.</td>
                    </tr>
                    <tr>
                        <th scope="row">H. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>H.</td>
                    </tr>
                    <tr>
                        <th scope="row">J. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>J.</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="15">II. CALCULATION OF HIGHEST POSSIBLE<br/> PAYMENT AND CASH NEEDED</th>
                    </tr>
                    <tr>
                        <th scope="row">K. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>K.</td>
                    </tr>
                    <tr>
                        <th scope="row">L. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>L.</td>
                    </tr>
                    <tr>
                        <th scope="row">M. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>M.</td>
                    </tr>
                    <tr>
                        <th scope="row">N. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>N.</td>
                    </tr>
                    <tr>
                        <th scope="row">O. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>O.</td>
                    </tr>
                    <tr>
                        <th scope="row">P. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>P.</td>
                    </tr>
                    <tr>
                        <th scope="row">Q. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Q.</td>
                    </tr>
                    <tr>
                        <th scope="row">R. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>R.</td>
                    </tr>
                    <tr>
                        <th scope="row">S. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>S.</td>
                    </tr>
                    <tr>
                        <th scope="row">T. Cherry grade I</th>
                        <td>kgs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>T.</td>
                    </tr>
                    <tr>
                        <th scope="row">U. Cherry grade I</th>
                        <td>%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>U.</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="15">III. LIQUIDITY CALCULATION</th>
                    </tr>
                    <tr>
                        <th scope="row">V. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>V.</td>
                    </tr>
                    <tr>
                        <th scope="row">X. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>X.</td>
                    </tr>
                    <tr>
                        <th scope="row">Y. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Y.</td>
                    </tr>
                    <tr>
                        <th scope="row">Z. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Z.</td>
                    </tr>
                    <tr>
                        <th scope="row">a. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>a.</td>
                    </tr>
                    <tr>
                        <th scope="row">b. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>b.</td>
                    </tr>
                    <tr>
                        <th scope="row">c. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>c.</td>
                    </tr>
                    <tr>
                        <th scope="row">d. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>d.</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="15">IV. RATE CALCULATION</th>
                    </tr>
                    <tr>
                        <th scope="row">e. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>e.</td>
                    </tr>
                    <tr>
                        <th scope="row">f. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>f.</td>
                    </tr>
                    <tr>
                        <th scope="row">g. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>g.</td>
                    </tr>
                    <tr>
                        <th scope="row">h. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>h.</td>
                    </tr>
                    <tr>
                        <th scope="row">i. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>i.</td>
                    </tr>
                    <tr>
                        <th scope="row">j. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>j.</td>
                    </tr>
                    <tr>
                        <th scope="row">k. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>k.</td>
                    </tr>
                    <tr>
                        <th scope="row">m. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>m.</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="15">V. OTHER INFORMATION</th>
                    </tr>
                    <tr>
                        <th scope="row">n. Cherry grade I</th>
                        <td>%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>n.</td>
                    </tr>
                    <tr>
                        <th scope="row">o. Cherry grade I</th>
                        <td>%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>o.</td>
                    </tr>
                    <tr>
                        <th scope="row">p. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>p.</td>
                    </tr>
                    <tr>
                        <th scope="row">q. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>q.</td>
                    </tr>
                    <tr>
                        <th scope="row">r. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>r.</td>
                    </tr>
                    <tr>
                        <th scope="row">s. Cherry grade I</th>
                        <td>Shs</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>s.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="container">
            <div class="col5">
                THIS PAYMENT CALCULATION IS PREPARED BY: <br/><br/>
                NAME: ....................................
                OCCUPATION:...............................
                SIGNATURE:.................................
                DATE:......................................
            </div>
            <div class="col6">
                WE HEREBY CERTIFY THAT THIS PAYMENT CALCULATION HAS BEEN CHECKED AND APPROVED BY US:<br/><br/>
                SOC CHAIRMAN :.............................................................................
                SOC TREASURER :............................................................................
                SOC SECR/MANAGER:............................................................
                UNION OFFICIAL:............................................................................
                D.C.O:.....................................................................................
            </div>
        </div>
  </body>
</html>';      
        
        
    

$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);


$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('paymentcalculation.pdf', ['Attachment'=>0]);

?>