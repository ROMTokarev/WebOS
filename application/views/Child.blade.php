<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ isset($title) ? $title : 'N/A' }}</title>
<link href="public/css/screen.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="public/css/style.css">

<link rel="stylesheet" href="public/css/bootstrap.min.css">
<link rel="stylesheet" href="public/css/AdminLTE.css">

<link rel="stylesheet" href="public/css/Load.css">

<script type='text/javascript' src='public/js/base64.js'></script>
<script type='text/javascript' src='public/js/jquery-3.1.1.min.js'></script>
<script type='text/javascript' src='public/js/todo.js'></script>
<script type='text/javascript' src='public/js/FullScreen.js'></script>
<script type='text/javascript' src='public/js/MesseageBox.js'></script>
<script type='text/javascript' src='public/js/gateway.js'></script>

</head>
<body>

    @include("layout/header")

       @include("$content") 
	
    @include("layout/footer")

<script type='text/javascript' src='public/js/Time.js'></script>

</body>
</html>