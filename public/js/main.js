
document.getElementsByTagName("body")[0].addEventListener("click", function( event ) {

    let site_page = location.href ;
    let data = 'api_key=JKhjkAHSh9789987ASHJJKS2675Gghsgdv87667as8ad&site_page=' + site_page +
        // '&click_count='+ event.detail +
        '&coordinate_X='+event.screenX+'&coordinate_Y='+event.screenY;
    let url = 'http://clickanalytic.loc/api/click-analytic-system';

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", url);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xhttp.setRequestHeader("Content-type", "text/html");
    // xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
    xhttp.send(data);

}, false);
