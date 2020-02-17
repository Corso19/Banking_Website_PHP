<?php

require_once 'core/init.php';

$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate;
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max=>50'
            )
        ));

        if ($validation->passed()) {
            try {
                $user->update(array(
                    'username'=>Input::get('username'),
                    'nume'=>Input::get('nume'),
                    'prenume'=>Input::get('prenume'),
                    'email'=>Input::get('email')
                ));

                Session::flash('home', 'Your details has been updated!');
                Redirect::to('main.php');
            } catch (Exception $e) {
                die($e->getMessage());
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
                <h2>Update account</h2>
                <div class="field">
                    <input type="text" name="username" value="<?php echo escape($user->data()->username) ?>">
                </div>
                <div class="field">
                    <input type="text" name="nume" value="<?php echo escape($user->data()->nume) ?>">
                </div>
                <div class="field">
                    <input type="text" name="prenume" value="<?php echo escape($user->data()->prenume) ?>">
                </div>
                <div class="field">
                    <input type="email" name="email" value="<?php echo escape($user->data()->email) ?>">
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit" value="update">Update</button>
            </form>

        </div>
    </div>