<?php 
session_start();
include('adminincludes/managerheader.php'); 
include('functions/sqlfunctions.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-light">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Delivery</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Delivery</li>
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
                        <h3 class="card-title"><strong>Update Delivery</strong></h3>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET['id'])){
                                $id = $_GET['id']; 
                                $delivery = getByID('deliveries', $id);
                                if(mysqli_num_rows($delivery) > 0){ 
                                    $data = mysqli_fetch_array($delivery); ?>
                                    <form method="POST" action="functions/delivery.php">
                                    <input type="hidden" name="deliveryid" value="<?php echo $data['id']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Factory</label>
                                            <select name="factory" class="form-select" aria-label="Default select example">
                                                <option selected>Select Factory</option>
                                                <?php  
                                                    $factories = getAll('society', 'name');
                                                    foreach ($factories as $factory) { ?>
                                                        <option value="<?php echo $factory['id']; ?>" <?php if($data['factory_id'] == $factory['id']){ echo 'selected'; }else{ echo '';} ?> ><?php echo $factory['name']; ?></option>
                                                <?php }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Farmer</label>
                                            <select name="farmer" class="form-select" aria-label="Default select example">
                                                <option selected>Select Farmer</option>
                                                <?php  
                                                    $farmers = getAll('farmer', 'first_name');
                                                    foreach ($farmers as $farmer) { ?>
                                                        <option value="<?php echo $farmer['id']; ?>" <?php if($data['farmer_id'] == $farmer['id']){ echo 'selected'; }else{ echo '';} ?> ><?php echo $farmer['first_name'].' '. $farmer['last_name']; ?></option>
                                                <?php }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Item</label>
                                            <select name="item" class="form-select" aria-label="Default select example">
                                                <option selected>Select Item</option>
                                                <?php  
                                                    $items = getAll('item', 'name');
                                                    foreach ($items as $item) { ?>
                                                        <option value="<?php echo $item['id']; ?>" <?php if($data['item_id'] == $item['id']){ echo 'selected'; }else{ echo '';} ?> ><?php echo $item['name']; ?></option>
                                                <?php }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Qty Delivered</label>
                                            <input type="text" class="form-control" value="<?php echo $data['qty_delivered']; ?>" name="delivered" placeholder="Enter bank number" required>
                                        </div>
                                        <button type="submit" name="editDelivery" class="btn btn-primary">Update Delivery</button>
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