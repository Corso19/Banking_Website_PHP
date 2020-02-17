<?php
include 'core/init.php';
include 'classes/Connection.php';
include 'classes/Cheltuieli.php';
include 'classes/Html.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'email' => array('required' => true),
            'password' => array('required' => true)
        ));
        if ($validation->passed()) {
            $user = new User;
            $remember = (Input::get('remember' === 'on')) ? true : false;
            $login = $user->login(Input::get('email'), Input::get('password'), $remember);

            if ($login) {
                Redirect::to('main.php');
            } else {
                echo '<p>Sorry, logging in failed!</p>';
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>

    <meta charset="UTF-8">
    <title>Budget App</title>
    <link rel="shortcut icon" href="./storage/icon.png" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="css/account-style.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600" rel="stylesheet" type="text/css">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

</head>

<body>


    <div class="login-page">
        <div class="form">
            <form action="" method="post">
                <div class="field">
                    <input type="email" placeholder="email" autocomplete="off" id="email" name="email" value="<?php if (isset($_COOKIE["email"])) {echo $_COOKIE["email"];} ?>">
                </div>
                <div class="field">
                    <input type="password" placeholder="parola" autocomplete="off" id="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
                </div>
                <label for="remember">
                    <input id="remember" type="checkbox" name="remember" id="remember" style="width: 10%;">Remember me</label>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit" value="Log in">login</button>
                <p class="message">Nu ai cont? <a href="register.php">Creaza un cont</a></p>
            </form>

        </div>
    </div>

    <style type="text/css">
        body {
            background-image: url('./storage/background.png');
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>

</body>

</html>