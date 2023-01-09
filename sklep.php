<!DOCTYPE html>
<html lang="pl=PL">
<head>
    <meta charset="UTF-8">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="baner1">
    <h1>Internetowy sklep z eko-warzywami</h1>
    </div>

       <div id="baner2">
       <ol>
        <li>warzywa</li>
        <li>owoce</li>
        <li><a href="https://terapiasokami.pl" target="_blank">soki</a></li>
       </ol>

       </div>

        <div id="glowny">
<?php
///utworzenie zmiennych polaczeniowych

$server = "localhost";
$user = "root";
$passwd = "";
$dbname = "warzywniak";

$conn = mysqli_connect($server,$user,$passwd,$dbname);

$zapytanie = "SELECT `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie` FROM `produkty` WHERE `Rodzaje_id` IN (1,2);";
$sql = mysqli_query($conn,$zapytanie);

while($wynik = mysqli_fetch_row($sql)){
  echo "<div class='blok'>";
  echo "<img src='$wynik[4]' alt='warzywniak'>";
  echo "<h5>". $wynik[0] ."</h5>";
  echo "<p>". 'opis: '. $wynik[2] ."</p>";
  echo "<p>". 'na stanie: '. $wynik[1]. "</p>";
  echo "<h2>". $wynik[3]. ' zł'. "</h2>";
  echo "</div>";
}



//sprawdzenie polaczenia 
/*
if (!$conn){
  die ("fatal error:".mysqli_error($conn));
} echo "jest okej"
*/


?>
        </div>

          <div id="stopka">
        <form method="post">
            <label>Nazwa:</label>
            <input type="text" name="tekst" id="tekst">
            <label>Cena:</label>
            <input type="text" name="tekst1" id="tekst1">
            <input type="submit" value="Dodaj produkt"> <br />
            Stronę wykonał: 000000000
        </form>
<?php

if (isset($_POST['tekst1']) && isset($_POST['tekst1'])){
  $tekst = $_POST['tekst'];
  $tekst1 = $_POST['tekst1'];
  $zapytanie = "INSERT INTO `produkty`(`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES ('NULL','1','4','$tekst','10', 'NULL','$tekst1','owoce.jpg');";
  $wynik2 = mysqli_query($conn,$zapytanie);
}






?>
          </div>
</body>
</html>