/*
6. Your site must support distinct layouts for large and small screens using media queries. 
Use comments to note where you completed this activity.
You may do this in a variety of ways. Consider using this to control images.

C2. Use RegEx to check passwords against a reasonable set of criteria.

C3. Your login must account for errors. You must also change the style of the incorrect form element.
You could highlight incorrect elements with a red boarder.

C4. Create a password reset. Your user information should be stored in the database and updated OR may be processed in a PHP page and simply displayed to users.


1. You should have a minimum of two tables with a PK/FK relationship. They must have a 
1:M relationship - you may add unlimited additional tables if you wish. 
2. The database should form a functional part of your website that makes sense for your 
websites’ context. For example, if you have food website, you could allow customers to 
create orders for food. If you are not sure what to do, talk to your professor. 
3. Your website should allow for the addition, display and deletion of information from the 
database. 


D5. A Javascript object
*/

//TIME OF DAY ALERT
/*REQUIREMENT: global variable*/
var dayAlerted;
var d = new Date();
var time = d.getHours();
var alerted = localStorage.getItem('alerted') || '';


/*check if user has already recieved time alert
to ensure they don't recieve everytime they go to home page*/
/*REQUIREMENT: conditional statement*/
if (alerted != 'yes') {
    localStorage.setItem('alerted','yes');
    dayAlerted = new Date().getDate();
    if (time < 12) {
        alert("Good morning!");
    }
    if (time > 12 & time < 17) {
        alert("Good afternoon!");
    }
    if (time > 17) {
        alert("Good evening!");
    }
} else if (dayAlerted) {  //make sure dayAlerted isnt null
    //users will be greeted only once per day
    if (dayAlerted != d.getDate()) {
        localStorage.setItem('alerted','no');
    }
}


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

