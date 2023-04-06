<div class="container">

    <?php
    // Include the database configuration file
		
    // Get all the posts from the database
    $sql = "SELECT * FROM tbl_post ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);
 ?>
  <?php  // Check if any posts are found
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and display the post title, content, and created date
        while ($row = mysqli_fetch_assoc($result)) { ?>
         

         <?php

// assuming you have retrieved the name and surname from the database
$fname = $_SESSION['fname'];

// retrieve the surname from the database using the user ID in the session
$id = $_SESSION['serial_id'];
$sql = "SELECT lname FROM user WHERE serial_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$lname = $row['lname'];

// concatenate the name and surname
$full_name = $fname . " " . $lname;
?>

<div class="container">
 
    <?php
    // Include the database configuration file
		
    // Get all the posts from the database
    $sql = "SELECT * FROM tbl_post WHERE userId = $id ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql); ?>

<?php // Check if any posts are found
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and display the post title, content, and created date
        while ($row = mysqli_fetch_assoc($result)) { ?>
       <!-- POST BOX -->
       <div class="widget-post" aria-labelledby="post-header-title">
                  <div class="widget-post__header">
                    <h2 class="widget-post__title" id="post-header-title">
                    <!-- PROFILE PICTURE HERE -->
                     <img src="https://imgs.search.brave.com/pWJ_oRMDU96nv2TehfYS_qN2a9rWWmu8coto0LnGgCU/rs:fit:600:604:1/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vNzM2/eC8xOC81My9hZC8x/ODUzYWRhZTA1YWNl/NjhmNjk3OWNiYmFj/NDhhZjJlYy5qcGc" width="50" height="50"  alt=""> <?php echo $full_name; ?>

                    </h2>
                  </div>
                    <form action="../response/submit_post.php" method="post" id="widget-form" class="widget-post__form" name="form" aria-label="post widget">
                      <div class="widget-post__content">
                        <label for="post-content" class="sr-only">asdasdsa</label>
                        <?php echo $row['content']; ?>
                      </div>
                      <div class="widget-post__options is--hidden" id="stock-options">
                      </div>
                      <div class="widget-post__actions post--actions">
                        <div class="post-actions__attachments">
  
                          <button type="button" class="btn post-actions__upload attachments--btn">
                              share
                          </button>
                        
                        </div>
                        <div class="post-actions__widget">
                          <?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?>
                        </div>
                      </div>
                    </form>
                </div>
                <br><br>
              <!-- END POST BOX -->
 <?php       }
    } else {
        echo "No posts found.";
    }

    // Close the database connection
    //mysqli_close($conn);
    ?>
</div>




 <?php       }
    } else {
        echo "No posts found.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</div>

