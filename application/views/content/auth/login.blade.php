<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login in Bit-Panel</title>
<link href="public/auth/screen.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='public/auth/js/jquery-1.3.2.js'></script>

<script type='text/javascript' src='public/js/jquery.md5.js'></script>

<script type='text/javascript' src='public/auth/js/todo.js'></script>
<script type="text/javascript">

        $(document).ready(function() {

            $(document).mouseup(function() {

				$('#username').click(function() {
                   $('#username').focus();
                });

				$('#password').click(function() {
                   $('#password').focus();
                });

				$("a.close").click(function(e){
					e.preventDefault();
					$("#loginform").hide();
                    $(".lock").fadeIn();
				});


                if ($("#loginform").is(":hidden"))
                {
                    $(".lock").fadeOut();
                } else {
                    $(".lock").fadeIn();
                }
				$("#loginform").toggle();
            });


			// This is example of other button
			$("input#cancel_submit").click(function(e) {
					$("#loginform").hide();
                    $(".lock").fadeIn();
			});


				$("input#signin_submit").click(function() {

					if(signin.username.value == '' || signin.password.value == '') {
		            	alert("You must fill in all fields.");
		             	return false;
		            }

         signin.password.value = $.md5(signin.password.value);

					$('form#signin').submit();
			    });

        });
</script>
</head>
<body>
<div id="cont">
  <div class="box lock"> </div>

  <div id="loginform" class="box form">
  <div id="element3" style="width: 387px; position: absolute; ">
    <h2>Authorization Required <a href="" class="close">Close it</a></h2>
    <div class="formcont">
      <fieldset id="signin_menu">
      <span class="message">Please verify your account before continue</span>
      <form method="post" id="signin" action="/login">
        <label for="username">Username</label>
        <input id="username" name="username" value="" title="username" class="required" tabindex="4" type="text">
        </p>
        <p>
          <label for="password">Password</label>
          <input id="password" name="password" value="" title="password" class="required" tabindex="5" type="password">
        </p>
        <p class="clear"></p>
        <a href="#" class="forgot" id="resend_password_link">Forgot your password?</a>
        <p class="remember">
          <input id="signin_submit" value="Sign in" tabindex="6" type="submit">
          <input id="cancel_submit" value="Cancel" tabindex="7" type="button">
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
