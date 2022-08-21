<?php
    $email = $_POST['email'];
    $password = $_POST['password'];


    $conn = new mysqli('localhost','root','','students');
    if($conn->connect_error) {
        die("Connection Failed : ".$conn->connect->error);
    }
    else {
        $stmt1 = "select email from student where email='$email';";
        $res = $conn->query($stmt1);
        if($res->num_rows>0) {
            $stmt2 = "select password from student where email='$email';";
            $res = $conn->query($stmt2);
            $row = $res->fetch_assoc();
            $pwd = $row['password'];
            
            $verify = password_verify($password, $pwd);

            if ($verify) {
                echo "Password Verified!";
            } else {
                echo "Incorrect Password!";
            }
        }
        else {
            echo "Invalid Email or Password";
        }
    }
?>