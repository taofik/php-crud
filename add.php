<?php
    include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
</head>
<body>
    <h3>Tambah Data</h3>
    <form method="post" action="action_add.php">
        <table>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td><textarea name="address"></textarea></td>
            </tr>
            <tr>
                <td>Province : </td>
                <td><input type="text" name="prov"></td>
            </tr>
            <tr>
                <td>City : </td>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SAVE"></td>
            </tr>
        </table>
    </form>
</body>
</html>