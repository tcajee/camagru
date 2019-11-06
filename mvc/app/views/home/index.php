<!doctype html>
<html lang="en">

<head>
    <title>Camagru | Home</title>
    <meta name="description" content="Camagru - a basic Instagram clone" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="../style/style.css" title="style" />
</head>

  <body>
    <div id="main">
        <!-- <h1> Welcome, <?=$data['name']?>!<h1> -->
        <h1> Welcome, <?=$data['name']?>!<h1>

        <div>
            <form action="Login/logout" method="post">
                <input type="submit" name="logout" value="Logout">
            </form>
        <div/>


    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>



