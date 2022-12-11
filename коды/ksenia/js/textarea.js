function zhaloba(id){
    var ID = document.getElementById("ID").value;
    var zhaloba = document.getElementById(id).value;

    const request = new XMLHttpRequest();
    const url = "addAnamnez.php";

    params = "ID=" + ID + '&Zhaloba=1' + '&Text=' + zhaloba;
    
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    request.addEventListener("readystatechange", () => {

        if(request.readyState === 4 && request.status === 200) {       
            console.log(request.responseText);
        }
    });

    request.send(params);
}
function anamnez(id){
    var ID = document.getElementById("ID").value;
    var anamnez = document.getElementById(id).value;
    const request = new XMLHttpRequest();
    const url = "addAnamnez.php";

    params = "ID=" + ID + '&Anamnez=1' + '&Text=' + anamnez;
    
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    request.addEventListener("readystatechange", () => {

        if(request.readyState === 4 && request.status === 200) {       
            console.log(request.responseText);
        }
    });

    request.send(params);
}