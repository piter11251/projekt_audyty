<?php
    include("functions.php");
    include("connection.php");
    if(isset($_GET['token'])){
        $token = mysqli_real_escape_string($con, $_GET['token']);
        $query = "SELECT * FROM reset_password WHERE token = '$token'";
        $run = mysqli_query($con, $query);
        if(mysqli_num_rows($run) > 0){
            $row = mysqli_fetch_assoc($run);
            $token = $row['token'];
            $email = $row['email'];
        }
        else {
            header("Location: login.php");
        }
    }

    if(isset($_POST['submit'])){
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
        $options = ['cost'=>11];
        $hashed = password_hash($password, PASSWORD_DEFAULT, $options);
        if($password!=$confirm_password){
            $msg = "<div>Hasła nie są zgodne</div>";
        }
        elseif(strlen($password) < 6){
            $msg = "<div> Hasło musi mieć co najmniej 6 znaków</div>";
        }
        else
            $query= "UPDATE users SET password='$hashed' WHERE email = '$email'";
            mysqli_query($con, $query);
            $query = "DELETE FROM reset_password WHERE email='$email'";
            mysqli_query($con, $query);
            $msg = "<div>Hasło zaktualizowane</div>";
            echo "Zostaniesz przekierowany na strone logowania";
            header('refresh: 5; url="login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
            <div style="font-size:20px;margin:10px;color:white;">Wpisz nowe haslo</div>
            <input type="text" readonly value="<?php echo $email; ?>">
            <input type="password" name="password"><br><br>
            <input type="password" name="confirm_password"><br><br>
            <div>
                <?php if(isset($msg)) echo $msg;?>
            </div>
            <div>
                <button name="submit">Reset hasła</button>
            </div>
        </form>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js1/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>