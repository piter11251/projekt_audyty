<!DOCTYPE html>
<html>
<head>
    <title>Raport audyt</title>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap1.min.js"></script>
    <?php 
        if($_POST['okres'] == "week"){
            $obszary = $_POST['raport_audyt'];
            $obszary1 = (int) $obszary;
            $week = true;
        }
        else if($_POST['okres'] == "month"){
            $obszary = $_POST['raport_audyt'];
            $obszary1 = (int) $obszary;
            $week = false;
        }
    ?>
</head>
<body>
    <div id = "indexGo">
    <button class="btn btn-primary" onclick="window.location=('index.php')">Wróc do strony głównej</button>
    </div>
    <div id="printPDF">
        <form action="generatepdf.php" method="post">
            <input type="hidden" name="obszary1" value="<?php echo $obszary1;?>">
            <input type="hidden" name="okres" value="<?php echo $week;?>">
            <button type="submit" name="pdf_report_generate" class="btn btn-primary">Wydrukuj raport</button>
        </form>
    </div>
    <div class="filter">
<?php
    include("connection.php");
    include("functions.php");

    if($_POST['okres'] == "week"){
        $obszary = $_POST['raport_audyt'];
        $obszary1 = (int) $obszary;
        $week = true;
        $query = mysqli_query($con, "SELECT imie, nazwisko, data_audytu, podobszar, zmiana, suma FROM audyt, obszary, audytorzy WHERE audyt.audytor_id = audytorzy.id_audytora AND 
        obszary.id = audyt.obszar_id AND audyt.obszar_id = ".$obszary1. " AND audyt.tydzien = WEEK(CURRENT_DATE()) ORDER BY suma DESC");
        echo "<table style='width: 98%; margin-left: 1%;' class='table table-condensed'><tr>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Imie</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Nazwisko</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Obszar</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Data</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Zmiana</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Suma</td>";
        echo "</tr>";

        while($row = mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td>".$row['imie']."</td>";
            echo "<td>".$row['nazwisko']."</td>";
            echo "<td>".$row['podobszar']."</td>";
            echo "<td>".$row['data_audytu']."</td>";
            echo "<td>".$row['zmiana']."</td>";
            echo "<td>".$row['suma']."%</td>";
            echo "</tr>";
        }
        echo "</table>";
    echo "</div>";
}
    else if($_POST['okres'] == "month"){
        $obszary = $_POST['raport_audyt'];
        $obszary1 = (int) $obszary;
        $week = false;
        $query = mysqli_query($con, "SELECT imie, nazwisko, nazwa_obszaru, podobszar, data_audytu, zmiana, suma_selekcja, suma_systematyka, suma_sprzatanie,
        suma_standaryzacja, suma_samodyscyplina, suma FROM audyt, obszary, audytorzy WHERE audyt.audytor_id = audytorzy.id_audytora AND 
        obszary.id = audyt.obszar_id AND audyt.obszar_id = ".$obszary1. " AND audyt.miesiac = MONTH(audyt.data_audytu)");

        echo "<table style='width: 98%; margin-left: 1%;' class='table table-condensed'><tr>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Imie</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Nazwisko</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Obszar</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Data</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Zmiana</td>";
        echo "<td style='background-color:#1F6AF9; color:white;'>Suma</td>";
        echo "</tr>";

        while($row = mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td>".$row['imie']."</td>";
            echo "<td>".$row['nazwisko']."</td>";
            echo "<td>".$row['podobszar']."</td>";
            echo "<td>".$row['data_audytu']."</td>";
            echo "<td>".$row['zmiana']."</td>";
            echo "<td>".$row['suma']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>
    </div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js1/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>