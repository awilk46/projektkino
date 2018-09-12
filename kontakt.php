<?php
session_start();
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
    <div style="margin-top: 10%">
        <div style="float: left; padding-left: 10%;margin-right: 10%;">
            <h2 style="text-align: center;margin-bottom: 50px">Kontakt:</h2>
            <h3>Nasze kina:</h3>
            <h4>Rzeszow, ul. Sezamkowa 12</h4>
            <h4>Galeria Rzeszow 12aa</h4>
            <br/>
            <h4>Rzeszow, ul. Landrynkowa 33b</h4>
            <h4>Milenium Hall 12aa</h4>
            <br/>
            <h4>Rzeszow, ul. Czekoladowa 6</h4>
            <h4>Amfiteatr 12aa</h4>
        </div>
        <div style="float: left">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10251.167874979841!2d22.005947384191906!3d50.03399381163639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spl!2spl!4v1516591904654"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<?php include 'stopka.php'; ?>
</body>
</html>