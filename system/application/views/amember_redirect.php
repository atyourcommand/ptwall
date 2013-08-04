<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Redirecting...</title>

<script>

<!--

function SubMe(){document.getElementById("redirect").submit();
}

// -->

</script>
</head>

<body onLoad=SubMe()>
<form  id="redirect" action="/amember/member.php" method=post>
<input id="login" type="hidden" name="amember_login" value="<?php echo $login ?>" /> 
<input id="pass" type="hidden" name="amember_pass" value="<?php echo $pass ?>" /> 
<input type="hidden" name="login_attempt_id" value="1276790789" /> 
</form>
</body>
</html>
