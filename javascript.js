/*
B1. A dynamic greeting - the website should greet your users with the phrase, "Good morning", "Good afternoon", or "Good evening" depending on the LOCAL time of your user.

B2. Change in button style for the currently selected button (consider fadeIn, fadeOut or fadeToogle)

B3. A menu that slides down or out from the Left or Top of the screen (slideDown, slideUp, slideToggle).
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
/*
navButton = new HTMLElement;
navButton = document.getElementById("nav-link");
navButton.onmouseover = function() {var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 50);
};

let navButton = document.getElementsByClassName("nav-link");
document.getElementsByClassName("nav-link").onmouseover = function () {
  navButton.classList.toggle("fade");
};
*/