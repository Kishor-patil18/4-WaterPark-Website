<?php
$insert = false;

$email = $_POST['email'];
$password = $_POST['password'];

$con = new mysqli("localhost","root","","waterpark");

if(!$con){
    die("Faild Connection" . mysqli_connect_errno());
}else{
    $sql = $con->prepare("select * from signup where email = ?");
    $sql->bind_param("s",$email);
    $sql->execute();
    $sql_result = $sql->get_result();
    if($sql_result->num_rows > 0){
        $data = $sql_result->fetch_assoc();
        if($data['password'] === $password){
            $insert = true;
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
            <h1>Login</h1>
            <form action="login.php" method="post">
                <div class="input-group">

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" required name="email" placeholder="Email">  
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" required name="password" placeholder="Password">  
                    </div>
                    
                </div>
                
                <div class="btn-field">
                    <button class="singup-login">LogIn</button>
                </div>

                <div class="singin">
                    for SignUp click here<a href="signup.html"><p>singup</p></a>
                </div>

                <?php
                if($insert == true)
                {
                     echo "<h2> Login Successfully</h2>";
                 }else{
                     echo "<h2> Invalid Email or Password </h2>";
                 }
                ?>

            </form>
        </div>
    </div>
    
</body>
</html>