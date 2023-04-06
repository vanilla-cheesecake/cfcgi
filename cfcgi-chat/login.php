<?php 
 include_once 'lib/session.php';
 session::checkLogin();
?>
<?php  require_once 'include/header.php'; ?>
 <section class="container">
  <div class="row">
   <div class="col-xl-4 col-sm-12 col-md-6 offset-md-4">
    <h3 class="display-6 text-center py-4"></h3>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $serial_id = $_POST['serial_id'];
            $password = $_POST['password'];
            $db->login($serial_id, $password);
     }
    ?>
     <form class=" border shadow p-3 rounded"  method="post" style="width: 450px;">
          <img src="image/eaglelogo.png" class="img-thumbnail bg-dark" alt="...">
          <h2 class="text-center p-3">CFCGI <span style="color:#4ccee8;">LOGIN</span>
          </h2> <?php if (isset($_GET['error'])){ ?> <div class="alert alert-danger" role="alert"> <?=$_GET['error']?> </div> <?php }?> <div class="input-group mb-3">
            <span class="input-group-text">ID Number</span>
            <input type="text" name="serial_id" class="form-control" id="serial_id">
          </div>
          <br>
          <div class="input-group mb-3">
            <span class="input-group-text">Password</span>
            <input type="password" name="password" class="form-control" id="password">
          </div>
          <!-- An element to toggle between password visibility --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" onclick="myFunction()">Show Password <div class="input-group mb-3">
            <span class="input-group-text">Select:</span>
            <select class="form-select " name="role" aria-label="Default select example">
              <option selected value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <button class="btn btn-sm btn-info text-light">Login </button>
          <a href="signup.php" class="btn btn-sm btn-primary">Sign Up</a>
          <br>
          <a href="forgot_password.php">Forgot Password</a>
     </form>
    </div>
   </div>
  </div>

  <script>
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
 </section>
<?php  require_once 'include/footer.php'; ?>


