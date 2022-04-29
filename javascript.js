/*
B1. A dynamic greeting - the website should greet your users with the phrase, "Good morning", "Good afternoon", or "Good evening" depending on the LOCAL time of your user.

B2. Change in button style for the currently selected button (consider fadeIn, fadeOut or fadeToogle)

B3. A menu that slides down or out from the Left or Top of the screen (slideDown, slideUp, slideToggle).
*/

var d = new Date();
var time = d.getHours();

if (time < 12) {
    alert("Good morning!");
}
if (time > 12 & time < 17) {
    alert("Good afternoon!");
}
if (time > 17) {
    alert("Good evening!");
}

var alerted = localStorage.getItem('alerted') || '';
if (alerted != 'yes') {
    alert("My alert.");
    localStorage.setItem('alerted','yes');
}

/*
function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";

}

var alerted = getCookie('alerted') || '';
if (alerted != 'yes') {
    createCookie('alerted','yes',1);//cookies expires after 1 day
 }

*/