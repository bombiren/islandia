<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Islandia</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

<header>
    <h1><a href="islandia.php">Zwiedzaj Islandię</a></h1>
</header>

<aside>
    <h3>Do zwiedzania</h3>
    <ul>
        <li>Wodospady:
            <ol>
                <?php
               
                $polaczenie = mysqli_connect("localhost", "root", "", "islandia");
                $zapytanie = mysqli_query($polaczenie, "SELECT nazwa FROM obiekty WHERE rodzaje_id = 10 AND kontynenty_id = 3;");
                while ($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<li>" . $wiersz["nazwa"] . "</li>";
                }
                ?>
            </ol>
        </li>
        <li>Siedliska zwierząt:
            <ol>
                <?php
                
                $zapytanie = mysqli_query($polaczenie, "SELECT nazwa FROM obiekty WHERE rodzaje_id = 14 AND kontynenty_id = 3;");
                while ($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<li>" . $wiersz["nazwa"] . "</li>";
                }
                ?>
            </ol>
        </li>
    </ul>
</aside>

<main>
    <h2>Galeria</h2>
    <section>
        <?php
        
        $zapytanie = mysqli_query($polaczenie, "SELECT id, plik, nazwa FROM obiekty WHERE kontynenty_id = 3;");
        while ($wiersz = mysqli_fetch_assoc($zapytanie)) {
            echo "<a href='obiekty.php?id=" . $wiersz["id"] . "'>";
            echo "<img class='miniatura' src='obrazki/" . $wiersz["plik"] . "' title='" . $wiersz["nazwa"] . "' alt='" . $wiersz["nazwa"] . "'>";
            echo "</a>";
        }
        mysqli_close($polaczenie); 
        ?>
    </section>
</main>

<footer>
    <hr>
    <p>Autor: Jakub Foryś </p>
</footer>

</body>
</html>
