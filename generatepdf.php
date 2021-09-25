<?php

require 'tfpdf/tfpdf.php';
include("connection.php");
if(isset($_POST['pdf_report_generate']) && !$_POST['okres']){
    $pdf = new TFPDF();
    $pdf -> AddPage();
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',15);
    $title = "Raport miesieczny sits";
    $pdf -> SetTitle($title);
    $pdf -> Cell(0, 10, $title, 1, 1, 'C');
    $obszary1 = $_POST['obszary1'];
    $query = mysqli_query($con, "SELECT imie, nazwisko, nazwa_obszaru, podobszar, data_audytu, zmiana, suma_selekcja, suma_systematyka, suma_sprzatanie,
        suma_standaryzacja, suma_samodyscyplina, suma FROM audyt, obszary, audytorzy WHERE audyt.audytor_id = audytorzy.id_audytora AND 
        obszary.id = audyt.obszar_id AND audyt.obszar_id = ".$obszary1. " AND audyt.miesiac = MONTH(audyt.data_audytu)");
    // Line break
    $pdf -> SetFont('DejaVu', '', 12);
    $pdf -> Ln(10);
    $pdf -> setFillColor(46, 154, 255);
    $pdf -> Cell(30, 10, 'Imię ', 1, 0, 'C',1);
    $pdf -> Cell(30, 10, 'Nazwisko ', 1, 0, 'C',1);
    $pdf -> Cell(40, 10, 'Obszar ', 1, 0, 'C',1);
    $pdf -> Cell(30, 10, 'Data ', 1, 0, 'C',1);
    $pdf -> Cell(30, 10, 'Zmiana', 1, 0, 'C',1);
    $pdf -> Cell(30, 10, 'Suma', 1, 0, 'C',1);
    $pdf -> Ln(10);
    $pdf -> SetFont('DejaVu', '', 10);
    $pdf -> setFillColor(230, 230, 230);
    while($row = mysqli_fetch_assoc($query)){
    //$last_name = iconv('UTF-8', 'ASCII//TRANSLIT', $row['nazwisko']);
    //$name = iconv('UTF-8', 'ASCII//TRANSLIT', $row['imie']);
    //$podobszar = iconv('UTF-8', 'ASCII//TRANSLIT', $row['podobszar']);
    $pdf -> Cell(30, 10, $row['imie'], 0, 0, 'C', 1);
    $pdf -> Cell(30, 10, $row['nazwisko'], 0, 0, 'C', 1);
    $pdf -> Cell(40, 10, $row['podobszar'], 0, 0, 'C', 1);
    $pdf -> Cell(30, 10, $row['data_audytu'], 0, 0, 'C', 1);
    $pdf -> Cell(30, 10, $row['zmiana'], 0, 0, 'C', 1);
    $pdf -> Cell(30, 10, $row['suma'].'%', 0, 0, 'C', 1);
    $pdf -> Ln(10);
    }
    $pdf -> Output();
}
else if(isset($_POST['pdf_report_generate']) && $_POST['okres']){
    $pdf = new TFPDF();
    $pdf -> AddPage();
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',15);
    $title = "Raport tygodniowy sits";
    $pdf -> SetTitle($title);
    $pdf -> Cell(0, 10, $title, 1, 1, 'C');
    $obszary1 = $_POST['obszary1'];
    $query = mysqli_query($con, "SELECT imie, nazwisko, nazwa_obszaru, podobszar, data_audytu, zmiana, suma_selekcja, suma_systematyka, suma_sprzatanie,
        suma_standaryzacja, suma_samodyscyplina, suma FROM audyt, obszary, audytorzy WHERE audyt.audytor_id = audytorzy.id_audytora AND 
        obszary.id = audyt.obszar_id AND audyt.obszar_id = ".$obszary1. " AND audyt.tydzien = WEEK(CURRENT_DATE()) ORDER BY suma");
    // Line break
    $pdf -> SetFont('DejaVu', '', 12);
    $pdf -> Ln(10);
    $pdf -> setFillColor(46, 154, 255);
    $pdf -> Cell(30, 10, 'Imie ', 1, 0, 'C',1);
    $pdf -> Cell(30, 10, 'Nazwisko ', 1, 0, 'C',1);
    $pdf -> Cell(40, 10, 'Podbszar ', 1, 0, 'C',1);
    $pdf -> Cell(30, 10, 'Data ', 1, 0, 'C',1);
    $pdf -> Cell(30, 10, 'Zmiana', 1, 0, 'C',1);
    $pdf -> Cell(30, 10, 'Suma', 1, 0, 'C',1);
    $pdf -> Ln(10);
    $pdf -> SetFont('DejaVu', '', 10);
    $pdf -> setFillColor(230, 230, 230);
    while($row = mysqli_fetch_assoc($query)){
    $pdf -> Cell(30, 10, $row['imie'], 0, 0, 'C', 1);
    $pdf -> Cell(30, 10, $row['nazwisko'], 0, 0, 'C', 1);
    $pdf -> Cell(40, 10, $row['podobszar'], 0, 0, 'C', 1);
    $pdf -> Cell(30, 10, $row['data_audytu'], 0, 0, 'C', 1);
    $pdf -> Cell(30, 10, $row['zmiana'], 0, 0, 'C', 1);
    $pdf -> Cell(30, 10, $row['suma'].'%', 0, 0, 'C', 1);
    $pdf -> Ln(10);
    }
    $pdf -> Output();
}