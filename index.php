<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);
$user_personal_data = user_personal_data($con);
if(isset($_POST['audytsits'])){
    $audytSits = $_POST['audytsits'];
    switch($audytSits){
        case 'linie':
            header("Location: linie.php");
            break;
        case 'mm':
            header("Location: mm.php");
            break;
        case 'mwg':
            header("Location: mwg.php");
            break;
        case 'sim':
            header("Location: sim.php");
            break;
        case 'szwalnia':
            header("Location: szwalnia.php");
            break;
        case 'tapi':
            header("Location: tapi.php");
            break;
        case 'tapi2':
            header("Location: tapi2.php");
            break;
        case 'warsztat':
            header("Location: warsztat.php");
            break;
        default: 
            header("Location: index.php");
            break;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Audyt SITS</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
</head>
<body>
    <button class="btn btn-secondary" onclick="window.location=('logout.php')">Wyloguj</button>
    <h1>Strona główna</h1>

    <br>
    Cześć, <?php echo $user_personal_data['imie'];?>

    <div>
        Na jakim obszarze chcesz wykonac audyt?
        <form action="" method="post">
            <select class="custom-select" name="audytsits" id="inputGroupSelect01">
                <option value="linie">Linie</option>
                <option value="mm">Magazyn Materiałów</option>
                <option value="mwg">Magazyn Wyrobów Gotowych</option>
                <option value="sim">Stolarnia i Modelarnia</option>
                <option value="szwalnia">Szwalnia</option>
                <option value="tapi">Tapicernia</option>
                <option value="tapi2">Tapicernia_II</option>
                <option value="warsztat">Warsztat</option>
            </select>
            <input class="btn btn-primary" type="submit" value="Dalej">
        </form>
        <br><br><br><br><br>
        Raport z :
        <form method = "post" action="raport.php">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="flexRadioDefault1" name="okres" value="week" class="form-check-input" checked>
            <label for="flexRadioDefault1">Tygodnia</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="flexRadioDefault2" name="okres" value="month" class="form-check-input">
            <label for="flexRadioDefault2">Miesiąca</label>
        </div>
            <select class="custom-select" name="raport_audyt">
                <option value=1>Linie</option>
                <option value=2>Magazyn Materiałów</option>
                <option value=3>Magazyn Wyrobów Gotowych</option>
                <option value=4>Stolarnia i Modelarnia</option>
                <option value=5>Szwalnia</option>
                <option value=6>Tapicernia</option>
                <option value=7>Tapicernia_II</option>
                <option value=8>Warsztat</option>
            </select>
            <input type="submit" value="Dalej" class="btn btn-primary">
        </form>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js1/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>