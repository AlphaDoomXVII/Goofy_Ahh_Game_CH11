<?php
    include('DB_connect.php');

    function checkPost() {
        foreach($_GET as $key => $value) {
            $_GET[$key] = htmlentities(strip_tags($value));
        }
    }

   
            checkPost();
            $username = $_GET['username'];
            $password= $_GET['password'];

            $sql = "select * from users where username = '$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            $stored_password = $row['Password'];
            if (password_verify($password, $stored_password)) {
                // you are logged in
            } 

            else {
                echo '<script  
                type="text/javascript">window.onload = function () { alert("Password or Username invalid"); } 
                    </script>'; 
            }

?>
