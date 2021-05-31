<?php
include "config.php";
 
$id = $_GET['id'];
 
$result = mysqli_query($conn, "DELETE FROM karyawan WHERE id=$id");
 
header("Location:index.php");
?>