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
            <h1 class="m-0">Farmer Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Farmer Details</li>
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
                                <?php
                                    if(isset($_GET['id'])){
                                        $farmerid = $_GET['id'];
                                        $farmer = getByID('farmer', $farmerid);
                                        if(mysqli_num_rows($farmer) > 0){
                                            $farmerdata = mysqli_fetch_array($farmer);
                                            echo $farmerdata['first_name'].' '.$farmerdata['last_name'].' Details';
                                        }
                                    }

                                ?>
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="farmerdetailspdf.php?id=<?php echo $farmerid; ?>" class="btn btn-secondary" target="_blank"><i class="ion ion-plus"> </i> Generate PDF</a>   
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2">Date</th>
                                    <th scope="col" colspan="3" class="text-center">KILOS DELIVERED</th>
                                    
                                    <th scope="col" rowspan="2">Members Number</th>
                                    <th scope="col" rowspan="2">Receipt Number</th>
                                </tr>
                                <tr>

                                    <th scope="col">Cherry Grade I</th>
                                    <th scope="col">Cherry Grade II</th>
                                    <th scope="col">Mbuni</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_GET['id'])){
                                        $farmer_id = $_GET['id'];
                                        $deliveries_query = "SELECT * FROM deliveries WHERE farmer_id=$farmer_id ";
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
                                            } ?>

                                            <tr>
                                                <td><?php echo $delivery['date']; ?></td>
                                                <td><?php echo $cherryI ?></td>
                                                <td><?php echo $cherryII ?></td>
                                                <td><?php echo $mbuni ?></td>
                                                <td><?php echo $farmerdata['member_number'] ?></td>
                                                <td></td>
                                            </tr>



                                <?php   }
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

    

</div>

<?php include('adminincludes/footer.php'); ?>