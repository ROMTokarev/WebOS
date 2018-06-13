function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function TimeHeader() {
    var d = new Date();
    var x = document.getElementById("clock");
    var h = addZero(d.getHours());
    var m = addZero(d.getMinutes());
    var s = addZero(d.getSeconds());
    x.innerHTML = h + ":" + m + ":" + s;
}

	TimeHeader();	

setInterval(TimeHeader, 900);