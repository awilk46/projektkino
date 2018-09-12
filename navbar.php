<link rel="stylesheet" href="media/css/navbar.css">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="navbar-brand">KINO ALLADYN</div>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Strona Glowna</a></li>
            <li><a href="bilety.php">Bilety</a></li>
            <?php
            if (isset($_SESSION['zalogowany']) && $_SESSION['rola'] == 'user') {
                ?>
                <li><a href="mojeRezerwacje.php">Moje rezerwacje</a></li>
                <?php
            } ?>

            <?php
            if (isset($_SESSION['zalogowany']) && $_SESSION['rola'] == 'admin') {
                ?>
                <li><a href="administrator.php">Panel Administratora</a></li>
                <?php
            } ?>
            <li><a href="kontakt.php">Kontakt</a></li>
        </ul>

        <?php
        if (isset($_SESSION['zalogowany'])) {
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="wylogowanie.php" style="padding-top: 0;padding-bottom: 0;" >
                        <button type="button" class="btn btn-danger btn-sm przyciskZarejestruj">
                            <span class="glyphicon glyphicon-log-out"></span> Wyloguj
                        </button>
                    </a>
                </li>
            </ul>
            <?php
        } else {
            ?>
            <form method="post" action="logowanie.php">
                <ul class="nav navbar-nav navbar-right">
                    <li><input type="text" class="form-control login" name="login" placeholder="login"></li>
                    <li><input type="password" class="form-control haslo" name="haslo" placeholder="haslo"></li>
                    <li>
                        <button type="submit" class="btn btn-success przyciskZaloguj">Zaloguj</button>
                    </li>
                    <li>
                        <a href="rejestracja.php" class="przyciskZarejestruj" style="padding-top: 0;padding-bottom: 0;">
                            <button type="button" class="btn btn-info">Rejestruj</button>
                        </a>
                    </li>
                </ul>
            </form>


            <div style="clear:both;"></div>
            <?php
        }
        ?>
    </div>
</nav>