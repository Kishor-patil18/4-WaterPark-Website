<?php
$insert = false;
$duble = false;

if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";



    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("Faild Connection" .mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = "SELECT * FROM  `waterpark`.`signup` WHERE email = '$email'";
    $result = mysqli_query($con,$check);
    $count = mysqli_num_rows($result);
    if($count > 0){
        
    }else{
        $sql ="INSERT INTO `waterpark`.`signup` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";     

    if($con->query($sql) == true){
        $insert = true;
    }
    else
    {
        echo "Error: $sql <br> $con->error";
    }   
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration-Login</title>
    <link rel="stylesheet" href="signuplogin.css">
    <link rel="stylesheet" href="css/all.css">
</head>
<body>
<div class="card-header">
        <nav>
            <img src="logo.png" class="logo" height="100px" width="100px">
            <ul>
                <li><a href="Home.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="Login.html">Login</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="form-box">
            <h1>Sign Up</h1>
            <form action="signup.php" method="post">
                <div class="input-group">

                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" required name="name" placeholder="Name">  
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" required name="email" placeholder="Email">  
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required name="password" placeholder="Password">  
                    </div>
                    
                </div>
                
                <div class="btn">
                    <button class="singup-login">SignUp</button>
                </div>

                <div class="singin">
                   for LogIn click here<a href="login.html"><p>Login</p></a>
                </div>
                <?php
                if($insert == true ){
                    echo "Sign Up Successfully.";
                }else{
                    echo "User already Sign Up";
                }
                
                ?>
            </form>
        </div>
    </div>
    
</body>
</html>
