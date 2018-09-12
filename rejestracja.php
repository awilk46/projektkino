<?php
session_start();
if (isset($_POST['email'])) {
    $is_validated = true;
    $login = $_POST['login'];
    if ((strlen($login) < 3) || (strlen($login) > 20)) {
        $is_validated = false;
        $_SESSION['e_login'] = "login musi posiadac od 3 do 20 znakow";
    }
    if (!ctype_alnum($login)) {
        $is_validated = false;
        $_SESSION['e_login'] = "Login musi skladac sie tylko z liter oraz cyfr";
    }
    $imieINazwisko = $_POST['imieINazwisko'];
    if ((strlen($imieINazwisko) < 3) || (strlen($imieINazwisko) > 20)) {
        $is_validated = false;
        $_SESSION['e_imieINazwisko'] = "Imie I Nazwisko musi posiadac od 3 do 20 znakow";
    }
    $email = $_POST['email'];
    $emailPrzefiltrowany = filter_var($email, FILTER_SANITIZE_EMAIL);
    if ((filter_var($emailPrzefiltrowany, FILTER_VALIDATE_EMAIL) == false) || ($emailPrzefiltrowany != $email)) {
        $is_validated = false;
        $_SESSION['e_email'] = "Musi byc poprawny adres email";
    }
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if (strlen($password1) < 8 || strlen($password1) > 25) {
        $is_validated = false;
        $_SESSION['e_password'] = "Haslo musi zawierac od 8 do 25 znakow";
    }
    if ($password1 != $password2) {
        $is_validated = false;
        $_SESSION['e_password'] = "Hasla nie sa zgodne";
    }
    $password_hash = password_hash($password1, PASSWORD_DEFAULT);
    if (!isset($_POST['regulamin'])) {
        $is_validated = false;
        $_SESSION['e_regulamin'] = "Potwierdz regulamin";
    }
    $_SESSION['fr_login'] = $login;
    $_SESSION['fr_imieINazwisko'] = $imieINazwisko;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_password1'] = $password1;
    $_SESSION['fr_password2'] = $password2;
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try {
        $connection = new mysqli($host, $db_user, $db_password, $db_name);
        $connection->set_charset("utf8");
        if ($connection->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            $result = $connection->query("SELECT id FROM uzytkownicy WHERE email = '$email'");
            if (!$result) throw new Exception($connection->error);
            if ($result->num_rows > 0) {
                $is_validated = false;
                $_SESSION['e_email'] = "Istnieje juz konto przypisane do tego adresu email!";
            }
            $result = $connection->query("SELECT id FROM uzytkownicy WHERE login = '$login'");
            if (!$result) throw new Exception($connection->error);
            if ($result->num_rows > 0) {
                $is_validated = false;
                $_SESSION['e_login'] = "Istnieje juz konto o takim loginie!";
            }
            if ($is_validated) {
                if ($connection->query("INSERT INTO uzytkownicy VALUES (NULL, '$login','$password_hash','$email','$imieINazwisko','user')")) {
                    $_SESSION['succesful_register'] = true;
                    header('Location: index.php');
                } else {
                    throw new Exception($connection->error);
                }
            }
            $connection->close();
        }
    } catch (Exception $e) {
        echo '<span style="color:red;">Blad serwera!</span>';
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="media/css/bootstrap.min.css">
    <link rel="stylesheet" href="media/css/rejestracja.css">
</head>
<body>
<form method="post" class="row">
    <div>
        <h2>Rejestracja</h2>
    </div>
    <div class="myContainer">
        <input type="text" name="login" placeholder="Login" value="<?php
        if (isset($_SESSION['fr_login'])) {
            echo $_SESSION['fr_login'];
            unset($_SESSION['fr_login']);
        }
        ?>" autofocus class="login"/>
        <?php
        if (isset($_SESSION['e_login'])) {
            echo '<div class="error">' . $_SESSION['e_login'] . '</div>';
            unset($_SESSION['e_login']);
        }
        ?>
        <br/>
        <input type="text" name="imieINazwisko" placeholder="Imie i Nazwisko" value="<?php
        if (isset($_SESSION['fr_imieINazwisko'])) {
            echo $_SESSION['fr_imieINazwisko'];
            unset($_SESSION['fr_imieINazwisko']);
        }
        ?>" class="nazwa"/>
        <?php
        if (isset($_SESSION['e_imieINazwisko'])) {
            echo '<div class="error">' . $_SESSION['e_imieINazwisko'] . '</div>';
            unset($_SESSION['e_imieINazwisko']);
        }
        ?>
        <br/>
        <input type="text" name="email" placeholder="e-mail" value="<?php
        if (isset($_SESSION['fr_email'])) {
            echo $_SESSION['fr_email'];
            unset($_SESSION['fr_email']);
        }
        ?>" class="email"/>
        <?php
        if (isset($_SESSION['e_email'])) {
            echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
            unset($_SESSION['e_email']);
        }
        ?>
        <br/>
        <input type="password" name="password1" placeholder="haslo" value="<?php
        if (isset($_SESSION['fr_password1'])) {
            echo $_SESSION['fr_password1'];
            unset($_SESSION['fr_password1']);
        }
        ?>" class="haslo1"/>
        <?php
        if (isset($_SESSION['e_password'])) {
            echo '<div class="error">' . $_SESSION['e_password'] . '</div>';
            unset($_SESSION['e_password']);
        }
        ?>
        <br/>
        <input type="password" name="password2" placeholder="Powtorz Haslo" value="<?php
        if (isset($_SESSION['fr_password2'])) {
            echo $_SESSION['fr_password2'];
            unset($_SESSION['fr_password2']);
        }
        ?>" class="haslo2"/>
        <br/>
        <br/>
        <label class="regulamin">
            <input type="checkbox" name="regulamin" <?php
            if (isset($_SESSION['fr_regulamin'])) {
                echo "checked";
                unset($_SESSION['fr_regulamin']);
            }
            ?>/>Akceptuje Regulamin</label>
        <br/>
        <?php
        if (isset($_SESSION['e_regulamin'])) {
            echo '<div class="error">' . $_SESSION['e_regulamin'] . '</div>';
            unset($_SESSION['e_regulamin']);
        }
        ?>
        <br/>
        <input type="submit" class="wyslij">
        <br/>
    </div>
</form>
</body>
</html>