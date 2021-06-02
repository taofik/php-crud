<?php
    include "config.php";
    $id = $_GET['id'];
    $result = mysqli_query($conn, 'select k.*, p.name_prov, c.name_city from karyawan k join province p on k.prov = p.id join city c on c.id = k.city where k.id='.$id);
    $prov = mysqli_query($conn, 'select * from province');
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
                            <td>
                                <select name="prov" id="prov">
                                    <option>-=Select Province=-</option>
                                    <?php foreach($prov as $p){ ?>
                                    <option value="<?php echo $p['id'];?>" <?php if($p['id'] == $row['prov']){ echo "selected"; } ?>><?php echo $p['name_prov'];?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>City : </td>
                            <td>
                                <select name="city" id="city">
                                    <option>-=Select City=-</option>
                                    <?php
                                        $city = mysqli_query($conn, 'select * from city where id_prov='.$row['prov']);
                                        foreach($city as $c) {
                                        if($row['city'] != null){
                                            if($c['id'] == $row['city']){
                                                $sel = "selected";
                                            } else {
                                                $sel = "";
                                            }
                                            echo "<option value=".$c['id']." ".$sel.">".$c['name_city']."</option>";
                                        } else {
                                            echo "<option></option>";
                                        }
                                    } ?>
                                </select>
                            </td>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#prov').change(function(){
                var province_id = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'city.php',
                    data: 'prov_id='+province_id,
                    dataType: 'json',
                    success:function(response){
                        var len = response.length;

                        $("#city").empty();
                        $("#city").append("<option>-=Select City=-</option>");
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name_city'];
                            
                            $("#city").append(
                                "<option value='"+id+"'>"+name+"</option>"
                            );

                        }
                    }
                })
            })
        })
    </script>
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