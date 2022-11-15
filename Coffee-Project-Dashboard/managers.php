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
            <h1 class="m-0">Factory Managers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Factory Managers</li>
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
                                Factory Managers
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="addmanager.php" class="btn btn-secondary"><i class="ion ion-plus"> </i> Add</a>   
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#_ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Society ID</th>
                                    <th scope="col">Date Joined</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $managers = getAll('factory_manager', 'first_name');
                                    foreach ($managers as $manager) { ?>
                                        <tr>
                                            <td><?php echo $manager['id'] ?></td>
                                            <td><?php echo $manager['first_name'] ?></td>
                                            <td><?php echo $manager['last_name'] ?></td>
                                            <td><?php echo $manager['username'] ?></td>
                                            <td><?php echo $manager['society_id'] ?></td>
                                            <td><?php echo $manager['date_joined'] ?></td>
                                            <td><a href="editmanager.php?id=<?php echo $manager['id'] ?>" class="btn btn-primary"><i class="ion ion-android-create"> </i> Update</a> | 
                                                    <button type="button" class="btn btn-danger managerdeletebtn"><i class="ion ion-android-delete"> </i> Delete</button></td>
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

    <!-- Delete Manager Modal -->
    <div class="modal fade" id="deleteManager" tabindex="-1" aria-labelledby="deleteManager" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteManager">Delete Factory Manager</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this factory Manager?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/manager.php">
                    <input type="hidden" name="managerid" id="managerid">
                    <button type="submit" name="deleteManager" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>