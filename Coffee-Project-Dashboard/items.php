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
            <h1 class="m-0">Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Items</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Data Table -->
    <div class="container">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <h5 class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Items
                            </div>
                            <div class="col-md-6 d-grid d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addItem">
                                <i class="ion ion-plus"> </i> Add
                                </button>
                                
                            </div>
                        </div>
                    </h5>
                    <div class="card-body">
                        <table id="tableID" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#_ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Unit of Measurement</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $items = getAll('item', 'name'); 
                                    if(mysqli_num_rows($items) > 0){
                                        foreach ($items as $item) { ?>
                                            <tr>
                                                <td><?php echo $item['id'] ?></td>
                                                <td><?php echo $item['name'] ?></td>
                                                <td><?php echo $item['unit'] ?></td>
                                                <td><?php echo $item['unit_of_measurement'] ?></td>
                                                <td><?php echo $item['date'] ?></td>
                                                <td><button type="button" class="btn btn-primary itemeditbtn">
                                                        <i class="ion ion-android-create"> </i> Update
                                                            </button> | <button type="button" class="btn btn-danger itemdeletebtn">
                                                            <i class="ion ion-android-delete"> </i> Delete</button></td>
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

    <!-- Add Item Modal -->
    <div class="modal fade" id="addItem" tabindex="-1" aria-labelledby="addItem" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addItem">Add Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/item.php">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <select name="name" class="form-select" aria-label="Default select example">
                            <option selected>Select Name of Item</option>
                            <option value="Cherry Grade I">Cherry Grade I</option>
                            <option value="Cherry Grade II">Cherry Grade II</option>
                            <option value="Mbuni">Mbuni</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" class="form-control" name="unit" placeholder="Enter unit" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit of Measurement</label>
                        <select name="uMeasurement" class="form-select" aria-label="Default select example">
                            <option selected>Select Unit of Measurement</option>
                            <option value="Kgs">Kgs</option>
                            <option value="Grams">Grams</option>
                        </select>
                    </div>
                    <button type="submit" name="addItem" class="btn btn-primary">Add Item</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>


    <!-- Edit Item Modal -->
    <div class="modal fade" id="editItem" tabindex="-1" aria-labelledby="editItem" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editItem">Update Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="functions/item.php">
                    <input type="hidden" name="itemid" id="itemid">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <select name="name" id="name" class="form-select" aria-label="Default select example">
                            <option selected>Select Name of Item</option>
                            <option value="Cherry Grade I">Cherry Grade I</option>
                            <option value="Cherry Grade II">Cherry Grade II</option>
                            <option value="Mbuni">Mbuni</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" class="form-control" name="unit" id="unit" placeholder="Enter unit" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit of Measurement</label>
                        <select name="uMeasurement" id="uMeasurement" class="form-select" aria-label="Default select example">
                            <option selected>Select Unit of Measurement</option>
                            <option value="Kgs">Kgs</option>
                            <option value="Grams">Grams</option>
                        </select>
                    </div>
                    <button type="submit" name="editItem" class="btn btn-primary">Update Item</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>
    </div>

    <!-- Delete Item Modal -->
    <div class="modal fade" id="deleteItem" tabindex="-1" aria-labelledby="deleteItem" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteItem">Delete Item</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger"><strong>Are you sure you want to delete this item?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="functions/item.php">
                    <input type="hidden" name="itemdeleteid" id="itemdeleteid">
                    <button type="submit" name="deleteItem" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>

<?php include('adminincludes/footer.php'); ?>