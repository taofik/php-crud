<?php
include "config.php";
 
$prov_id = $_POST['prov_id'];
 
$result = mysqli_query($conn, "select * from city WHERE id_prov=$prov_id");
$data = array();
foreach($result as $row){
    $data[] = array(
        'id' => $row['id'],
        'name_city' => $row['name_city'],
    );
}
echo json_encode($data);
?>