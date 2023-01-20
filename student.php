<?php
include "db.php";

if(isset($_GET['del_id']))
{
  $delId = $_GET['del_id'];
  $del = "delete from students where id='$delId'";
  $res = mysqli_query($con, $del);
  if ($res)
  {
    echo "<script>alert('Record Deleted')</script>";
    echo "<script>window.open('student.php','_self')</script>";
  }
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
    <link rel="stylesheet" href="stnt.css">
    <title>Student Crud</title>
  </head>
  <body>

  <div class="container py-5">

  <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModal">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="saveStudent" action="functions.php" method="POST" enctype="multipart/form-data">        
            <div class="modal-body">               

            <div class="mb-3">
                    <label for="">Profile Picture</label>
                    <input type="file" name="img" class="form-control" required/>
                </div>

                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" required/>
                </div>

                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control"/>
                </div>

                <div class="mb-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control"/>
                </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="save_btn" class="btn btn-primary">Save Now</button>
            </div>
      </form>
    </div>
  </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">               
                    <div class="card-header">
                        <h4>Our Students</h4>   
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                            Add Student
                        </button>            
                    </div>
                    <div class="card-body">                    
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Stdnt Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Admission Date</th>                                              
                            <th scope="col">UPDATE</th>                                                 
                            <th scope="col">DELETE</th>                                                 
                          </tr>
                        </thead>
                        <tbody>
                          <?php                          
                            $sel = "select * from students order by 1 DESC";
                            $result = mysqli_query($con, $sel);
                            while($data = mysqli_fetch_array($result))
                            { 
                          ?>
                              <tr>
                                <td scope="row"><?= $data['id']; ?></td>
                                <td><?= $data['name']; ?></td>
                                <td><img src="uploads/<?= $data['img']; ?>" style="height:50px;" alt="Image"></td>
                                <td><?= $data['email']; ?></td>
                                <td><?= $data['phone']; ?></td>
                                <td><?= $data['date']; ?></td>                          
                                <td>                                
                                    <a href="edit_student.php?update_id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">Details</a>  
                                  </td>
                                  <td>                              
                                    <a href="student.php?del_id=<?= $data['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                              </tr>
                              <?php 
                            } 
                          ?>
                        </tbody>

                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
       
    </script>


  </body>
</html>
