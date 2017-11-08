function addCijfer() {

    var input = document.getElementById("cijfer").value;

    if (input > 0 && input <= 49) {
        $("#resultaat").append("Het cijfer is " + input + " en is dus onvoldoende" + "<br>");
    }
    else if (input > 49 && input <= 59) {
        $("#resultaat").append("Het cijfer is " + input + " en is dus matig" + "<br>");
    }
    else if (input > 59 && input <= 74) {
        $("#resultaat").append("Het cijfer is " + input + " en is dus voldoende" + "<br>");
    }
    else if (input > 74 && input <= 100) {
        $("#resultaat").append("Het cijfer is " + input + " en is dus goed" + "<br>");
    }
    else {
        $("#resultaat").append(" DIT IS GEEN CORRECT CIJFER!" + "<br>");
    }
}

function addCijfer2() {

    var input = document.getElementById("cijfer2").value;

    if (input > 0 && input <= 49) {
        $("#resultaat").append("De beoordeling is onvoldoende, want het cijfer is " + input + "<br>");
    }
    else if (input > 49 && input <= 59) {
        $("#resultaat").append("De beoordeling is matig, want het cijfer is " + input + "<br>");
    }
    else if (input > 59 && input <= 74) {
        $("#resultaat").append("De beoordeling is voldoende, want het cijfer is " + input + "<br>");
    }
    else if (input > 74 && input <= 100) {
        $("#resultaat").append("De beoordeling is goed, want het cijfer is " + input + "<br>");
    }
    else {
        $("#resultaat").append(" DIT IS GEEN CORRECT CIJFER!" + "<br>");
    }




    
    function toonCijfer(knop) {
        var cijfer = document.getElementById('input' + knop).value ;
        var beoordeling;

        if (input > 0 && input <= 49) {
            beoordeling = "onvoldoende";
        }
        else if (input > 49 && input <= 59) {
            beoordeling = "matig";
        }
        else if (input > 59 && input <= 74) {
            beoordeling = "voldoende";
        }
        else if (input > 74 && input <= 100) {
            beoordeling = "goed";
        }
        else {
            beoordeling = "DIT IS GEEN CORRECT CIJFER!";
        }
    }
}