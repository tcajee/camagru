<!DOCTYPE HTML>
<html>
<head>
  <title>Camagru | Password Reset</title>
  <meta name="description" content="Camagru - a basic Instagram clone" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="expires" content="0">
  <link rel="stylesheet" type="text/css" href="../style/style.css" title="style" />
</head>
<body>

<div id="main">
      <div id="navbar">
        <ul id="menu">
        <li><a href="index.php">pic</a></li>
          <li><a href="#">pipe</a></li>
          <li><a href="#">logo</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div id="login">
    <form method="post" action="pass_reset_func.php">
        <label id="login">Passwords must match</label>
        <br />
        <label id="login">Choose New Password: </label><input class="login_submit" type="password" name="new_passwd" value="" />
        <br />
        <br />
        <label id=login>Retype New Password: </label><input class="login_submit" type="password" name="new_passwd_re" value="" />
        <br />
        <br />
        <div id=login>
            <input class="login_submit" type="submit" name="submit" value="OK"/>
        </div>
    </form>
</div>
</body>
</html>