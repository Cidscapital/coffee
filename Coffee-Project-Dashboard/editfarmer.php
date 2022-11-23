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
            <h1 class="m-0">Update Farmer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Update Farmer</li>
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
                        <h3 class="card-title"><strong>Edit Farmer Details</strong></h3>
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['id'])){
                                $id = $_GET['id']; 
                                $farmer = getByID('farmer', $id);
                                if(mysqli_num_rows($farmer) > 0){ 
                                    $data = mysqli_fetch_array($farmer);
                                    ?>
                                    <form method="POST" action="functions/farmer.php">
                                        <input type="hidden" name="farmerid" value="<?php echo $data['id']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="fname" value="<?php echo $data['first_name']; ?>" placeholder="Enter first name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="lname" value="<?php echo $data['last_name']; ?>" placeholder="Enter last name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Member Number</label>
                                            <input type="text" class="form-control" name="mnumber" value="<?php echo $data['member_number']; ?>" placeholder="Enter member number" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Society</label>
                                            <select name="societyid" class="form-select">
                                                <option selected>Select Society</option>

                                                <?php 
                                                    $societies = getAll('society', 'name'); 
                                                    foreach ($societies as $society) { ?>
                                                        <option value="<?php echo $society['id'];  ?>" <?php if($data['society_id'] == $society['id']){ echo 'selected'; }else{ echo '';} ?> ><?php echo $society['name'];  ?></option>
                                                <?php }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bank</label>
                                            <select name="bankid" class="form-select">
                                                <option selected>Select Bank</option>

                                                <?php 
                                                    $banks = getAll('banks', 'name'); 
                                                    foreach ($banks as $bank) { ?>
                                                        <option value="<?php echo $bank['id'];  ?>" <?php if($data['bank_id'] == $bank['id']){ echo 'selected'; }else{ echo '';} ?> ><?php echo $bank['name'];  ?></option>
                                                <?php }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bank Number</label>
                                            <input type="text" class="form-control" name="bnumber" value="<?php echo $data['bank_number']; ?>" placeholder="Enter bank number" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Open Amount</label>
                                            <input type="text" class="form-control" name="oamount" value="<?php echo $data['open_amount']; ?>" placeholder="Enter open amount" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" name="pnumber" value="<?php echo $data['phone_number']; ?>" placeholder="Enter phone number" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Location</label>
                                            <input type="text" class="form-control" name="location" value="<?php echo $data['location']; ?>" placeholder="Enter location" required>
                                        </div>
                                        <button type="submit" name="editFarmer" class="btn btn-primary">Update Farmer</button>
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