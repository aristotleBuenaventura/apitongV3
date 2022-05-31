<?php
    //user or admin
    include "../Registration/connectionRegistration.php";

    error_reporting(0);

    

    if (isset($_SESSION['username'])) {
        header("Location: ../HomePage/index.html");
    }

    if (isset($_POST['submit'])) {
        session_start();
        
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']); //md5()

        // $tm=md5(time());
        // $fnm=$_FILES["image1"]["name"];
        // $dst="./userimages/".$tm.$fnm;
        // $dst1="userimages/".$tm.$fnm;
        // move_uploaded_file($_FILES["image1"]["tmp_name"],$dst);

        // $role = $_POST['role'];

        if ($password === $cpassword) {
            $users = getUserByEmail($conn, $email);
            if ($users->num_rows === 0) {
                $sql = "INSERT INTO registration (username, email, password)
                        VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header('Location: ../Login/loginBackEnd.php?success=true');
                } else {
                    echo "<script>alert('Woops! Something Went Wrong.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Email Already Exists.')</script>";

            }

        } else {
            echo "<script>alert('Password Not Matched.')</script>";
        }
    }

    function getUserByEmail($conn, $email) {
        $sql = "SELECT * FROM registration WHERE email='$email'";
        return mysqli_query($conn, $sql);
    }

    include ('../Registration/Registration.html');

    ?>
