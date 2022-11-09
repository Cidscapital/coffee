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
            <h1 class="m-0">Add Farmer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Farmer</li>
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
                        <h3 class="card-title"><strong>Add New Farmer</strong></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="functions/farmer.php">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="Enter first name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lname" placeholder="Enter last name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Member Number</label>
                                <input type="text" class="form-control" name="mnumber" placeholder="Enter member number" required>
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
                            <div class="mb-3">
                                <label class="form-label">Bank Number</label>
                                <input type="text" class="form-control" name="bnumber" placeholder="Enter bank number" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Open Amount</label>
                                <input type="text" class="form-control" name="oamount" placeholder="Enter open amount" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="pnumber" placeholder="Enter phone number" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" placeholder="Enter location" required>
                            </div>
                            <button type="submit" name="addFarmer" class="btn btn-primary">Add Farmer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Data Table -->

</div>

<?php include('adminincludes/footer.php'); ?>