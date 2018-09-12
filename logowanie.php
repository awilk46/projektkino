<?php
session_start();
if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {
    header('Location: index.php');
    exit();
}
require_once "connect.php";

$connection = @new mysqli($host, $db_user, $db_password, $db_name);
$connection->set_charset("utf8");

if ($connection->connect_errno != 0) {
    echo "Blad: " . $connection->connect_errno;
} else {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

    if ($resultSet = @$connection->query(
        sprintf("SELECT * FROM uzytkownicy WHERE login='%s'",
            mysqli_real_escape_string($connection, $login)))) {
        $chosenResult = $resultSet->num_rows;
        if ($chosenResult > 0) {
            $row = $resultSet->fetch_assoc();
            if (password_verify($haslo, $row['haslo'])) {
                $_SESSION['zalogowany'] = true;

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_login'] = $row['login'];
                $_SESSION['user_imieINazwisko'] = $row['imieINazwisko'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['rola'] = $row['rola'];

                unset($_SESSION['login_error']);
                $resultSet->free_result();
                header('Location: index.php');
            } else {
                $_SESSION['login_error'] = 'blad logowania';
                header('Location: index.php');
            }
        } else {
            $_SESSION['login_error'] = 'blad logowania';
            header('Location: index.php');
        }
    }
    $connection->close();
}
?>