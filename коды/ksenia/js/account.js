function oklad(id){
    var Dolzhnost = document.getElementById("dolzhnost").value;
    var oklad = document.getElementById(id).value;

    const request = new XMLHttpRequest();
    const url = "addOklad.php";

    params = "Dolzhnost=" + Dolzhnost + '&Oklad=' + oklad + '&OkladReq=1';
    
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    request.addEventListener("readystatechange", () => {

        if(request.readyState === 4 && request.status === 200) {       
            console.log(request.responseText);
        }
    });

    request.send(params);
}
function dolzhnost(id){
    var ID = document.getElementById("ID").value;
    var Dolzhnost = document.getElementById(id).value;

    const request = new XMLHttpRequest();
    const url = "addOklad.php";

    params = "Dolzhnost=" + Dolzhnost + '&ID=' + ID + '&DolzhostReq=1';
    
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    request.addEventListener("readystatechange", () => {

        if(request.readyState === 4 && request.status === 200) {       
            console.log(request.responseText);
        }else{
            alert('у нас беда, такой должности нет.');
        }
    });

    request.send(params);
}
function qualifi(id){
    var ID = document.getElementById("ID").value;
    var Qualif = document.getElementById(id).value;
    Qualif = Qualif.split("-")[0];

    const request = new XMLHttpRequest();
    const url = "addOklad.php";

    params = "Qualif=" + Qualif + '&ID=' + ID + '&QualifiReq=1';
    
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    request.addEventListener("readystatechange", () => {

        if(request.readyState === 4 && request.status === 200) {       
            console.log(request.responseText);
        }
    });

    request.send(params);
}