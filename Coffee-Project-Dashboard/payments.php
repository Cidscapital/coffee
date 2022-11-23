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
            <h1 class="m-0"> All Payments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">All Payments</li>
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
                                All Payments
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="addpayment.php" class="btn btn-secondary"><i class="ion ion-plus"> </i> Add</a>
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#_ID</th>
                                    <th scope="col">Item ID</th>
                                    <th scope="col">Farmer ID</th>
                                    <th scope="col">Debt</th>
                                    <th scope="col">Market Rate</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                        $payments = getAll('payment', 'id');
                                        foreach ($payments as $payment) { ?>
                                        <tr>
                                            <td><?php echo $payment['id'] ?></td>
                                            <td><?php echo $payment['item_id'] ?></td>
                                            <td><?php echo $payment['farmer_id'] ?></td>
                                            <td><?php echo $payment['debt'] ?></td>
                                            <td><?php echo $payment['market_rate'] ?></td>
                                            <td><?php echo $payment['date'] ?></td>
                                            <td><a href="editpayment.php?id=<?php echo $payment['id'] ?>" class="btn btn-primary"><i class="ion ion-android-create"> </i></a> | 
                                                    <button type="button" class="btn btn-danger paymentdeletebtn"><i class="ion ion-android-delete"> </i></button></td>
                                        </tr>
                                    <?php }

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
    <div class="modal fade" id="deletePayment" tabindex="-1" aria-labelledby="deletePayment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteFarmer">Delete Payment</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this payment?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/payment.php">
                    <input type="hidden" name="paymentid" id="paymentid">
                    <button type="submit" name="deletePayment" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>