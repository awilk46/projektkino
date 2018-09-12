<?php
session_start();
require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
try {
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    $connection->set_charset("utf8");
    if ($connection->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    } else {
        if (isset($_POST['rezerwuj'])) {
            $resultToAdd = $connection->query('DELETE FROM rezerwacje WHERE rezerwacje.id_film = '.$_POST['rezerwuj'].' AND rezerwacje.id_uzytkownik = '. $_SESSION['user_id']);
            if (!$resultToAdd) throw new Exception($connection->error);
            unset($_POST['rezerwuj']);
        }

        $resultSet = $connection->query("SELECT * FROM filmy JOIN rezerwacje ON filmy.id = rezerwacje.id_film JOIN uzytkownicy ON uzytkownicy.id = rezerwacje.id_uzytkownik WHERE uzytkownicy.id = ". $_SESSION['user_id']);
        if (!$resultSet) throw new Exception($connection->error);
        $randomoweFilmy = $resultSet->fetch_all(MYSQLI_NUM);
        $connection->close();
    }
} catch (Exception $e) {
    echo '<span style="color:red;">Blad serwera.</span>';
    echo '<br/>Informacja developerska:' . $e;
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="media/css/bootstrap.min.css">
    <link rel="stylesheet" href="media/css/bilety.css">
    <script src="media/js/jquery-3.2.1.min.js"></script>
    <script src="media/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <h2>Moje rezerwacje:</h2>
    <form method="post">
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>nazwa</th>
                <th>opis</th>
                <th>cena</th>
                <th>kategoria</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($randomoweFilmy
                     as $film) {
                ?>
                <tr>
                    <td><img src="<?php echo $film[5] ?>"/></td>
                    <td><?php echo $film[1] ?></td>
                    <td><?php echo $film[2] ?></td>
                    <td><?php echo $film[3] ?> zl</td>
                    <td><?php echo $film[4] ?></td>
                    <?php
                    if (isset($_SESSION['zalogowany']) && $_SESSION['rola'] == 'user') {
                        echo '<td>';
                        echo '<button type="submit" name="rezerwuj" value="' . $film[0] . '" class="btn btn-danger delete">Usun</button>';
                        echo '</td>';
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
</div>
<?php include 'stopka.php'; ?>
</body>
</html>