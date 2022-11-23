<?php 
session_start();
include('adminincludes/managerheader.php'); 
include('functions/sqlfunctions.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-light">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Summary of Factory Journal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Summary of Factory Journal</li>
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
                                <?php
                                    if(isset($_SESSION['auth_user'])){
                                        $societyid = $_SESSION['auth_user']['societyid'];
                                        $factory = getByID('society', $societyid);
                                        if(mysqli_num_rows($factory) > 0){
                                            $factorydata = mysqli_fetch_array($factory);
                                            echo $factorydata['name'].' '.'Summary';
                                        }
                                    }

                                ?>
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="managersummarypdf.php" class="btn btn-secondary" target="_blank"><i class="ion ion-plus"> </i> Generate PDF</a>   
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
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
                            <tbody>
                                <?php
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
                                         
                                        
                                        ?>


                                        <tr>
                                            <td><?php echo $delivery['date']; ?></td>
                                            <td><?php echo $fjno; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $running_total; ?></td>
                                            <td><?php echo $totalII; ?></td>
                                            <td><?php echo $running_totalII; ?></td>
                                            <td><?php echo $totalm; ?></td>
                                            <td><?php echo $running_totalm; ?></td>
                                            <td></td>
                                        </tr>

                                <?php 
                                        $fjno = $fjno + 1;
                                        $total = 0;
                                        $totalII = 0;
                                        $totalm = 0;
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