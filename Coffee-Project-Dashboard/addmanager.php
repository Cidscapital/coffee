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
            <h1 class="m-0">Add Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Manager</li>
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
                        <h3 class="card-title"><strong>Add New Manager</strong></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="functions/manager.php">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter first name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lname" placeholder="Enter last name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter member username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter member password" required>
                                <div class="form-text">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword" placeholder="Confirm member password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Society</label>
                                <select name="societyid" class="form-select">
                                    <option selected>Select Society</option>

                                    <?php 
                                        $societies = getAll('society', 'name'); 
                                        foreach ($societies as $society) { ?>
                                            <option value="<?php echo $society['id'];  ?>"><?php echo $society['name'];  ?></option>
                                    <?php }
                                    ?>
                                    
                                </select>
                            </div>
                            <button type="submit" name="addManager" class="btn btn-primary">Add Manager</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Data Table -->

</div>

<?php include('adminincludes/footer.php'); ?>