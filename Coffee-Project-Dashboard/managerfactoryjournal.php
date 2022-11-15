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
            <h1 class="m-0">Factory Journal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Factory Journal</li>
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
                                Fcatory Journal
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="managerfactoryjournalpdf.php" class="btn btn-secondary" target="_blank"><i class="ion ion-plus"> </i> Generate PDF</a>   
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Cherry Grade I</th>
                                    <th scope="col">Cherry Grade II</th>
                                    <th scope="col">Mbuni</th>
                                    <th scope="col">Member Number</th>
                                    <th scope="col">Member Name</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 

                                        if(isset($_SESSION['auth_user'])){
                                            $societyid = $_SESSION['auth_user']['societyid'];
                                            $deliveries_query = "SELECT * FROM deliveries WHERE factory_id=$societyid";
                                            $deliveries = mysqli_query($conn, $deliveries_query);

                                            foreach ($deliveries as $delivery) { 

                                                if($delivery['item_id']==12){
                                                    $cherryI = $delivery['qty_delivered'];
                                                }else{
                                                    $cherryI = '--';
                                                }
                            
                                                if($delivery['item_id']==13){
                                                    $mbuni = $delivery['qty_delivered'];
                                                }else{
                                                    $mbuni = '--';
                                                }
                            
                                                if($delivery['item_id']==14){
                                                    $cherryII = $delivery['qty_delivered'];
                                                }else{
                                                    $cherryII = '--';
                                                }


                                                $id = $delivery['farmer_id'];
                                                $farmer_query = "SELECT * FROM farmer WHERE id= $id ";
                                                $farmer = mysqli_query($conn, $farmer_query);
                                                if(mysqli_num_rows($farmer) > 0){
                                                    $data = mysqli_fetch_array($farmer);
                                                } 
                                                ?>
                                                <tr>
                                                    <td><?php echo $cherryI ?></td>
                                                    <td><?php echo $cherryII ?></td>
                                                    <td><?php echo $mbuni ?></td>
                                                    <td><?php echo $data['member_number'] ?></td>
                                                    <td><?php echo $data['first_name'].' '.$data['last_name'] ?></td>
                                                    <td><?php echo $delivery['date'] ?></td>
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

    <!-- Delete Delivery Modal -->
    <div class="modal fade" id="deleteDelivery" tabindex="-1" aria-labelledby="deleteDelivery" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteFarmer">Delete Delivery</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this delivery?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/delivery.php">
                    <input type="hidden" name="deliveryid" id="deliveryid">
                    <button type="submit" name="deleteDelivery" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>