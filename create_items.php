<?php
include "cfg/dbconnect.php";

$item_name = $_POST['item_name'];
$rate = $_POST['rate'];
$stock = $_POST['stock'];

try{
    for ($i = 0;$i<count($item_name);$i++){
        $sql = "insert into items(item_name, rate, stock) values (?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("sii",$item_name[$i],$rate[$i],$stock[$i]);
        $stmt->execute();
    }
    echo "success";
}
catch(Exception $e){
    echo $e->getMessage();
}
