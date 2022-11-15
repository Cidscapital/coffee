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
            <h1 class="m-0">Types of Loans</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Loans</li>
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
                                Types of Loans
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addLoan">
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  

                                    $loans = getAll('loan', 'name');
                                    foreach ($loans as $loan) { ?>
                                        <tr>
                                            <td><?php echo $loan['id']; ?></td>
                                            <td><?php echo $loan['name']; ?></td>
                                            <td><?php echo $loan['date']; ?></td>
                                            <td><button type="button" class="btn btn-primary loaneditbtn">
                                                                <i class="ion ion-android-create"> </i> Update
                                                                    </button> | <button type="button" class="btn btn-danger loandeletebtn">
                                                                    <i class="ion ion-android-delete"> </i> Delete</button></td>
                                        </tr>
                                <?php    }

                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Data Table -->

    <!-- Add Loan Modal -->
    <div class="modal fade" id="addLoan" tabindex="-1" aria-labelledby="addLoan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addLoan">Add Loan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/loan.php">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name of loan" required>
                    </div>
                    
                    <button type="submit" name="addLoan" class="btn btn-primary">Add Loan</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>


    <!-- Edit Loan Modal -->
    <div class="modal fade" id="editLoan" tabindex="-1" aria-labelledby="editLoan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editLoan">Update Loan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/loan.php">
                        <input type="hidden" name="loanid" id="loanid">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name of loan" required>
                        </div>
                        
                        <button type="submit" name="editLoan" class="btn btn-primary">Update Loan</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>

    <!-- Delete Loan Modal -->
    <div class="modal fade" id="deleteLoan" tabindex="-1" aria-labelledby="deleteLoan" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteLoan">Delete Loan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this loan?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/loan.php">
                    <input type="hidden" name="loandeleteid" id="loandeleteid">
                    <button type="submit" name="deleteLoan" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>