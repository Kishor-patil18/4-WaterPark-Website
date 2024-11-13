<?php

$msg = " ";

if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);
    if(!$con){
        die("Faild Connection" .mysqli_connect_errno());
    }

    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $adult=$_POST['adult'];
    $childern=$_POST['childern'];
    $date=$_POST['date'];


    $sql ="INSERT INTO `waterpark`.`ticket` (`name`, `email`, `contact`, `adult`, `childern`, `date`) VALUES ('$name', '$email', '$contact', '$adult', '$childern', '$date')";

    if($con->query($sql) == true){
        $msg = "Booking successful";
    }else{
        echo "Error: $sql <br> $con->error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="css/all.css">
    <style>
        
    </style>
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

    <div class="booking-form-box">

        <form action="booking.php" method="post">
            <div class="input-grp">
                <label for="">Name.</label>
                <input type="text" name="name" required id="name" class="form-control">
            </div>

            <div class="input-grp">
                <label for="">Email.</label>
                <input type="text" name="email" id="email" required class="form-control">
            </div>

            <div class="input-grp">
                <label for="">Contact No.</label>
                <input type="text" pattern="[789][0-9]{9}" required name="contact" id="contact" class="form-control">
            </div>

            <div class="input-grp">
                <label for="">Adults</label>
                <input type="number" name="adult" id="adult" value="1" required class="form-control">
            </div>

            <div class="input-grp">
                <label for="">Childerns</label>
                <input type="number" name="childern" id="childern" value="0" class="form-control">
            </div>
            <br>
            <br>
            <div class="input-grp">
                <label for="">Date</label>
                <input type="date" name="date" id="date" required class="form-control select-date">
            </div>

            <div class="input-grp">
                <button type="submit" class="btn btn-primary ticket">Book Ticket.</button>
            </div>

           <p style="color:red"> <?php 
            echo $msg;
            ?></p>
            
        </form>

    </div>
    
</body>
</html>