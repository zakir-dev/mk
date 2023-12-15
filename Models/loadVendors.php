<?php
    include("conn.php");
    header('Content-Type: application/json');
    if (!$conn) {
        $error = mysqli_connect_error();
        echo json_encode(["error" => "Database connection failed: $error"]);
        exit();
    }

    $queryy = "SELECT * FROM vendor;";
    $Qey_Conn = mysqli_query($conn, $queryy);

    if (!$Qey_Conn) {
        $error = mysqli_error($conn);
        echo json_encode(["error" => "Query execution failed: $error"]);
        mysqli_close($conn);
        exit();
    }

    $data = [];
    while($row = mysqli_fetch_assoc($Qey_Conn)){
        $data[] = $row;
    }

    mysqli_close($conn);
    echo json_encode(["VendorList" => $data]);
?>
