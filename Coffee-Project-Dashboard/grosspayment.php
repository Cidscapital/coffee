<?php 
session_start();
include('adminincludes/header.php');

if(isset($_GET['id'])){
    $factoryid = $_GET['id'];
    $factory = getByID('society', $factoryid);
    if(mysqli_num_rows($factory) > 0){
        $factorydata = mysqli_fetch_array($factory);
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-light">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Gross Payment Journal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Gross Payment Journal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Data Table -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <h5 class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $factorydata['name'] ?>
                                Gross Payment Journal
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="grosspaymentpdf.php?id=<?php echo $factoryid ?>" class="btn btn-secondary" target="_blank"><i class="ion ion-plus"> </i> Generate PDF</a>   
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
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
                            <tbody>
                                <?php
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
                                                ?>
                                                <tr>
                                                    <td><?php echo $totalI ?></td>
                                                    <td><?php echo $totalII ?></td>
                                                    <td><?php echo $mtotal ?></td>
                                                    <td><?php echo $farmerdata['member_number'] ?></td>
                                                    <td><?php echo $farmerdata['first_name'] ?></td>
                                                    <td><?php echo $data['debt'] ?></td>
                                                    <td><?php echo $rateI ?></td>
                                                    <td><?php echo $rateII ?></td>
                                                    <td><?php echo $mrate ?></td>
                                                    <td><?php echo round($data['gross'], 2); ?></td>
                                                    <td><?php echo round($data['net'], 2) ?></td>
                                                </tr>

                                                <?php }

                                            }
                                        }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Data Table -->

    

</div>

<?php include('adminincludes/footer.php'); ?>