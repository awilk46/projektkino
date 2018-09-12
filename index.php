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
        $resultSet = $connection->query("SELECT * FROM filmy ORDER BY RAND() LIMIT 16");
        if (!$resultSet) throw new Exception($connection->error);
        $randomoweFilmy = $resultSet->fetch_all(MYSQLI_NUM);
        if (isset($_POST['rezerwuj'])) {
            $resultToAdd = $connection->query('INSERT INTO rezerwacje VALUES (' . $_SESSION['user_id'] . ',' . $_POST['rezerwuj'] . ')');
            if (!$resultToAdd) throw new Exception($connection->error);
            unset($_POST['rezerwuj']);
        }
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
    <link rel="stylesheet" href="media/css/index.css">
    <script src="media/js/jquery-3.2.1.min.js"></script>
    <script src="media/js/bootstrap.min.js"></script>
</head>
<body>

<?php include 'navbar.php'; ?>
<div class="container">
    <h2>Nowosci w styczniu:</h2>
    <form class="row" method="post">

        <?php
        foreach ($randomoweFilmy
                 as $film) {
            ?>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plakat">
                <img src="<?php echo $film[5] ?>">
                <h6><?php echo $film[1] ?></h6>

            </div>
            <?php
        }
        ?>
    </form>
</div>
<?php include 'stopka.php'; ?>
</body>
</html>