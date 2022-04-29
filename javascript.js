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

let navButton = document.getElementsByClassName("nav-link");
navButton.onmouseover = function () {
  navButton.toggle("fade");
};
