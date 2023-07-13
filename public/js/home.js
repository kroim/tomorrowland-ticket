
var notify_num = 35 + Math.floor(Math.random()*10);
$("#home-notification").html("Now, " + notify_num + " other people are visiting this site");

var t_notify_num = 9 + Math.floor(Math.random()*3);
$("#package-notification").html("Less than "+t_notify_num+"% tickets remaining.");

var close = document.getElementsByClassName("closebtn");
for (var i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}

