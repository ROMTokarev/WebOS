<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Install Bit-Panel</title>
<link href="public/auth/screen.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='public/auth/js/jquery-1.3.2.js'></script>
<script type='text/javascript' src='public/auth/js/todo.js'></script>
<script type="text/javascript">
        $(document).ready(function() {
          $("#loginform").toggle();
            $(document).mouseup(function() {
				
				$('#username').click(function() {
                   $('#username').focus(); 
                });
				
				$('#password').click(function() {
                   $('#password').focus();
                });
				
				$('#confirm_password').click(function() {
                   $('#confirm_password').focus();
                });
				
				

                
            });
			
			
				$("input#signin_submit").click(function() {
					
					if(signin.username.value == '' || signin.password.value == '' ||
					   signin.confirm_password.value == '' || signin.miner_ip.value == '' ||
					   signin.miner_port.value == '') {
		            	alert("You must fill in all fields.");
		             	return false;
		            }
					
					if(signin.password.value != signin.confirm_password.value) {
		            	alert("Incorrect password confirmation.");
		             	return false;
		            }

					$('form#signin').submit();
			    });	
		
			
			
        });
		
		
</script>
</head>
<body><div id="MBox"></div>
<div id="cont">

  
  <div id="loginform" class="box form" style="margin-top: -208px!important;">
  <div id="element3" style="width: 387px; position: absolute;">
    <h2>Install Form</h2>
    <div class="formcont">
      <fieldset id="signin_menu"  style="height: 220px!important;">
      <span class="message">Please complete all fields settings</span>
      <form method="post" id="signin" action="/install/started">
	    <p>
        <label for="username">Username</label>
        <input id="username" name="username" value="" title="username" class="required" tabindex="4" type="text">
        </p>
        <p>
          <label for="password">Password</label>
          <input id="password" name="password" value="" title="password" class="required" tabindex="5" type="password">
        </p>
		<p>
          <label for="confirm_password">Confirm password</label>
          <input id="confirm_password" name="confirm_password" value="" title="confirm_password" class="required" tabindex="6" type="password">
        </p>
        <p class="clear"></p>
        <p class="remember">
          <input id="signin_submit" value="Install" tabindex="9" type="submit">
        </p>
      </form>
      </fieldset>
    </div>
    <div class="formfooter"></div>
  </div>
</div>
</div>
<!-- Begin Full page background technique -->
<div id="bg">
  <div>
    <table cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="public/auth/images/bg.jpg" alt=""/> </td>
      </tr>
    </table>
  </div>
</div>
<!-- End Full page background technique -->

<script type="text/javascript">// <![CDATA[
		todo.onload(function(){
			var e=todo.get('element3')
			e.style.left=e.offsetLeft+'px';
			e.style.top=e.offsetTop+'px';
			todo.drag(e);
		});
// ]]></script>


</body>
</html>