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
            <h1 class="m-0">Edit Debt Transaction</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Debt Transaction</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Data Table -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Edit Debt Transaction</strong></h3>
                    </div>
                    <div class="card-body">
                        <?php

                        if(isset($_GET['id'])){
                            $transactionid = $_GET['id'];
                            $transaction = getByID('loan_transaction', $transactionid);
                            if(mysqli_num_rows($transaction) > 0){
                                $data = mysqli_fetch_array($transaction); ?>
                                <form method="POST" action="functions/loantransaction.php">
                                    <input type="hidden" name="transactionid" value="<?php echo $data['id'] ?>" >
                                    <div class="mb-3">
                                        <label class="form-label">Farmer ID</label>
                                        <select name="farmerid" class="form-select">
                                            <option selected>Select Farmer</option>
                                            <?php
                                                $farmers = getAll('farmer', 'first_name');
                                                foreach ($farmers as $farmer) { ?>
                                                    <option value="<?php echo $farmer['id']; ?>" <?= $data['farmer_id'] == $farmer['id']?'selected':'' ; ?> ><?php echo $farmer['first_name'].' '.$farmer['last_name']; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Loan ID</label>
                                        <select name="loanid" class="form-select">
                                            <option selected>Select Type of Loan</option>
                                            <?php
                                                $loans = getAll('loan', 'name');
                                                foreach ($loans as $loan) { ?>
                                                    <option value="<?php echo $loan['id']; ?>" <?= $data['loan_id'] == $loan['id']?'selected':'' ; ?> ><?php echo $loan['name']; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Amount</label>
                                        <input type="text" class="form-control" value="<?php echo $data['amount'] ?>" name="amount" placeholder="Enter amount given" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Loan Status</label>
                                        <select name="loanstatus" class="form-select">
                                            <option selected>Select Status</option>
                                            <option value="Paid" <?= $data['loan_status'] == "Paid"?'selected':'' ; ?> >Paid</option>
                                            <option value="Pending" <?= $data['loan_status'] == "Pending"?'selected':'' ; ?> >Pending</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="editLoanTransaction" class="btn btn-primary">Update Loan Transaction</button>
                                </form>
                        <?php }
                        }

                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Data Table -->

</div>

<?php include('adminincludes/footer.php'); ?>