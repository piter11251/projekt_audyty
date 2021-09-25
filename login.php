<?php
session_start();
include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    if(!empty($user_name) && !empty($password)){
        //odczyt z bazy danych
        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";

        $result = mysqli_query($con, $query);
        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                if(password_verify($password, $user_data['password'])){
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "Zły login lub hasło";
    }
    else {
        echo "Wprowadź poprawne dane";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            <div style="font-size:20px;margin:10px;color:white;">Logowanie</div>
            <input type="text" name="user_name"><br><br>
            <input type="password" name="password"><br><br>
            <input id="button" type="submit" value="Zaloguj"><br><br>
            <a href="signup.php">Rejestracja</a><br><br>
            <div><a href="reset_password.php">Przypomnij hasło</a></div>
        </form>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js1/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>