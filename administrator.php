<?php
session_start();
require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
if (!isset($_SESSION['rola']) || $_SESSION['rola'] != 'admin') {
    header('Location: index.php');
    exit();
}
try {
    $connection = new mysqli($host, $db_user, $db_password, $db_name);
    $connection->set_charset("utf8");
    if ($connection->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    } else {
        if (isset($_POST['usunUzytkownika'])) {
            $result = $connection->query('DELETE FROM uzytkownicy WHERE uzytkownicy.id = ' . $_POST['usunUzytkownika']);
            if (!$result) throw new Exception($connection->error);
            unset($_POST['usunUzytkownika']);
        }

        if (isset($_POST['usunFilm'])) {
            $result = $connection->query('DELETE FROM filmy WHERE filmy.id = ' . $_POST['usunFilm']);
            if (!$result) throw new Exception($connection->error);
            unset($_POST['usunFilm']);
        }

        $resultSet = $connection->query("SELECT * FROM filmy");
        if (!$resultSet) throw new Exception($connection->error);
        $randomoweFilmy = $resultSet->fetch_all(MYSQLI_NUM);

        $resultSet = $connection->query("SELECT * FROM uzytkownicy");
        if (!$resultSet) throw new Exception($connection->error);
        $uzytkownicy = $resultSet->fetch_all(MYSQLI_NUM);

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
    <h2>Filmy</h2>
    <form method="post">
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>nazwa</th>
                <th>opis</th>
                <th>cena</th>
                <th>kategoria</th>
                <th>akcja</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($randomoweFilmy
                     as $film) {
                ?>
                <tr>
                    <td><?php echo $film[0] ?></td>
                    <td><?php echo $film[1] ?></td>
                    <td><?php echo $film[2] ?></td>
                    <td><?php echo $film[3] ?></td>
                    <td><?php echo $film[4] ?></td>
                    <?php
                    echo '<td>';
                    echo '<button type="submit" name="usunFilm" value="' . $film[0] . '" class="btn btn-danger delete">usun</button>';
                    echo '</td>';
                    ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
</div>
<div class="container">
    <h2>Uzytkownicy</h2>
    <form method="post">
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>login</th>
                <th>email</th>
                <th>imie i nazwisko</th>
                <th>rola</th>
                <th>akcja</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($uzytkownicy
                     as $uzytkownik) {
                ?>
                <tr>
                    <td><?php echo $uzytkownik[0] ?></td>
                    <td><?php echo $uzytkownik[1] ?></td>
                    <td><?php echo $uzytkownik[3] ?></td>
                    <td><?php echo $uzytkownik[4] ?></td>
                    <td><?php echo $uzytkownik[5] ?></td>
                    <?php
                    echo '<td>';
                    echo '<button type="submit" name="usunUzytkownika" value="' . $uzytkownik[0] . '" class="btn btn-danger delete">usun</button>';
                    echo '</td>';
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