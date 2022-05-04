/*
All javascript is located in this file
Author: Madison Bennett
Date Created: April 10th 2022
*/

//TIME OF DAY ALERT
//var dayAlerted; //could not get this to work properly. supposed to give greeting again after 1 day
/*REQUIREMENT: global variable*/
var d = new Date();
var time = d.getHours();
var alerted = localStorage.getItem('alerted') || '';


/*check if user has already recieved time alert
to ensure they don't recieve everytime they go to home page*/
/*REQUIREMENT: conditional statement*/
if (alerted != 'yes') {
    localStorage.setItem('alerted','yes');
    //dayAlerted = new Date().getDate();
    if (time < 12) {
        alert("Good morning!");
    }
    if (time > 12 & time < 17) {
        alert("Good afternoon!");
    }
    if (time > 17) {
        alert("Good evening!");
    }
} /*else if (dayAlerted) {  //make sure dayAlerted isnt null
    //users will be greeted only once per day
    if (dayAlerted != d.getDate()) {
        localStorage.setItem('alerted','no');
    }
}*/
foriegn


//BUTTON FADE OUT
function fadeout(el) {
    el.style.opacity = "75%";
    el.style.backgroundColor = "#092500";
}
//BUTTON FADE IN
function fadein(el) {
    el.style.opacity = "100%";
    el.style.backgroundColor = "transparent";
}


//MENU SLIDEUP AND DOWN
//makes element distinguished by ID "slide up"
function slideUpID(el) {
    /*REQUIREMENT: local variable*/
    var element = document.getElementById(el);
    element.style.height = "0px";
    element.style.opacity = 0;
    //move body up to accompany menu sliding up
    document.getElementsByClassName("flex-parent").item(0).style.marginTop = "35px";
}
//makes element distinguished by class "slide up"
function slideUpClass(cl) {
    /*REQUIREMENT: array*/
    var elements = document.getElementsByClassName(cl);
    /*REQUIREMENT: loop*/
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

