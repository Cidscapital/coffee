<?php 
include('../functions/authentication.php');
include('../includes/header.php');
?>

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">Coffee System Admin Login</h4>
                      </div>
                      <form method="POST" action="../functions/authentication.php">
      
                        <div class="form-outline mb-4">
                          <input type="text" name="username" class="form-control
                          <?php if(isset($_SESSION['usererror'])){
                            echo 'is-invalid'; 
                          }; ?>" placeholder="Enter your username" />
                          <label class="form-label"><strong>Username</strong></label>
                          <div class="invalid-feedback">
                            <?php if(isset($_SESSION['usererror'])){
                              echo $_SESSION['usererror'];
                              unset($_SESSION['usererror']);
                              };
                            ?>
                          </div>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" name="password" placeholder="Enter your password" class="form-control
                          <?php if(isset($_SESSION['passerror'])){
                            echo 'is-invalid'; 
                          }; ?>" />
                          <label class="form-label"><strong>Password</strong></label>
                          <div class="invalid-feedback">
                            <?php if(isset($_SESSION['passerror'])){
                              echo $_SESSION['passerror'];
                              unset($_SESSION['passerror']);
                              };
                            ?>
                          </div>
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" name="loginBtn" type="submit">Log in</button>
                          <a class="text-muted" href="../Sign-Up-Page/register.php">Register Here!</a>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Are You a Factory Manage?</p>
                          <a href="managerlogin.php" class="btn btn-outline-danger">Log in</a>
                        </div>    
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">We are more than just a company</h4>
                      <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php include('../includes/footer.php'); ?>