<?php
session_start();
include("connection.php");
include("functions.php");


if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $run = mysqli_query($con, $query);
    if(mysqli_num_rows($run)>0){
        $row = mysqli_fetch_assoc($run);
        $db_email = $row['email'];
        $db_id = $row['id'];
        $token = uniqid(md5(time()));
        $query1 = "INSERT INTO reset_password (id, email, token) VALUES (NULL, '$email', '$token')";
        if(mysqli_query($con, $query1)){
            $to = $db_email;
            $subject = "Link do resetu hasła";
            $message = "Kliknij <a href='localhost/5s/reset.php?token=$token'>tutaj</a> aby zrestartować hasło.";
            $headers = "MIME-Version 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
            $headers .= 'From: <demo@demo.com>' . "\r\n";
            mail($to, $subject, $message, $headers);
            $msg = "<div>Link do resetu hasła został wysłany na skrzynke pocztową</div>";
        }
    }
        else{
            $msg = "<div>Nie znaleziono uzytkownika</div>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Przypomnienie hasła</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style type="text/css">
        #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }
        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
        }
        #box{
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>
    <div id="box">
        <form method="post">
            <div style="font-size:20px;margin:10px;color:white;">Przypomnienie hasła</div>
            Email: <input type="email" name="email"><br><br>
            <input name="submit" type="submit" value="Przypomnij haslo"><br><br>
            <a href="login.php">Wroc do strony logowania</a>
            <?php if(isset($msg)) echo $msg;?>
        </form>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js1/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>