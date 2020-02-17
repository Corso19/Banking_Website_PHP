<?php
include './core/init.php';
include 'classes/Connection.php';
include 'classes/Cheltuieli.php';
include 'classes/Venituri.php';
include 'classes/Html.php';
$venituri_totale = $_SESSION['suma_venituri'];
$cheltuieli_totale = $_SESSION['suma_cheltuieli'];
if ($cheltuieli_totale > 0)
    $procent = (($cheltuieli_totale /  $venituri_totale) * 100);
else
    $procent = 0;


if (Session::exists('home')) {
    echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if ($user->isLoggedIn()) {
?>
    <div class="topper">
        <p>Hello <?php echo escape($user->data()->username); ?>!</p>
        <ul>
            <li><a href="update.php">Update Username</a></li>
            <li><a href="changepassword.php">Change password</a></li>
        </ul>
    </div>
<?php
} else {
    echo '<p>You need to <a href="index.php">log in</a> or <a href="register.php">register</a></p>';
}

?>

<!DOCTYPE html>
<html lang="ro">

<head>

    <meta charset="UTF-8">
    <title>Budget App</title>
    <link rel="shortcut icon" href="./storage/icon.png" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./css/index-style.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600" rel="stylesheet" type="text/css">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="top">
        <div class="budget">
            <div class="budget__title">
                Buget disponibil pentru <span class="budget__title--month">Noiembrie 2019</span>:
            </div>

            <!-- BUGET DISPONIBIL -->
            <div class="budget__value">+ <?php echo abs((int) $venituri_totale -  (int) $cheltuieli_totale) ?></div>

            <!-- TOTAL VENITURI -->
            <div class="budget__income clearfix">
                <div class="budget__income--text">Venituri</div>
                <div class="right">
                    <div class="budget__income--value">+ <?php echo (int) $venituri_totale ?></div>
                    <div class="budget__income--percentage">&nbsp;</div>
                </div>
            </div>

            <!-- TOTAL CHELTUIELI -->
            <div class="budget__expenses clearfix">
                <div class="budget__expenses--text">Cheltuieli</div>
                <div class="right clearfix">
                    <div class="budget__expenses--value">- <?php echo (int) $cheltuieli_totale ?></div>
                    <div class="budget__expenses--percentage"><?php echo substr($procent, 0, 2) ?>%</div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom">

        <div class="add">
            <div class="add__container">
                <!-- FORMULARE PENTRU ADAUGAREA UNUI ITEM NOU -->
                <form method="POST" action="insert.php">
                    <select class="add__type" name="option" id="option">
                        <option value="+" selected="">+</option>
                        <option value="-">-</option>
                    </select>
                    <input type="text" class="add__description" placeholder="Descriere" name="title" />
                    <input type="number" class="add__value" placeholder="Valoare" name="value" />
                    <button type="submit" class="add__btn" name="submit"><i class="ion-ios-checkmark-outline"></i></button>
                </form>
            </div>
        </div>

        <div class="container clearfix">

            <!-- LISTA VENITURI -->
            <div class="income">
                <h2 class="icome__title">Venituri</h2>

                <?php
                $venituri = new Venituri(new Html);

                $venituri->showAll()
                ?>
            </div>

            <!-- LISTA CHELTUIELI -->
            <div class="expenses">
                <h2 class="expenses__title">Cheltuieli</h2>

                <?php
                $cheltuiala = new Cheltuieli(new Html);

                $cheltuiala->showAll()
                ?>
            </div>

        </div>

    </div>

    <!-- LINK LOGOUT -->
    <a href="logout.php" class="logout" title="Logout"><i class="ion-ios-close-outline"></i></a>

</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $value = $_POST['value'];


    $sql = "INSERT INTO `venituri`(`title`,`value`) VALUES ('$title', '$value')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3> succcess </h3>";
    } else {
        echo "<h3> Failed </h3>";
    }
}

?>