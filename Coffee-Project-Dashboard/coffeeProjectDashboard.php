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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="coffeeProjectDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Factory Journal</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-book-outline"></i>
              </div>
              <a href="#" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #E6E6FA;">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Kilos Received Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #B2FFFF;">
              <div class="inner">
                <h3>44</h3>

                <p>Farmers Registered</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="farmers.php" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #7CB9E8;">
              <div class="inner">
                <h3>65</h3>

                <p>Socities Joined</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="societies.php" class="small-box-footer"><strong>More info</strong><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
    </section>

    <div class="container">
      <div class="row">
        
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Kilos Received</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
        
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Socity Daily Kilos</h3>

              <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Date</th>
                    <th>Progress</th>
                    <th style="width: 40px">Label</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>28-09-2022</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar" style="width: 55%; background-color: #7CB9E8;"></div>
                      </div>
                    </td>
                    <td><span class="badge" style="background-color: #B2FFFF;">55%</span></td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>29-09-2022</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar" style="width: 75%; background-color: #7CB9E8;"></div>
                      </div>
                    </td>
                    <td><span class="badge" style="background-color: #B2FFFF;">70%</span></td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>30-09-2022</td>
                    <td>
                      <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar" style="width: 30%; background-color: #7CB9E8;"></div>
                      </div>
                    </td>
                    <td><span class="badge" style="background-color: #B2FFFF;">30%</span></td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>31-09-2022</td>
                    <td>
                      <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar" style="width: 90%; background-color: #7CB9E8;"></div>
                      </div>
                    </td>
                    <td><span class="badge" style="background-color: #B2FFFF;">90%</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


      </div>
    </div>
          

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Notices</h5>
      <p>This is the first notice.</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Bringing change to the Coffee Industry.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="#">Coffee-Project</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<?php include('adminincludes/footer.php'); ?>
