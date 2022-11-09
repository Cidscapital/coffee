<?php 
include('../functions/authentication.php');
include('../includes/header.php');
?>

<!-- Section: Design Block -->
<section class="">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="my-5 display-3 fw-bold ls-tight">
              The best offer <br />
              <span class="text-primary">for your business</span>
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Eveniet, itaque accusantium odio, soluta, corrupti aliquam
              quibusdam tempora at cupiditate quis eum maiores libero
              veritatis? Dicta facilis sint aliquid ipsum atque?
            </p>
          </div>
  
          <div class="col-lg-6 mb-5 mb-lg-0 shadow">
            <div class="card">
              <div class="card-header text-center">
                <h4><strong>Registeration Form</strong></h4>
              </div>
              <div class="card-body py-3 px-md-3">
                <form  method="POST" action="../functions/authentication.php">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-outline">
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter your first name" required/>
                        <label class="form-label" for="fname"><strong>First name</strong></label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-outline">
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter your last name" required/>
                        <label class="form-label" for="lname"><strong>Last name</strong></label>
                      </div>
                    </div>
                  </div>

                  <!-- Username input -->
                  <div class="form-outline mb-3">
                    <input type="text" id="username" name="username" class="form-control 
                    <?php if(isset($_SESSION['usernameerror'])){
                      echo 'is-invalid'; 
                      };
                    ?>" placeholder="Enter your username" required/>
                    <label class="form-label" for="username"><strong>Username</strong></label>
                    <div class="invalid-feedback">
                      <?php if(isset($_SESSION['usernameerror'])){
                        echo $_SESSION['usernameerror'];
                        unset($_SESSION['usernameerror']);
                        };
                      ?>
                    </div>
                  </div>
  
                  <!-- Email input -->
                  <div class="form-outline mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required/>
                    <label class="form-label" for="email"><strong>Email address</strong></label>
                  </div>
  
                  <!-- Password input -->
                  <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control 
                    <?php if(isset($_SESSION['passworderror'])){
                      echo 'is-invalid'; 
                      };
                    ?>" placeholder="Enter your password" required/>
                    <label class="form-label" for="password"><strong>Password</strong></label>
                    <div class="invalid-feedback">
                      <?php if(isset($_SESSION['passworderror'])){
                        echo $_SESSION['passworderror'];
                        unset($_SESSION['passworderror']);
                        };
                      ?>
                    </div>
                    <ul class="list">
                      <li class="list-group-item">Password must be 8-20 characters long.</li>
                      <li class="list-group-item">Password should include at least one upper case letter.</li>
                      <li class="list-group-item">Password should include one number, and one special character.</li>
                    </ul>
                  </div>

                  <!-- Confirm Password -->
                  <div class="form-outline mb-3">
                    <input type="password" id="password" name="cpassword" class="form-control 
                    <?php if(isset($_SESSION['cpassworderror'])){
                      echo 'is-invalid'; 
                      };
                    ?>" placeholder="Confirm your password" required/>
                    <label class="form-label" for="password"><strong>Confirm Password</strong></label>
                    <div class="invalid-feedback">
                      <?php if(isset($_SESSION['cpassworderror'])){
                        echo $_SESSION['cpassworderror'];
                        unset($_SESSION['cpassworderror']);
                        };
                      ?>
                    </div>
                  </div>
                  <!-- Submit button -->
                  <button type="submit" name="registerBtn" class="btn btn-primary btn-block mb-3">
                    Sign up
                  </button> 
                </form>
                <!-- Register buttons -->
                <div class="text-center">
                    <p>Already have an account? <span><a href="../Login-Page/login1.php">Go to login</a></span></p>
                    <a href="https://www.linkedin.com/in/victor-mwai-03b34a215/?lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3Bir77MBspSXSguswplt0J0A%3D%3D" class="btn btn-link btn-floating mx-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->
<?php include('../includes/footer.php'); ?>