<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }


    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    

            $uuid = guidv4();
            $Username   = $_GET['Username'] ; 
            $birthDate = $_GET['username'] ; 
            $Email = $_GET['Email'] ; 
            $Gender = $_GET['Gender'] ; 
            $password=password_hash($_GET['password'], PASSWORD_DEFAULT);
        
            $query = "INSERT INTO users(uuid, Username, Password, Email, Gender, BirthDate) VALUES (?,?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'ssssss', $uuid, $Username, $Password, $Email, $Gender, $birthDate);
            $run = mysqli_stmt_execute($stmt);

?>
