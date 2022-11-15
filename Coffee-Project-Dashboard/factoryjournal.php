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
                                <?php
                                    if(isset($_GET['id'])){
                                        $societyid = $_GET['id'];
                                        $factory = getByID('society', $societyid);
                                        if(mysqli_num_rows($factory) > 0){
                                            $factorydata = mysqli_fetch_array($factory);
                                            echo $factorydata['name'];
                                        }
                                    }

                                ?>
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <a href="factoryjournalpdf.php?id=<?php echo $societyid; ?>" class="btn btn-secondary" target="_blank"><i class="ion ion-plus"> </i> Generate PDF</a>   
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
                                    <th scope="col">Members Name</th>
                                    <th scope="col">Members Number</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM deliveries WHERE factory_id = $id ";
                                    $deliveries = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($deliveries)>0){
                                        foreach ($deliveries as $delivery) { ?>
                                            <tr>
                                                <td>
                                                    <?php 
                                                        if($delivery['item_id']==12){
                                                            echo $delivery['qty_delivered'];
                                                        }else{
                                                            echo '--';
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if($delivery['item_id']==14){
                                                            echo $delivery['qty_delivered'];
                                                        }else{
                                                            echo '--';
                                                        } 
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if($delivery['item_id']==13){
                                                            echo $delivery['qty_delivered'];
                                                        }else{
                                                            echo '--';
                                                        } 
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $id = $delivery['farmer_id'];
                                                    $farmer_query = "SELECT * FROM farmer WHERE id= $id ";
                                                    $farmer = mysqli_query($conn, $farmer_query);
                                                    if(mysqli_num_rows($farmer) > 0){
                                                        $data = mysqli_fetch_array($farmer);
                                                        echo $data['first_name'].' '.$data['last_name'];
                                                    } 
                                                    ?>
                                                </td>
                                                <td><?php echo $data['member_number'] ?></td>
                                                <td><?php echo $delivery['date'] ?></td>
                                            </tr>
                                    <?php }
                                    }
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