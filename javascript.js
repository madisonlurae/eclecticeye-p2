/*
B1. A dynamic greeting - the website should greet your users with the phrase, "Good morning", "Good afternoon", or "Good evening" depending on the LOCAL time of your user.

B2. Change in button style for the currently selected button (consider fadeIn, fadeOut or fadeToogle)

B3. A menu that slides down or out from the Left or Top of the screen (slideDown, slideUp, slideToggle).
*/

var d = new Date();
var time = d.getHours();
//var morning = alert("Good morning!");

if (time < 12) {
    alert(time);
    morning;
}
if (time > 12 & time < 17) {
    alert("Good afternoon!");
}
if (time > 17) {
    alert("Good evening!");
/*
var alerted = localStorage.getItem('alerted') || '';
if (alerted != 'yes') {
  alert("My alert.");
  localStorage.setItem('alerted','yes');
}
*/
}