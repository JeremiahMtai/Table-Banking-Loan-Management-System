
<?php


include ('db_connect.php');
include ('header.php');
session_start();
error_reporting(0);
if(isset($_SESSION['login_id'])){
    header('Location: index.php?page=home');
}
if(isset($_POST['Register'])){
    $fname = $_POST['fname'];
    $address = $_POST['contact'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
        $sql = "SELECT * FROM users WHERE fname = '$fname'";
        $result = mysqli_query($conn, $sql);

        if(!$result ->num_rows > 0){
            $sql = "INSERT INTO users(fname, contact, adress, username, password)
                    VALUES('$fname', '$contact', '$address', '$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('Wow! User Registration Complete.')</script>";
                $fname = "";
                $contact = "";
                $address = "";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            }else{
                echo "<script>alert('Whoops! Something went wrong, Please try again.')</script>";
            }
        }else{
            echo "<script>alert('Whoops! Email Already exists.')</script>";
        }
    }else{
        echo "<script>alert('Passwords not Matched.')</script>";
    }
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>

    <style>
        .input-group, .form{
            justify-content: center;
        }
        .input-group input{
            margin: 5px;
            
        }
        .input-group input{
            border-radius: 3px;

        }




    </style>
    <center><form action=""  method="POST" class="form">
        <div class="login-text"> <h2>Register</h2></div><br>
                <div class="input-group">
                        <input type="text" name="name" placeholder="Full Name" required><br><br>
                </div>
                <div class="input-group">
                        <input type="text" name="address" placeholder="Address" required><br><br>
                </div>
                <div class="input-group">
                        <input type="text" name="contact" placeholder="Contact" required><br><br>
                </div>
                <div class="input-group">
                        <input type="text" name="username" placeholder="Username" required><br><br>
                </div>
                <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required><br><br>
                </div>
                <div class="input-group">
                        <input type="password" name="cpassword" placeholder="Confirm password" required><br><br>
                </div>
                <div><br>
                <button name="Register" class="btn-success">Register</button></center><br>
                </div><br>
                <center><div class="login">
                    <p>Have an Account? <a href="login.php">Login Here</a></p>
                </div></center>
        </form></center>
    </div>



    
</body>
</html>