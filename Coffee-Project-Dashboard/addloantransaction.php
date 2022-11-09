<?php 
session_start();
include('adminincludes/header.php'); 
include('functions/sqlfunctions.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-light">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Loan Transaction</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Loan Transaction</li>
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
                        <h3 class="card-title"><strong>Add New Loan Transaction</strong></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="functions/loantransaction.php">
                            <div class="mb-3">
                                <label class="form-label">Farmer ID</label>
                                <select name="farmerid" class="form-select">
                                    <option selected>Select Farmer</option>
                                    <?php
                                        $farmers = getAll('farmer', 'first_name');
                                        foreach ($farmers as $farmer) { ?>
                                            <option value="<?php echo $farmer['id']; ?>"><?php echo $farmer['first_name'].' '.$farmer['last_name']; ?></option>
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
                                            <option value="<?php echo $loan['id']; ?>"><?php echo $loan['name']; ?></option>
                                     <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Expexted Pay Date</label>
                                <input type="text" class="form-control" name="EPDate" placeholder="Format yyyy-mm-dd... eg 2022-11-04" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Loan Status</label>
                                <select name="loanstatus" class="form-select">
                                    <option selected>Select Status</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <button type="submit" name="addLoanTransaction" class="btn btn-primary">Add Loan Transaction</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Data Table -->

</div>

<?php include('adminincludes/footer.php'); ?>