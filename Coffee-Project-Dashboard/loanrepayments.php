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
            <h1 class="m-0">Loan Repyments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Loan Repayments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Data Table -->
    <div class="container">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <h5 class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Loan Repayments
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addLoanRepayment">
                                <i class="ion ion-plus"> </i> Add
                                </button>
                                
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#_ID</th>
                                    <th scope="col">Loan Transaction ID</th>
                                    <th scope="col">Amount Paid</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $repayments = getAll('loan_repayment', 'id');
                                    foreach ($repayments as $repayment) { ?>
                                        <tr>
                                            <td><?php echo $repayment['id']; ?></td>
                                            <td><?php echo $repayment['loan_transaction_id']; ?></td>
                                            <td><?php echo $repayment['amount_paid']; ?></td>
                                            <td><?php echo $repayment['date']; ?></td>
                                            <td><button type="button" class="btn btn-primary repaymenteditbtn">
                                                                        <i class="ion ion-android-create"> </i> Update
                                                                            </button> | <button type="button" class="btn btn-danger loanrepaymentdeletebtn">
                                                                            <i class="ion ion-android-delete"> </i> Delete</button></td>
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

    <!-- Add Loan Repayment Modal -->
    <div class="modal fade" id="addLoanRepayment" tabindex="-1" aria-labelledby="addLoanRepayment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addLoanRepayment">Add Loan Repayment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/loanrepayment.php">
                    <div class="mb-3">
                        <label class="form-label">Loan Transaction ID</label>
                        <select class="form-select" name="ltransaction">
                            <option selected>Select Transaction</option>
                            <?php 
                                $transactions = getAll('loan_transaction', 'id');
                                foreach ($transactions as $transaction) { ?>
                                    <option value="<?php echo $transaction['id'] ?>"><?php echo $transaction['id'] ?></option>
                            <?php } 
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount Paid</label>
                        <input type="text" name="apaid" class="form-control" placeholder="Enter amount paid" required>
                    </div>
                    <button type="submit" name="addLoanRepayment" class="btn btn-primary">Add Loan Repayment</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>


    <!-- Edit Loan Repayment Modal -->
    <div class="modal fade" id="editLoanRepayment" tabindex="-1" aria-labelledby="editLoanRepayment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editLoanRepayment">Update Loan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/loanrepayment.php">
                    <input type="hidden" name="repaymentid" id="repaymentid">
                    <div class="mb-3">
                        <label class="form-label">Loan Transaction ID</label>
                        <select class="form-select" name="ltransaction" id="ltransaction">
                            <option selected>Select Transaction</option>
                            <?php 
                                $transactions = getAll('loan_transaction', 'id');
                                foreach ($transactions as $transaction) { ?>
                                    <option value="<?php echo $transaction['id'] ?>"><?php echo $transaction['id'] ?></option>
                            <?php } 
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount Paid</label>
                        <input type="text" name="apaid" id="apaid" class="form-control" placeholder="Enter amount paid" required>
                    </div>
                    <button type="submit" name="editLoanRepayment" class="btn btn-primary">Update Loan Repayment</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>

    <!-- Delete Loan Repayment Modal -->
    <div class="modal fade" id="deleteLoanRepayment" tabindex="-1" aria-labelledby="deleteLoanRepayment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteLoanRepayment">Delete Loan Repayment</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this loan repayment?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/loanrepayment.php">
                    <input type="hidden" name="loanrepaymentdeleteid" id="loanrepaymentdeleteid">
                    <button type="submit" name="deleteLoanRepayment" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>