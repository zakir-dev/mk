<?php
    include("conn.php");
    header('Content-Type: application/json');
    if (!$conn) {
        $error = mysqli_connect_error();
        echo json_encode(["error" => "Database connection failed: $error"]);
        exit();
    }

    $queryy = "SELECT 
    i.ID AS itemId,
    s.ID AS scaleID,
    i.ItemName,
    i.Scale,
    s.Scale,
    i.Description,
    m.Unit
FROM
    item i
        JOIN
    scale s ON i.ID = s.ID
    JOIN measurementunit m on i.Unit = m.ID;";
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
    echo json_encode(["ItemList" => $data]);
?>
