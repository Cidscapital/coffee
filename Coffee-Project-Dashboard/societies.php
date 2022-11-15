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
            <h1 class="m-0">Factories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Factories</li>
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
                                Factories
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addSociety">
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
                                    <th scope="col">Number</th>
                                    <th scope="col">Date Joined</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $societies = getAll("society", "name");

                                if(mysqli_num_rows($societies) > 0){
                                    foreach($societies as $society){ ?>
                                        <tr>
                                            <td><?php echo $society['id'] ?></td>
                                            <td><?php echo $society['name'] ?></td>
                                            <td><?php echo $society['number'] ?></td>
                                            <td><?php echo $society['date_joined'] ?></td>
                                            <td><button type="button" class="btn btn-primary editbtn">
                                            <i class="ion ion-android-create"> </i> Update
                                                </button> | <button type="button" class="btn btn-danger deletebtn">
                                                <i class="ion ion-android-delete"> </i> Delete</button></td>
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

    <!-- Add Society Modal -->
    <div class="modal fade" id="addSociety" tabindex="-1" aria-labelledby="addSociety" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addSociety">Add Factory</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/society.php">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter the name of the factory" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number</label>
                        <input type="text" class="form-control" name="number" placeholder="Enter the number of the factory" required>
                    </div>
                    <button type="submit" name="addSociety" class="btn btn-primary">Add Factory</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>


    <!-- Edit Society Modal -->
    <div class="modal fade" id="editSociety" tabindex="-1" aria-labelledby="editSociety" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editSociety">Update Factory</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/society.php">
                    <input type="hidden" name="update_id" id="update_id">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="" name="name" id="name" placeholder="Enter the name of the factory" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number</label>
                        <input type="text" class="form-control" name="number" id="number" placeholder="Enter the number of the factory" required>
                    </div>
                    <button type="submit" name="editSociety" class="btn btn-primary">Update Factory</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>

    <!-- Delete Society Modal -->
    <div class="modal fade" id="deleteSociety" tabindex="-1" aria-labelledby="deleteSociety" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteSociety">Delete Factory</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this factory?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/society.php">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <button type="submit" name="deleteSociety" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>