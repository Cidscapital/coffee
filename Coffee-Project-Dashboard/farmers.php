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
            <h1 class="m-0">Farmers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Farmers</li>
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
                                Farmers
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="addfarmer.php" class="btn btn-secondary"><i class="ion ion-plus"> </i> Add</a>   
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Member Number</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Bank Number</th>
                                    <th scope="col">Society ID</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                $farmers = getAll('farmer', 'first_name');
                                if(mysqli_num_rows($farmers) > 0){
                                    foreach ($farmers as $farmer) { ?>
                                        <tr>
                                            <td><?php echo $farmer['first_name'] ?></td>
                                            <td><?php echo $farmer['last_name'] ?></td>
                                            <td><?php echo $farmer['member_number'] ?></td>
                                            <td><?php echo $farmer['phone_number'] ?></td>
                                            <td><?php echo $farmer['location'] ?></td>
                                            <td><?php echo $farmer['bank_number'] ?></td>
                                            <td><?php echo $farmer['society_id'] ?></td>
                                            <td><a href="editfarmer.php?id=<?php echo $farmer['id'] ?>" class="btn btn-primary">Edit</a> | 
                                            <button type="button" class="btn btn-danger farmerdeletebtn">Delete</button></td>
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

    <!-- Delete Farmer Modal -->
    <div class="modal fade" id="deleteFarmer" tabindex="-1" aria-labelledby="deleteFarmer" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteFarmer">Delete Farmer</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this farmer?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/farmer.php">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <button type="submit" name="deleteFarmer" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>