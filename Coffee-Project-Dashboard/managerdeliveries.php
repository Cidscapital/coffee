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
            <h1 class="m-0">Deliveries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Deliveries</li>
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
                                                    <td><a href="editdelivery.php?id=<?php echo $delivery['id'] ?>" class="btn btn-primary"><i class="ion ion-android-create"> </i> Update</a> | 
                                                            <button type="button" class="btn btn-danger deleteDeliveryBtn"><i class="ion ion-android-delete"> </i> Delete</button></td>
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
    <!-- End Data Table -->

    <!-- Delete Delivery Modal -->
    <div class="modal fade" id="deleteDelivery" tabindex="-1" aria-labelledby="deleteDelivery" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteFarmer">Delete Delivery</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this delivery?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/delivery.php">
                    <input type="hidden" name="deliveryid" id="deliveryid">
                    <button type="submit" name="deleteDelivery" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>