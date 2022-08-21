<?php

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];   
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];

    
    $conn = new mysqli('localhost','root','','students');
    if($conn->connect_error) {
        die("Connection Failed : ".$conn->connect_error);
    }
    else {
        $stmt = $conn->prepare("select email from student where email='$email' ;");
        $stmt->execute();
        $res = mysqli_query($conn,$stmt);
        $count = mysqli_num_rows($res);
        if($count>0) {
            echo "Already Registered.";
        }
        else {
            $stmt1 = $conn->prepare("insert into student values('$fname','$lname','$email','$password','$gender','$dob')");
            $stmt->execute(); 
            echo "Registration Successful";
            $stmt->close();
            $conn->close();
        }
    }

    ?>