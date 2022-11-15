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
            <h1 class="m-0">Loan Transactions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Loan Transactions</li>
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
                                Loan Transactions
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="addloantransaction.php" class="btn btn-secondary"><i class="ion ion-plus"> </i> Add</a>   
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#_ID</th>
                                    <th scope="col">Farmer ID</th>
                                    <th scope="col">Loan ID</th>
                                    <th scope="col">Expected Pay Date</th>
                                    <th scope="col">Loan Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $loantransactions = getAll('loan_transaction', 'farmer_id');
                                    foreach ($loantransactions as $transaction) { ?>
                                        <tr>
                                            <td><?php echo $transaction['id'] ?></td>
                                            <td><?php echo $transaction['farmer_id'] ?></td>
                                            <td><?php echo $transaction['loan_id'] ?></td>
                                            <td><?php echo $transaction['expected_payment_date'] ?></td>
                                            <td><?php echo $transaction['loan_status'] ?></td>
                                            <td><?php echo $transaction['date'] ?></td>
                                            <td><a href="editloantransaction.php?id=<?php echo $transaction['id'] ?>" class="btn btn-primary"><i class="ion ion-android-create"> </i> Edit</a> | 
                                                    <button type="button" class="btn btn-danger transactiondeletebtn"><i class="ion ion-android-delete"> </i> Delete</button></td>
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

    <!-- Delete Farmer Modal -->
    <div class="modal fade" id="deleteTransaction" tabindex="-1" aria-labelledby="deleteTransaction" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteTransaction">Delete Loan Transaction</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this loan transaction?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/loantransaction.php">
                    <input type="hidden" name="transactionid" id="transactionid">
                    <button type="submit" name="deleteTransaction" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>