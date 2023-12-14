<?php
    include("conn.php");
    

    $queryy = "SELECT * FROM vendor;";

    $Qey_Conn = mysqli_query($conn,$queryy);
    $data = [];
    while($row = mysqli_fetch_assoc($Qey_Conn)){
        $data[] = $row;
    }

    echo json_encode(["VendorList"=>$data]);


?>