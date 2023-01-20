<?php
$con = mysqli_connect("localhost","root","","imageCrud");

if (!$con) 
{
   echo "Error connecting to database";
}