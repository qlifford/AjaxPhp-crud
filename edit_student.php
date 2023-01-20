<?php
include ("db.php");

if(isset($_GET['update_id']))
{
  $updateId = $_GET['update_id'];

  $sql = "select * from students where id = '$updateId'";
  $run = mysqli_query($con, $sql);
  $editdata = mysqli_fetch_array($run);
}
  if(isset($_POST['edit_btn'])) 
  {
    if ($_FILES['img']['name'] != "" || $_FILES['name'] != "" || $_FILES['email'] != "" || $_FILES['phone'] != "") 
    {      
      $file_name = $_FILES['img']['name'];
      $temp_name = $_FILES['img']['tmp_name'];       
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];

      move_uploaded_file($temp_name, "uploads/" .$file_name);
    }
    else
    {
      $file_name = $_POST['old_img'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
    }
    $sql = "UPDATE students set img='$file_name', name='$name', email='$email', phone='$phone' where id='$updateId'";
    $run = mysqli_query($con, $sql);

    if($run) 
    {      
        echo "<script>alert('Record Updated Successfully')</script>";
        echo "<script>window.open('student.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Update Failed')</script>";
        echo "<script>window.open('student.php','_self')</script>";
    }
    echo "<script>alert('Update Unchanged')</script>";
    echo "<script>window.open('student.php','_self')</script>";

}
?> 
<!doctype html>
<html lang="en">
  <head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Student Web</title>
  </head>
  <body>

    <h2 class="text-center mt-5">Update Student Details</h2>
    <hr class="text-primary fw-bold w-80">
  <div class="container d-flex justify-content-center py-3">

      <form action="#" method="POST" enctype="multipart/form-data">        
            <div class="modal-body">               

            <div class="mb-3 mt-3">
                    <label for="">Old Picture:</label><br>
                      <img src="uploads/<?= $editdata['img']; ?>" style="height:100px" alt=""><br>
                      <input type="hidden" name="old_img" class="form-control" value="<?= $editdata['img']; ?>"/>
                      
                    <label for="">New Picture:</label>
                      
                      <input type="file" name="img" class="form-control"/>
                </div>

                <div class="mb-3">
                    <label for="">Name:</label>
                    <input type="text" name="name" value="<?= $editdata['name']; ?>" class="form-control"/>
                </div>

                <div class="mb-3">
                    <label for="">Email:</label>
                    <input type="email" name="email" value="<?= $editdata['email']; ?>" class="form-control"/>
                </div>

                <div class="mb-3">
                    <label for="">Phone:</label>
                    <input type="text" name="phone" value="<?= $editdata['phone']; ?>" class="form-control"/>
                </div>              
            
            <div class="float-end mb-3">
                <a href="student.php" type="button" class="btn btn-danger">Cancel</a>                
                <button type="submit" name="edit_btn" class="btn btn-primary">Update</button>
            </div>
            </div>
      </form>
      
      </div>
      <hr class="text-primary fw-bold w-80">

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
       
    </script>


  </body>
</html>
