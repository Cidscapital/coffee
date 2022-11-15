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
            <h1 class="m-0">Current Rate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Current Rate</li>
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
                                Current Rate
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addRate">
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
                                    <th scope="col">Rate</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $rates = getAll('current_rate', 'id');
                                    foreach ($rates as $rate) { ?>
                                        <tr>
                                            <td><?php echo $rate['id']; ?></td>
                                            <td><?php echo $rate['rate']; ?></td>
                                            <td><?php echo $rate['status']; ?></td>
                                            <td><?php echo $rate['date']; ?></td>
                                            <td><button type="button" class="btn btn-primary rateeditbtn">
                                                                        <i class="ion ion-android-create"> </i> Update
                                                                            </button> | <button type="button" class="btn btn-danger ratedeletebtn">
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

    <!-- Add Rate Modal -->
    <div class="modal fade" id="addRate" tabindex="-1" aria-labelledby="addRate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addRate">Add Rate</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/rate.php">
                    <div class="mb-3">
                        <label class="form-label">Rate</label>
                        <input type="text" name="rate" class="form-control" placeholder="Enter your rate" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option selected value="Current">Current</option>
                        </select>
                    </div>
                    <button type="submit" name="addRate" class="btn btn-primary">Add Rate</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>


    <!-- Edit Rate Modal -->
    <div class="modal fade" id="editRate" tabindex="-1" aria-labelledby="editRate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editRate">Update Current Rate</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/rate.php">
                    <input type="hidden" name="rateid" id="rateid">
                    <div class="mb-3">
                        <label class="form-label">Rate</label>
                        <input type="text" name="rate" id="rate" class="form-control" placeholder="Enter your rate" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option selected value="Current">Current</option>
                        </select>
                    </div>
                    <button type="submit" name="editRate" class="btn btn-primary">Update Rate</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>

    <!-- Delete Rate Modal -->
    <div class="modal fade" id="deleteRate" tabindex="-1" aria-labelledby="deleteRate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteRate">Delete Loan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this current rate?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/rate.php">
                    <input type="hidden" name="rateid" id="ratedeleteid">
                    <button type="submit" name="deleteRate" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>