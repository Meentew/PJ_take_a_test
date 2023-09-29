<?php
    header("Content-Type: application/json");
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname ="test";//เปลี่ยน test
    $conn = new mysqli($servername ,$username,$password,$dbname);
    $tt = $_GET["id"];
    if($conn->connect_error){
        die("connection failed". $conn->connect_error);
    }
    $a = $conn->query("SELECT * FROM datos WHERE num ='$tt'");//เปลี่ยนตรงdatosเป็นชื่อตาราง
    $row = $a->fetch_assoc();
    
    //echo $row['on'];

    $data = array( "num" => $row['num'],"temperature" => $row['temperature'] );
    echo json_encode($data);
?>