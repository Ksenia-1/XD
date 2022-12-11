function deleteworker(id){
    ID = document.getElementById(id).value;
    
    const request = new XMLHttpRequest();
    const url = "deleteWork.php";

    params = "ID=" + ID;
    
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    request.addEventListener("readystatechange", () => {

        if(request.readyState === 4 && request.status === 200) {       
            console.log(request.responseText);
        }
    });

    request.send(params);
}