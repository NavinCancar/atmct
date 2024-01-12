<?php 
    $conn = mysqli_connect("localhost", "root", "", "leaflet");
            
    if (!$conn) {//loi ket noi csdl
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
        }
        else{//ket noi den csdl
        mysqli_set_charset($conn,"utf8");// đọc và ghi dữ liệu dạng utf8
    }
?>