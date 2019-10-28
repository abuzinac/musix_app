<?php

include("includes/config.php");

//session_destroy(); LOGOUT

if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location: register.php");
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to musixbox!</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<div id="nowPlayingBarContainer">

    <div id="nowPlayingBar">

    </div>

</div>

</body>
</html>