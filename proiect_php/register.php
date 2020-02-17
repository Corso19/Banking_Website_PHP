<?php
require_once './core/init.php';


if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 50,
                'unique' => 'users'
            ),
            'password' => array(
                'required' => true,
                'min' => 6,
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password',
            ),
            'nume' => array(
                'required' => true,
                'min' => 2,
                'max' => 30,

            ),
            'prenume' => array(
                'required' => true,
                'min' => 2,
                'max' => 30,

            ),
            'email' => array(
                'required' => true,
                'min' => 2,
                'max' => 255,
                'unique' => 'users'
            ),
        ));

        if ($validation->passed()) {
            $user = new User;
            try {
                $user->create(array(
                    'username' => Input::get('username'),
                    'nume' => Input::get('nume'),
                    'prenume' => Input::get('prenume'),
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                ));

                Session::flash('home', 'You have been registered and can login now!');
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
            <form class="register-form" action="" method="post">
                <input type="text" name="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" placeholder="Username">
                <input type="password" name="password" value="" placeholder="Password">
                <input type="password" name="password_again" value="" placeholder="Confirm Password">
                <input type="text" placeholder="nume" name="nume" value="<?php echo escape(Input::get('nume')); ?>">
                <input type="text" placeholder="prenume" name="prenume" value="<?php echo escape(Input::get('prenume')); ?>">
                <input type="email" placeholder="email" name="email">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit">Creaza cont</button>
                <p class="message">Ai deja un cont? <a href="index.php">Login</a></p>
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