<?php  require_once 'include/header.php'; ?>
 <section class="container">
  <div class="row">
   <div class="col-xl-4 col-sm-12 col-md-6 offset-md-4">
    <h3 class="display-6 text-center py-4"></h3>
    <?php 
      if($_SERVER['REQUEST_METHOD'] == "POST"){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $serial_id = $_POST['serial_id'];
        $mail  = $_POST['email'];
        $pass  = $_POST['pass'];
      
      
      $permited  = array('jpg', 'jpeg', 'png', 'gif');
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_temp = $_FILES['image']['tmp_name'];
      
      $div = explode('.', $file_name);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
      $uploaded_image = "uploads/".$unique_image;
      
      
      if($fname == ""){
          echo "<div class='alert alert-danger'>Enter First Name</div>";
        }else{
          if($lname == ""){
            echo "<div class='alert alert-danger'>Enter Last Name</div>";
          }else{
            if($serial_id == ""){
              echo "<div class='alert alert-danger'>Enter Member ID</div>";
            }else{
              if($mail == ""){
                echo "<div class='alert alert-danger'>Enter Email</div>";
            }else{
              if(filter_var($mail, FILTER_VALIDATE_EMAIL) == false){
                echo "<div class='alert alert-danger'>Invalid Email!</div>";
                }else{
                  if($pass==""){
                    echo "<div class='alert alert-danger'>Enter Password</div>";
                  }else{
                    if(strlen($pass) < 10){
                      echo "<div class='alert alert-danger'>Enter Minimum 10 Character Password</div>";
                    }else{
            
                      if(empty($file_name)) {
                        echo "<div class='alert alert-danger'>Choose Image</div>";
                        }else{
                      
                        if ($file_size >1048567) {
                          echo "<div class='alert alert-danger'>Image Should Be Less Than 1 MB</div>";
                          }else{
                      
                          if (in_array($file_ext, $permited) === false) {
                            echo "<div class='alert alert-danger'>Only ".implode(', ', $permited)." are allowed</div>";
                            }else{
              
                          $chk = "SELECT *FROM user WHERE email='$mail'";
                          $res = $db->select($chk);
                          if(isset($res) > 0){
                            echo "<div class='alert alert-danger'>User Exists!</div>";        
                          }else{ 
      
                          move_uploaded_file($file_temp, $uploaded_image);
      
                          $unique_id = rand(time(), 10000); 
                          $status = "Offline";
                          $crypt = password_hash($pass, PASSWORD_DEFAULT);  
      
                          $query = "INSERT INTO user(unique_id, img, fname, lname, serial_id, email, pass, status)VALUES('$unique_id', '$uploaded_image', '$fname','$lname','$serial_id', '$mail', '$crypt', '$status')";
                          $res = $db->insert($query);
                          if($res){
                            echo "<script>alert('Account Created!');</script>";
                          }else{
                              echo "Error!";
                        }
                      }
                      }
                    }
                    }
                  }
                  }
                }
                }
              } 
            }
          }
        }
        ?>
      
      <form class="bg-dark text-white border shadow p-3 rounded" enctype="multipart/form-data" method="post" style="width: 450px;">
      <img src="image/eaglelogo.png" class="img-thumbnail bg-dark" alt="...">
      <h2 class="text-center p-3">CFCGI <span style="color:#4ccee8;">LOGIN</span>
      <input type="text" name="fname" class="form-control mb-3" placeholder="First Name">
      <input type="text" name="lname" class="form-control mb-3" placeholder="Last Name">
      <input type="text" name="serial_id" class="form-control mb-3" placeholder="Member ID">
      <input type="text" name="email" class="form-control mb-3" placeholder="Email">
      <input type="password" name="pass" class="form-control mb-3" placeholder="Password">
      <div class="mb-3">
        <input class="form-control" type="file" name="image">
     </div>
     <button class="btn btn-sm btn-primary">Sign Up</button>
     <a href="login.php" class="btn btn-sm btn-info text-light">Log In</a>
     </form>
    </div>
   </div>
  </div>
 </section>
<?php  require_once 'include/footer.php'; ?>