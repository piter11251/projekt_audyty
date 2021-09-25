<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<button class="btn btn-secondary" onclick="window.location=('index.php')">Wróć do strony głównej</button>
<?php
session_start();
    include("connection.php");
    include("functions.php");
    $file_array = reArrayFiles($_FILES['userfile']);
    if(file_exists($file_array[0]['name'])){
        echo "xdddd";
        $user_personal_data = user_personal_data($con);
        $audit_date = $_POST['dzienAudytu'];
        $audit_week = date('W', strtotime($audit_date));
        $audit_year = date('Y', strtotime($audit_date));
        $audit_month = date('m', strtotime($audit_date));
        $id_audytora = $user_personal_data['id_audytora'];
        $obszar_id = $_POST['obszar_id'];
        $zmiana = $_POST['zmiana'];
        $podobszar = $_POST['podobszar'];

        // SELEKCJA

        $ocena_selekcja1 = $_POST['valueSelekcja1'];
        $ocena_selekcja2 = $_POST['valueSelekcja2'];
        $ocena_selekcja3 = $_POST['valueSelekcja3'];

        $uwagi_selekcja1 = $_POST['uwagiSelekcja1'];
        $uwagi_selekcja2 = $_POST['uwagiSelekcja2'];
        $uwagi_selekcja3 = $_POST['uwagiSelekcja3'];

        $suma_selekcja = min($ocena_selekcja1, $ocena_selekcja2, $ocena_selekcja3)*10;

        // SYSTEMATYKA

        $ocena_systematyka1 = $_POST['valueSystematyka1'];
        $ocena_systematyka2 = $_POST['valueSystematyka2'];
        $ocena_systematyka3 = $_POST['valueSystematyka3'];
        $ocena_systematyka4 = $_POST['valueSystematyka4'];
        $ocena_systematyka5 = $_POST['valueSystematyka5'];

        $uwagi_systematyka1 = $_POST['uwagiSystematyka1'];
        $uwagi_systematyka2 = $_POST['uwagiSystematyka2'];
        $uwagi_systematyka3 = $_POST['uwagiSystematyka3'];
        $uwagi_systematyka4 = $_POST['uwagiSystematyka4'];
        $uwagi_systematyka5 = $_POST['uwagiSystematyka5'];

        $suma_systematyka = min($ocena_systematyka1,$ocena_systematyka2,$ocena_systematyka3 , $ocena_systematyka4 , $ocena_systematyka5)*10; 

        // SPRZĄTANIE 

        $ocena_sprzatanie1 = $_POST['valueSprzatanie1'];
        $ocena_sprzatanie2 = $_POST['valueSprzatanie2'];
        $ocena_sprzatanie3 = $_POST['valueSprzatanie3'];
        $ocena_sprzatanie4 = $_POST['valueSprzatanie4'];
        $ocena_sprzatanie5 = $_POST['valueSprzatanie5'];

        $uwagi_sprzatanie1 = $_POST['uwagiSprzatanie1'];
        $uwagi_sprzatanie2 = $_POST['uwagiSprzatanie2'];
        $uwagi_sprzatanie3 = $_POST['uwagiSprzatanie3'];
        $uwagi_sprzatanie4 = $_POST['uwagiSprzatanie4'];
        $uwagi_sprzatanie5 = $_POST['uwagiSprzatanie5'];

        $suma_sprzatanie = min($ocena_sprzatanie1 , $ocena_sprzatanie2 , $ocena_sprzatanie3 , $ocena_sprzatanie4 , $ocena_sprzatanie5)*10;

        // STANDARYZACJA

        $ocena_standaryzacja1 = $_POST['valueStandaryzacja1'];
        $ocena_standaryzacja2 = $_POST['valueStandaryzacja2'];
        $ocena_standaryzacja3 = $_POST['valueStandaryzacja3'];

        $uwagi_standaryzacja1 = $_POST['uwagiStandaryzacja1'];
        $uwagi_standaryzacja2 = $_POST['uwagiStandaryzacja1'];
        $uwagi_standaryzacja3 = $_POST['uwagiStandaryzacja1'];

        $suma_standaryzacja = min($ocena_standaryzacja1 , $ocena_standaryzacja2 , $ocena_standaryzacja3)*10;

        // SAMODYSCYPLINA

        $ocena_samodyscyplina1 = $_POST['valueSamodyscyplina1'];
        $ocena_samodyscyplina2 = $_POST['valueSamodyscyplina2'];
        $ocena_samodyscyplina3 = $_POST['valueSamodyscyplina3'];

        $uwagi_samodyscyplina1 = $_POST['uwagiSamodyscyplina1'];
        $uwagi_samodyscyplina2 = $_POST['uwagiSamodyscyplina2'];
        $uwagi_samodyscyplina3 = $_POST['uwagiSamodyscyplina3'];

        $suma_samodyscyplina = min($ocena_samodyscyplina1 , $ocena_samodyscyplina2 , $ocena_samodyscyplina3)*10;

        $suma = ($suma_selekcja + $suma_systematyka + $suma_standaryzacja + $suma_sprzatanie + $suma_samodyscyplina);

            mysqli_query($con, "INSERT INTO audyt (`tydzien`, `rok`, `miesiac`, `data_audytu`, `audytor_id`, `obszar_id`, `zmiana`, `podobszar`,
            `ocena_selekcja1`, `ocena_selekcja2`, `ocena_selekcja3`,
            `uwagi_selekcja1`, `uwagi_selekcja2`, `uwagi_selekcja3`, `suma_selekcja`, 
            `ocena_systematyka1`, `ocena_systematyka2`, `ocena_systematyka3`, `ocena_systematyka4`, `ocena_systematyka5`,
            `uwagi_systematyka1`, `uwagi_systematyka2`, `uwagi_systematyka3`, `uwagi_systematyka4`, `uwagi_systematyka5`, `suma_systematyka`,
            `ocena_sprzatanie1`, `ocena_sprzatanie2`, `ocena_sprzatanie3`, `ocena_sprzatanie4`, `ocena_sprzatanie5`,
            `uwagi_sprzatanie1`, `uwagi_sprzatanie2`, `uwagi_sprzatanie3`, `uwagi_sprzatanie4`, `uwagi_sprzatanie5`, `suma_sprzatanie`,
            `ocena_standaryzacja1`, `ocena_standaryzacja2`, `ocena_standaryzacja3`,
            `uwagi_standaryzacja1`, `uwagi_standaryzacja2`, `uwagi_standaryzacja3`, `suma_standaryzacja`,
            `ocena_samodyscyplina1`, `ocena_samodyscyplina2`, `ocena_samodyscyplina3`,
            `uwagi_samodyscyplina1`, `uwagi_samodyscyplina2`, `uwagi_samodyscyplina3`, `suma_samodyscyplina`, `suma`
            )
            VALUES ('$audit_week', '$audit_year', '$audit_month', '$audit_date' , '$id_audytora', '$obszar_id', '$zmiana', '$podobszar',
            '$ocena_selekcja1', '$ocena_selekcja2', '$ocena_selekcja3',
            '$uwagi_selekcja1', '$uwagi_selekcja2', '$uwagi_selekcja3', '$suma_selekcja', 
            '$ocena_systematyka1', '$ocena_systematyka2', '$ocena_systematyka3', '$ocena_systematyka4', '$ocena_systematyka5',
            '$uwagi_systematyka1', '$uwagi_systematyka2', '$uwagi_systematyka3', '$uwagi_systematyka4', '$uwagi_systematyka5', '$suma_systematyka',
            '$ocena_sprzatanie1', '$ocena_sprzatanie2', '$ocena_sprzatanie3', '$ocena_sprzatanie4', '$ocena_sprzatanie5',
            '$uwagi_sprzatanie1', '$uwagi_sprzatanie2', '$uwagi_sprzatanie3', '$uwagi_sprzatanie4', '$uwagi_sprzatanie5', '$suma_sprzatanie',
            '$ocena_standaryzacja1', '$ocena_standaryzacja2', '$ocena_standaryzacja3',
            '$uwagi_standaryzacja1', '$uwagi_standaryzacja2',  '$uwagi_standaryzacja3', '$suma_standaryzacja',
            '$ocena_samodyscyplina1', '$ocena_samodyscyplina2', '$ocena_samodyscyplina3',
            '$uwagi_samodyscyplina1', '$uwagi_samodyscyplina2', '$uwagi_samodyscyplina3', '$suma_samodyscyplina', '$suma');");


            error_reporting(0);
            $phpFileUploadErrors = array(
                0 => 'There is no error, the file uploaded with success',
                1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                3 => 'The uploaded file was only partially uploaded',
                4 => 'No file was uploaded',
                6 => 'Missing a temporary folder',
                7 => 'Failed to write file to disk.',
                8 => 'A PHP extension stopped the file upload.',
            );

                $file_array = reArrayFiles($_FILES['userfile']);
                //pre_r($file_array);
                for($i=0;$i<count($file_array);$i++){
                    if($file_array[$i]['error']){
                        ?> <div class="alrt alert-danger">
                            <?php echo $file_array[$i].' - '. $phpFileUploadErrors[$file_array[$i]['error']]; ?>
                        </div>
                        <?php
                    }
                    else {
                        $extensions = array('jpg', 'png', 'gif', 'jpeg');
                        $file_ext = explode('.', $file_array[$i]['name']);
                        $file_ext = end($file_ext);

                        if(!in_array($file_ext, $extensions)){
                            ?> <div class="alert alert-danger">
                                <?php echo "{$file_array[$i]['name']} - Invalid file extension"; ?>
                            </div>
                            <?php
                        }
                        else {
                            move_uploaded_file($file_array[$i]['tmp_name'], "zdjecia/".$file_array[$i]['name']);
                            ?> <div class="alert alert-success">
                                <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                                ?>
                            </div>
                            <?php
                        }
                    }
            }
    }
    else{
        die("Nie wybrano zdjecia");
        header("Location: index.php");
    }
?>
<script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js1/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>