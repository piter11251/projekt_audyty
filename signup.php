<?php
    session_start();
    include("connection.php");
    include_once("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        if(!empty($user_name) && !empty($password) && !empty($name) && !empty($last_name)){
            //zapis do bazy
            $query = "INSERT INTO users (`user_name`, `password`) VALUES ('$user_name', '$hashed_password');";
            $query1 = "INSERT INTO audytorzy (imie, nazwisko) VALUES ('$name', '$last_name')";
            mysqli_query($con, $query);
            mysqli_query($con, $query1);
            header("Location: login.php");
            die;
        }
        else {
            echo "Login/hasło niepoprawne lub brak danych osobowych";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
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
            <div style="font-size:20px;margin:10px;color:white;">Rejestracja</div>
            <input type="text" name="user_name"  placeholder="login"><br><br>
            <input type="password" name="password"  placeholder="haslo"><br><br>
            <input type="text" name="name"  placeholder="imie"><br><br>
            <input type="text" name="last_name"  placeholder="nazwisko"><br><br>
            <input id="button" type="submit"  placeholder="Zarejestruj"><br><br>
            <a href="login.php">Posiadasz juz konto? Zaloguj sie</a><br><br>
        </form>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js1/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>