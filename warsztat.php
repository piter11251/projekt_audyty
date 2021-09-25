<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);
$user_personal_data = user_personal_data($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Audyt Warsztat</title>
    <link rel="stylesheet" href="main.css">
    <meta http-equiv="refresh" content="1200;url=logout.php" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    
    <button class="btn btn-secondary" onclick="window.location=('logout.php')">Wyloguj</button>
    <button class="btn btn-primary" onclick="window.location=('index.php')">Wróć do strony głównej</button>
    <h1>Audyt Warsztat</h1>

     
    Cześć, <?php echo $user_personal_data['imie'];?>

    <div>
         
        <form method="post" action="retrieve_data.php">
        Podobszar: <br>
        <div style="width: 20%;" class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active"><input type="radio" name="podobszar" value="Warsztat" checked>Warsztat</label>
        </div>   
        <br>  
        <br>
        <input type="file" name="fileToUpload">
        <br>
        Która zmiana?<br>
        <select name="zmiana">
            <option value="A">1 zmiana</option>
            <option value="B">2 zmiana</option>
            <option value="C">3 zmiana</option>
        </select>
        <input type="hidden" name="obszar_id" value=8 checked>
        <table style="width: 100%; border-collapse: collapse;" border="1" class="table table-condensed">
        <thead>
            <tr>
                <td rowspan="3" style="width: 24.9717%;"></td>
                <td colspan="3" style="width: 24.8696%;">Audytor</td>
                <td style="width: 25.0000%;">Tydzień</td>
                <td style="width: 25.0000%;">Data</td>
            </tr>
            <tr>
                <td colspan="3" style="width: 24.8696%;"><?php echo $user_personal_data['imie']." ".$user_personal_data['nazwisko']; ?></td>
                <td style="width: 25.0000%;"><?php echo date('Y') . date('W'); ?></td>
                <td style="width: 25.0000%;"><input style="width: 99%;" type="date" name="dzienAudytu" value=<?php echo date('Y'). '-'. date('m'). '-' . date('d');?> </td>
            </tr>
            <tr>
                <td colspan="3" style="width: 24.8696%;">Ocena</td>
                <td style="width: 25.0000%;">Uwagi/problemy</td>
                <td style="width: 25.0000%;">Suma</td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">1. Selekcja</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;">0 </td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;">1 </td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;">2 </td>
                <td style="width: 8%;"> </td>
                <td style="width: 8%;"> </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 24.9717%;">1.Czy usunięto wszystkie niepotrzebne, niebezpiecznie oraz uszkodzone przedmioty ze stanowiska pracy?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSelekcja1" value=0></label></td>    
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSelekcja1" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSelekcja1" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSelekcja1" name="uwagiSelekcja1" class="uwagi"></textarea> </td>
                <td rowspan="3" style="width: 24.9206%;"><p id="resultSelekcja" name="resultSelekcja"></p></td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">2.Czy na przejściach/drogach nie ma zbędnych elementów? Czy przejścia/drogi nie są zastawione?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSelekcja2" value=0></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSelekcja2" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSelekcja2" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSelekcja2" name="uwagiSelekcja2" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">3.Czy regały szafki szuflady są uporządkowane także w środku?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSelekcja3" value=0></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSelekcja3" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSelekcja3" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSelekcja3" name="uwagiSelekcja3" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">2. Systematyka</td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">1.Czy wszystkie urządzenia, substancje, narzędzia w tym modełka listwy są czyste i sprawne oraz oznakowane?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka1" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka1" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka1" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSystematyka1" name="uwagiSystematyka1" class="uwagi"></textarea> </td>
                <td rowspan="5" style="width: 24.9206%;"><p id="resultSystematyka"></p></td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">2.Czy przewody, kable i instalacja  są uporządkowane i prawidłowo przymocowane?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka2" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka2" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka2" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSystematyka2" name="uwagiSystematyka2" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">3.Czy na stanowisku pracy nie ma nadmiernych zapasów: surowców,  komponentów, półfabrykatów, wyrobów? </td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka3" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka3" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka3" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSystematyka3" name="uwagiSystematyka3" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">4.Czy na stanowisku nie ma rzeczy osobistych oraz jedzenia i picia? Czy są wyznaczone miejsca do ich przechowywania ?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka4" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka4" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka4" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSystematyka4" name="uwagiSystematyka4" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">5.Czy wszystkie „braki” są oznaczone i składowane w wyznaczonych pojemnikach (izolatoy braków)?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka5" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka5" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSystematyka5" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSystematyka5" name="uwagiSystematyka5" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">3. Sprzątanie</td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">1.Czy powierzchnie budynku (podłoga, ściany, kabiny) są czyste i w dobrym stanie?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie1" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie1" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie1" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSprzatanie1" name="uwagiSprzatanie1" class="uwagi"></textarea> </td>
                <td rowspan="5" style="width: 24.9206%;"><p id="resultSprzatanie"></p></td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">2.Czy obudowy maszyn są kompletne, nieuszkodzone oraz czyste? Czy osłony bezpieczeństwa są w dobrym stanie ?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie2" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie2" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie2" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSprzatanie2" name="uwagiSprzatanie2" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">3.Czy półki, biurka, stanowiska pracy, oprzyrządowanie oraz wózki narzędziowe są czyste i w dobrym stanie?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie3" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie3" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie3" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSprzatanie3" name="uwagiSprzatanie3" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">4.Czy przybory do sprzątania są czyste oraz kosze na śmieci są kompletne, nieuszkodzone, opisane oraz znajdują się na swoim miejscu?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie4" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie4" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie4" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSprzatanie4" name="uwagiSprzatanie4" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">5.Czy odpady są segregowane ?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie5" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie5" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSprzatanie5" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSprzatanie5" name="uwagiSprzatanie5" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">4. Standaryzacja</td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">1.Czy miejsca na obszarze są oznaczone i przeprowadzone zgodnie ze standardem (według kodu kolorów)? Czy oznaczenie są czytelne ?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueStandaryzacja1" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueStandaryzacja1" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueStandaryzacja1" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiStandaryzacja1" name="uwagiStandaryzacja1" class="uwagi"></textarea> </td>
                <td rowspan="3" style="width: 24.9206%;"><p id="resultStandaryzacja"></p></td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">2.Czy do wszystkich sprzętów p.poż.(gaśnic i hydrantów przeciwpożarowych) jest swobodny dostęp(nic nie stoi w obszarze)? Czy gaśnica znajduje się w wyznaczonym miejscu ?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueStandaryzacja2" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueStandaryzacja2" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueStandaryzacja2" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiStandaryzacja2" name="uwagiStandaryzacja2" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">3.Czy tablice i instrukcje na obszarze są czyste, kompletne i aktualne (dotyczy wszystkich tablic na obszarze) ?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueStandaryzacja3" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueStandaryzacja3" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueStandaryzacja3" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiStandaryzacja3" name="uwagiStandaryzacja3" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">5. Samodyscyplina</td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">1.Czy pracownicy noszą ubrania i buty robocze? </td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSamodyscyplina1" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSamodyscyplina1" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSamodyscyplina1" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSamodyscyplina1" name="uwagiSamodyscyplina1" class="uwagi"></textarea> </td>
                <td rowspan="3" style="width: 24.9206%;"><p id="resultSamodyscyplina"></p></td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">2.Czy pracownicy stosują w miejscach do tego wyznaczonych środki ochrony osobistej (np. ochronniki słuchu) ?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSamodyscyplina2" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSamodyscyplina2" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSamodyscyplina2" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSamodyscyplina2" name="uwagiSamodyscyplina2" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td style="width: 24.9717%;">3.Czy zostały usunięte niezgodności z poprzedniego audytu?</td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSamodyscyplina3" value=0 ></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSamodyscyplina3" value=1></label></td>
                <td style="width: 8.33%; vertical-align: middle; text-align: center;"><label><input type="radio" name="valueSamodyscyplina3" value=2 checked></label></td>
                <td style="width: 25.0000%;"><textarea id="uwagiSamodyscyplina3" name="uwagiSamodyscyplina3" class="uwagi"></textarea> </td>
            </tr>
            <tr>
                <td>Suma</td>
                <td colspan="4"></td>
                <td><p id="resultSuma"></p></td>
            </tr>
            <tr>
                <td colspan="6">
                    Ocena: 2 – wymaganie spełnione, brak niezgodności, 1- wymagania cześciowo spełnione, 1 niezgodność  0 - wymaganie nie spełnione, więcej niż jedna niezgodność
                </td>
            </tr>
        </tbody>
        </table>
        <input type="submit" name="przeslij" value="Wyslij" class="btn btn-primary">
        </form>
        <button onclick="displayData()" class="btn btn-secondary">Sprawdzic dane?</button>
    </div>
    <script src="functions1.js"></script>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js1/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>