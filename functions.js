function displayData(){
    var selekcja = checkDataOfSelekcja();

    if(selekcja >= 1)
        document.getElementById("resultSelekcja").innerHTML = selekcja+"0%";
    else if(selekcja<1)
        document.getElementById("resultSelekcja").innerHTML = selekcja+"%";

    var systematyka = checkDataOfSystematyka();

    if(systematyka >= 1)
        document.getElementById("resultSystematyka").innerHTML = systematyka+"0%";
    else if(systematyka<1)
        document.getElementById("resultSystematyka").innerHTML = systematyka+"%";

    var sprzatanie = checkDataOfSprzatanie();
    if(sprzatanie >= 1)
        document.getElementById("resultSprzatanie").innerHTML = sprzatanie+"0%";
    else if(sprzatanie<1)
        document.getElementById("resultSprzatanie").innerHTML = sprzatanie+"%";

    var standaryzacja = checkDataOfStandaryzacja();
    if(standaryzacja >=1)
        document.getElementById("resultStandaryzacja").innerHTML = standaryzacja+"0%";
    else if(standaryzacja<1)
        document.getElementById("resultStandaryzacja").innerHTML = standaryzacja+"%";
    
    var samodyscyplina = checkDataOfSamodyscyplina();
    if(samodyscyplina >=1)
        document.getElementById("resultSamodyscyplina").innerHTML = samodyscyplina+"0%";
    else if(samodyscyplina<1)
        document.getElementById("resultSamodyscyplina").innerHTML = samodyscyplina+"%";

}
    function checkDataOfSelekcja(){
        var r1 = document.querySelector('input[type=radio][name=valueSelekcja1]:checked').value;
        var r2 = document.querySelector('input[type=radio][name=valueSelekcja2]:checked').value;
        var r3 = document.querySelector('input[type=radio][name=valueSelekcja3]:checked').value;
        var ocena = Math.min(r1,r2,r3);
        return ocena;
    }
    function checkDataOfSystematyka(){
        var r1 = document.querySelector('input[type=radio][name=valueSystematyka1]:checked').value;
        var r2 = document.querySelector('input[type=radio][name=valueSystematyka2]:checked').value;
        var r3 = document.querySelector('input[type=radio][name=valueSystematyka3]:checked').value;
        var r4 = document.querySelector('input[type=radio][name=valueSystematyka4]:checked').value;
        var r5 = document.querySelector('input[type=radio][name=valueSystematyka5]:checked').value;
        var ocena = Math.min(r1,r2,r3,r4,r5);
        return ocena;
    }
    function checkDataOfSprzatanie(){
        var r1 = document.querySelector('input[type=radio][name=valueSprzatanie1]:checked').value;
        var r2 = document.querySelector('input[type=radio][name=valueSprzatanie2]:checked').value;
        var r3 = document.querySelector('input[type=radio][name=valueSprzatanie3]:checked').value;
        var r4 = document.querySelector('input[type=radio][name=valueSprzatanie4]:checked').value;
        var r5 = document.querySelector('input[type=radio][name=valueSprzatanie5]:checked').value;
        var ocena = Math.min(r1,r2,r3,r4,r5);
        return ocena;
    }
    function checkDataOfStandaryzacja(){
        var r1 = document.querySelector('input[type=radio][name=valueStandaryzacja1]:checked').value;
        var r2 = document.querySelector('input[type=radio][name=valueStandaryzacja2]:checked').value;
        var r3 = document.querySelector('input[type=radio][name=valueStandaryzacja3]:checked').value;
        var ocena = Math.min(r1,r2,r3);
        return ocena;
    }
    function checkDataOfSamodyscyplina(){
        var r1 = document.querySelector('input[type=radio][name=valueSamodyscyplina1]:checked').value;
        var r2 = document.querySelector('input[type=radio][name=valueSamodyscyplina2]:checked').value;
        var r3 = document.querySelector('input[type=radio][name=valueSamodyscyplina3]:checked').value;
        var ocena = Math.min(r1,r2,r3);
        return ocena;
    }