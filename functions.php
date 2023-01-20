<?php
session_start();
include "db.php";

if(isset($_POST['save_btn'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $file_name = $_FILES['img']['name'];
    $temp_name = $_FILES['img']['tmp_name'];

    move_uploaded_file($temp_name, "uploads/" .$file_name);
    $insert = "INSERT INTO students(img, name, email, phone, date) VALUES('$file_name','$name','$email','$phone',NOW())";
    $run = mysqli_query($con, $insert);
    if($run) 
    {      
        echo "<script>alert('Saved')</script>";
        echo "<script>window.open('student.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Failed')</script>";
        echo "<script>window.open('student.php','_self')</script>";
    }
}
  
