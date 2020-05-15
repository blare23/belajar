<?php
    $con = mysqli_connect("localhost", "id6495633_user", "kmzway87", "id6495633_data");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $nama, $age, $username, $password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["nama"] = $nama;
        $response["username"] = $username;
        $response["password"] = $password;
    }
    
    echo json_encode($response);
?>