<?php 
session_start();
include('adminincludes/header.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-light">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                    $managers = getAll('factory_manager', 'first_name');
                    echo mysqli_num_rows($managers);
                  ?>
                </h3>

                <p>Factory Managers</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-book-outline"></i>
              </div>
              <a href="managers.php" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #E6E6FA;">
              <div class="inner">
                <h3>
                  <?php
                  $deliveries_received = "SELECT sum(qty_delivered) as kilos FROM deliveries";
                  $deliveries = mysqli_query($conn, $deliveries_received);
                  $data = mysqli_fetch_array($deliveries);
                  echo $data['kilos'];

                  ?>
                  <sup style="font-size: 20px">Kgs</sup></h3>

                <p>All Kilos Received</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="deliveries.php" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #B2FFFF;">
              <div class="inner">
                <h3>
                  <?php
                    $farmers = getAll('farmer', 'first_name');
                    echo mysqli_num_rows($farmers);
                  ?>
                </h3>

                <p>Farmers Registered</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="farmers.php" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #7CB9E8;">
              <div class="inner">
                <h3>
                  <?php
                    $factories = getAll('society', 'name');
                    echo mysqli_num_rows($factories);

                  ?>
                </h3>

                <p>Factories Registered</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="societies.php" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </section>

    <div class="container">
      <div class="row">
        
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Kilos Received</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
        
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Overall Running Total</h3>

              <!-- <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">CHERY GRADE I</th>
                                    <th scope="col">CHERY GRADE II</th>
                                    <th scope="col">MBUNI</th>

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
                                         
                                        
                                        ?>


                                        <tr>
                                            <td><?php echo $delivery['date']; ?></td>
                                            <td><?php echo $running_total; ?> Kgs</td>
                                            <td><?php echo $running_totalII; ?> Kgs</td>
                                            <td><?php echo $running_totalm; ?> Kgs</td>
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


      </div>
    </div>
          

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Notices</h5>
      <p>This is the first notice.</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Bringing change to the Coffee Industry.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="#">Coffee-Project</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<?php include('adminincludes/footer.php'); ?>
