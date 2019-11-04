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
    <title>Welcome to Musixbox!</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>

</head>
<body>

<?php

if (isset($_POST['registerButton'])) {
    echo '<script>

    $(document).ready(function () {

        $("#loginForm").hide();
        $("#registerForm").show();

    });

</script>';
} else {
    echo '<script>

    $(document).ready(function () {

        $("#loginForm").show();
        $("#registerForm").hide();

    });

</script>';
}

?>


<div id="background">

    <div id="loginContainer">

        <div id="logo">
            <h1>musix<span id="sub_logo">box</span></h1>
        </div>

        <div id="inputContainer">

            <!--login form-->
            <form action="register.php" id="loginForm" method="post">
                <h2>Login to your account</h2>

                <p>
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <label for="loginUsername">Username</label>
                    <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. Bart Simpson"
                           value="<?php getInputValue('loginUsername'); ?>" required>
                </p>

                <p>
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
                </p>

                <button type="submit" name="loginButton">LOG IN</button>

                <div class="hasAccountText">

                    <span id="hideLogin">Don't have a account yet? Sign up here.</span>

                </div>

            </form>

            <!--    register form-->
            <form action="register.php" id="registerForm" method="post">
                <h2>Create your free account</h2>

                <p>
                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>


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
                    <?php echo $account->getError(Constants::$emailTaken); ?>


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

                <div class="hasAccountText">

                    <span id="hideRegister">Already have a n account? Log in here.</span>

                </div>

            </form>

        </div>

        <div id="loginText">

            <h1>Get great music, right now</h1>
            <h2>Listen to loads of songs for free</h2>

            <ul>
                <li>Discover great music you'll fall in love with</li>
                <li>Create your own playlist</li>
                <li>Follow artist to keep up to date</li>
            </ul>

        </div>


    </div>

</div>

</body>
</html>