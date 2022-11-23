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
            <h1 class="m-0">Add Payment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Payment</li>
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
                        <h3 class="card-title"><strong>Add New Payment</strong></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="functions/payment.php">
                            <div class="mb-3">
                                <label class="form-label">Item</label>
                                <select name="item" class="form-select">
                                    <option selected>Select Item</option>
                                    <?php  
                                        $items = getAll('item', 'name');
                                        foreach ($items as $item) { ?>
                                            <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                     <?php }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Farmer</label>
                                <select name="farmer" class="form-select">
                                    <option selected>Select Farmer</option>
                                    <?php  
                                        $farmers = getAll('farmer', 'first_name');
                                        foreach ($farmers as $farmer) { ?>
                                            <option value="<?php echo $farmer['id']; ?>"><?php echo $farmer['first_name'].' '. $farmer['last_name']; ?></option>
                                     <?php }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Debt</label>
                                <select name="dtransaction" class="form-select">
                                    <option value='0' selected>No Debt</option>
                                    <?php  
                                        $query = "SELECT * FROM farmer f JOIN loan_transaction l ON f.id=l.farmer_id";
                                        $transactions = mysqli_query($conn, $query);
                                        foreach ($transactions as $transaction) { ?>
                                            <option value="<?php echo $transaction['amount']; ?>"><?php echo $transaction['first_name'].' '.$transaction['last_name'].' '.$transaction['amount']; ?></option>
                                     <?php }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Market Rate</label>
                                <select name="rate" class="form-select">
                                    <option selected>Select Debt Transaction</option>
                                    <?php  
                                        $rates = getAll('current_rate', 'id');
                                        foreach ($rates as $rate) { ?>
                                            <option value="<?php echo $rate['market_rate']; ?>"><?php echo $rate['market_rate']; ?></option>
                                     <?php }

                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="addPayment" class="btn btn-primary">Add Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Data Table -->

</div>

<?php include('adminincludes/footer.php'); ?>