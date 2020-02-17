<?php
require_once 'core/init.php';

$user=new User();

if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}

if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate=new Validate();
        $validation=$validate->check($_POST, array(
            'password_current'=>array(
                'required'=>true,
                'min'=>6
            ),
            'password_new'=>array(
                'required' => true,
                'min' => 6,

            ),
            'password_new_again'=>array(
                'required' => true,
                'min' => 6,
                'matchs'=>'password_new'
            ),
        ));

        if($validation->passed()){
            if(Input::get('password_current')!==$user->data()->password){
                echo 'Your current password is wrong';
            } else {
                $user->update(array(
                    'password'=>Input::get('password_new')
                ));

                Session::flash('home', 'Your password has been changed!');
                Redirect::to('main.php');
            }
        } else {
            foreach($validation->errors() as $error){
                echo $error,' / ';
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
                <h2>Change password</h2>
                <div class="field">
                    <input type="password" name="password_current" placeholder="Current password">
                </div>
                <div class="field">
                    <input type="password" name="password_new" placeholder="New password">
                </div>
                <div class="field">
                    <input type="password" placeholder="New password again" name="password_new_again">
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit" value="update">Change</button>
            </form>

        </div>
    </div>