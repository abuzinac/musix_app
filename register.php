<?php

include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

include("includes/handlers/register_handler.php");
include("includes/handlers/login_handler.php");

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Musix!</title>
</head>
<body>

<div id="inputContainer">

    <!--login form-->
    <form action="register.php" id="loginForm" method="post">
        <h2>Login to your account</h2>

        <p>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. Bart Simpson" required>
        </p>

        <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
        </p>

        <button type="submit" name="loginButton">LOG IN</button>

    </form>

    <!--    register form-->
    <form action="register.php" id="registerForm" method="post">
        <h2>Create your free account</h2>

        <p>
            <?php echo $account->getError(Constants::$usernameCharacters); ?>

            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="e.g. Bart Simpson"
                   value="<?php getInputValue('username'); ?>" required>
        </p>

        <p>
            <?php echo $account->getError(Constants::$firstNameCharacters); ?>

            <label for="firstName">First name</label>
            <input id="firstName" name="firstName" type="text" placeholder="e.g. Bart"
                   value="<?php getInputValue('firstName'); ?>" required>
        </p>

        <p>
            <?php echo $account->getError(Constants::$lastNameCharacters); ?>

            <label for="lastName">Last name</label>
            <input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson"
                   value="<?php getInputValue('lastName'); ?>" required>
        </p>

        <p>
            <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
            <?php echo $account->getError(Constants::$emailInvalid); ?>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com"
                   value="<?php getInputValue('email'); ?>" required>
        </p>

        <p>
            <label for="email2">Confirm email</label>
            <input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com "
                   value="<?php getInputValue('email2'); ?>" required>
        </p>

        <p>
            <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
            <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
            <?php echo $account->getError(Constants::$passwordCharacter); ?>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Your password" required>
        </p>

        <p>
            <label for="password2">Confirm password</label>
            <input id="password2" name="password2" type="password" placeholder="Confirm your password" required>
        </p>

        <button type="submit" name="registerButton">SIGN UP</button>

    </form>


</div>

</body>
</html>