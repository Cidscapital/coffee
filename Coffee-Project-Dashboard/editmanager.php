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
            <h1 class="m-0">Update Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Update Manager</li>
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
                        <h3 class="card-title"><strong>Update Manager</strong></h3>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $manager = getByID('factory_manager', $id);
                                if(mysqli_num_rows($manager) > 0){
                                    $data = mysqli_fetch_array($manager); ?>
                                    <form method="POST" action="functions/manager.php">
                                        <input type="hidden" name="managerid" value="<?php echo $data['id']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" value="<?php echo $data['first_name']; ?>" name="fname" placeholder="Enter first name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="lname" value="<?php echo $data['last_name']; ?>" placeholder="Enter last name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" placeholder="Enter member number" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Society</label>
                                            <select name="societyid" class="form-select">
                                                <option selected>Select Society</option>

                                                <?php 
                                                    $societies = getAll('society', 'name'); 
                                                    foreach ($societies as $society) { ?>
                                                        <option value="<?php echo $society['id'];  ?>" <?= $data['society_id'] == $society['id']?'selected':''; ?> ><?php echo $society['name'];  ?></option>
                                                <?php }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <button type="submit" name="editManager" class="btn btn-primary">Update Manager</button>
                                    </form>
                        <?php  }
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