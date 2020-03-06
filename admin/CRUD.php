<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <!-- Theme CSS File -->
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <title>PHP|CRUD</title>
  </head>
  <body>   
    <!--Source File -->
    <script src="javascript/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <?php require_once 'process.php'; ?> 
      <?php 
      if(isset($_SESSION['message'])): ?>
      <div class="alert alert-primary<?=$_SESSION['msg_type']?>">

           <?php
              echo $_SESSION['message'];
              unset($_SESSION['message']);
           ?>
       </div>
     <?php endif ?>
         
          <?php 
          $conn= new mysqli('localhost','root','','newsportal') or die(mysqli_error($conn));
       ?>
      
       <?php  
          $result=$conn->query("SELECT * FROM data") or die($conn->error);
          //pre_r($result->fetch_assoc());

          function pre_r($array){
            echo'<pre>';
            print_r($array);
            echo '</pre>';
          }
      ?>
       <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>E-mail</th>
              <th>Type</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
        <?php 
              while($row= $result->fetch_assoc()): 
         ?>
            <tr>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['type'];?></td>
              <td>
                <a href="CRUD.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr> 
            <?php endwhile; ?> 
        </table>
       </div> 

      <!-- Contact Us Section Start -->
    <form action="process.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
     <section class="contact-section">
      <div class="container">
        <div class="contact-heading">
          <h2>Stay with Us</h2>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
          <div class="form-group">
            <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Full Name" class="form-control">
          </div>

          <div class="form-group">
            <input type="email" name="email" value="<?php echo $email; ?>"placeholder="Email Address" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" name="password" value="<?php echo "password" ?>"placeholder="password" class="form-control">
          </div>

          <div class="form-group">
            <input type="text" name="location" value="<?php echo $location; ?>"placeholder="Type" class="form-control">
          </div>

          <div class="form-group">
            <?php 
            if($update==true):
            ?>
            <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>  
            <button type="submit" class="btn btn-primary" name="save">Save</button>

          <?php endif; ?>
          </div>
        </div>
      </div>
     </section>
    </form>
    <!-- Contact Us Section ends -->
  </body>
</html>


   