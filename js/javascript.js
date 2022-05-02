/*
B2. Change in button style for the currently selected button (consider fadeIn, fadeOut or fadeToogle)

D5. A Javascript object
*/

//TIME OF DAY ALERT
var d = new Date();
var time = d.getHours();
var alerted = localStorage.getItem('alerted') || '';


/*check if user has already recieved time alert
to ensure they don't recieve everytime they go to home page*/
if (alerted != 'yes') {
    localStorage.setItem('alerted','yes');
    if (time < 12) {
        alert("Good morning!");
    }
    if (time > 12 & time < 17) {
        alert("Good afternoon!");
    }
    if (time > 17) {
        alert("Good evening!");
    }
}


//BUTTON FADE OUT

//each button needs its own goddamn id. create a new class for the 'faded button'


//MENU SLIDEUP AND DOWN
//makes element distinguished by ID "slide up"
function slideUpID(el) {
    var element = document.getElementById(el);
    element.style.height = "0px";
    element.style.opacity = 0;
    //move body up to accompany menu sliding up
    document.getElementsByClassName("flex-parent").item(0).style.marginTop = "35px";
}
//makes element distinguished by class "slide up"
function slideUpClass(cl) {
    var elements = document.getElementsByClassName(cl);
    for (var i = 0; i < elements.length; i++) {
        elements.item(i).style.fontSize = "0px";
    }
}
//makes element distinguished by ID "slide down"
function slideDownID(el) {
    var element = document.getElementById(el);
    element.style.height = "inherit";
    element.style.opacity = 100;
    //move body down to accompany menu sliding down
    document.getElementsByClassName("flex-parent").item(0).style.marginTop = "100px";
}
//makes element distinguished by class "slide down"
function slideDownClass(cl) {
    var elements = document.getElementsByClassName(cl);
    for (var i = 0; i < elements.length; i++) {
        elements.item(i).style.fontSize = "x-large";
    }
}

