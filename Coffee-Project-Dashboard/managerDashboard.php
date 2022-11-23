<?php 
include('../functions/authentication.php');
include('adminincludes/managerheader.php');
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
              <li class="breadcrumb-item"><a href="managerDashboard.php">Home</a></li>
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
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                    if(isset($_SESSION['auth_user'])){
                      $societyid = $_SESSION['auth_user']['societyid'];
                      $deliveries_query = "SELECT * FROM deliveries WHERE factory_id=$societyid";
                      $deliveries = mysqli_query($conn, $deliveries_query);

                      echo mysqli_num_rows($deliveries);
                    }
                  ?>
                </h3>

                <p>Deliveries Recorded</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-book-outline"></i>
              </div>
              <a href="managerfactoryjournal.php" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #E6E6FA;">
              <div class="inner">
                <h3>
                <?php
                    if(isset($_SESSION['auth_user'])){
                      $societyid = $_SESSION['auth_user']['societyid'];
                      $deliveries_received = "SELECT sum(qty_delivered) as kilos FROM deliveries WHERE factory_id=$societyid";
                      $received = mysqli_query($conn, $deliveries_received);
                      $data = mysqli_fetch_array($received);
                      echo $data['kilos'];

                    }
                  ?>
                  <sup style="font-size: 20px">Kgs</sup></h3>

                <p>Kilos Received</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="managerdeliveries.php" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #B2FFFF;">
              <div class="inner">
                <h3>
                  <?php
                    if(isset($_SESSION['auth_user'])){
                      $societyid = $_SESSION['auth_user']['societyid'];
                      $farmer_query = "SELECT * FROM farmer WHERE society_id=$societyid";
                      $farmers = mysqli_query($conn, $farmer_query);

                      echo mysqli_num_rows($farmers);
                    }
                  ?>

                </h3>

                <p>Farmers Registered</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="managerfarmers.php" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </section>

    <div class="container">
      <div class="row">
        
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <h5 class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Deliveries
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="adddelivery.php" class="btn btn-secondary"><i class="ion ion-plus"> </i> Add</a>   
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#_ID</th>
                                    <th scope="col">Factory ID</th>
                                    <th scope="col">Farmer ID</th>
                                    <th scope="col">Item ID</th>
                                    <th scope="col">Qty_Delivered</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 

                                        if(isset($_SESSION['auth_user'])){
                                            $societyid = $_SESSION['auth_user']['societyid'];
                                            $deliveries_query = "SELECT * FROM deliveries WHERE factory_id=$societyid";
                                            $deliveries = mysqli_query($conn, $deliveries_query);

                                            foreach ($deliveries as $delivery) { ?>
                                                <tr>
                                                    <td><?php echo $delivery['id'] ?></td>
                                                    <td><?php echo $delivery['factory_id'] ?></td>
                                                    <td><?php echo $delivery['farmer_id'] ?></td>
                                                    <td><?php echo $delivery['item_id'] ?></td>
                                                    <td><?php echo $delivery['qty_delivered'] ?></td>
                                                    <td><?php echo $delivery['date'] ?></td>
                                                    <td><a href="editdelivery.php?id=<?php echo $delivery['id'] ?>" class="btn btn-primary"><i class="ion ion-android-create"> </i></a> | 
                                                            <button type="button" class="btn btn-danger deleteDeliveryBtn"><i class="ion ion-android-delete"> </i></button></td>
                                                </tr>
                                        <?php }

                                        }


                                    ?>
                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
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
