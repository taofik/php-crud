<?php
    include "config.php";
    $id = $_GET['id'];
    $result = mysqli_query($conn, 'select * from karyawan where id='.$id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h3>Update Data</h3>
                <form method="post" action="update.php">
                    <table class="table">
                    <?php
                        foreach($result as $row){
                    ?>
                        <tr>
                            <td>Name : </td>
                            <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Address : </td>
                            <td><textarea name="address"><?php echo $row['address']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Province : </td>
                            <td><input type="text" name="prov" value="<?php echo $row['prov']; ?>"></td>
                        </tr>
                        <tr>
                            <td>City : </td>
                            <td><input type="text" name="city" value="<?php echo $row['city']; ?>"></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                            <td><input type="submit" name="submit" value="SAVE"></td>
                        </tr>
                    <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php
        if(isset($_POST['submit'])){
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $prov = $_POST['prov'];
            $city = $_POST['city'];
            
            $dd = mysqli_query($conn,"update karyawan set name='$name', address='$address', prov='$prov', city='$city' where id='$id'");
            header("location:index.php");
        }
    ?>
</body>
</html>