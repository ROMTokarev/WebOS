function toggleFullScreen() {
  if (!document.all) {
    if (!document.fullscreenElement &&    // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
      if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullscreen) {
        document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
      }
	  document.getElementById('FullScreen').innerHTML = "<span class='icon-resize-100'></span>";
    } else {
      if (document.cancelFullScreen) {
        document.cancelFullScreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
      }
	  document.getElementById('FullScreen').innerHTML = "<span class='icon-resize-full-screen'></span>";
    }
  return 0;
 }
 var ws=new ActiveXObject("WScript.Shell"); 
 ws.SendKeys("{F11}");
}