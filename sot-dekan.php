<?php

$connect = mysqli_connect("localhost", "root", "", "Uchet") or die("Error");

//$query = mysqli_query($connect, "SELECT * FROM Sklad");
//while($row = mysqli_fetch_assoc($query)) echo "<h1>".$row['IdDozirovka']."</h1><h2>".$row['text']."</h2><br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФЭК 2024 СОТРУДНИК ДЕКАНА</title>

    
    <style>
        .text1{
            margin-left: 50px;
        }
        .button1{
            margin-left: 100px;
        }
        .php{
            font-size: x-large;
            margin-left: 820px;
            margin-top: -330px;
            line-height: 1.5;
        }
        .meme{
            margin-left: 125px;
        }
        .html {
  background-image: url("img/fon-gradient-630.webp");
        }
    </style>
</head>
<body>
    <h1>ФЭК 2024 <p align="center">СОТРУДНИК ДЕКАНАТА</p> </h1>    <br><br><br>




    <h2 class="text1"><b>Семестровый план<b></h2>
    <form method="post">
            <input class="button1" type="text" name="search-SEMP" class="search"><input type="submit" name="submit-SEMP" value="Поиск Semestroviy plan">
    </form>
        
    <h2 class="text1"><b>Поиск по сессии<b></h2>
    <form method="post">
            <input class="button1" type="text" name="search-SESSIA" class="search"><input type="submit" name="submit-SESSIA" value="Поиск Sessia">
    </form>

    <h2 class="text1"><b>Поменять значения<b></h2>
            <a class="meme" href="http://127.0.0.1/openserver/phpmyadmin/index.php?route=/table/sql&db=Uchet&table=Sessia"><input type="submit" name="meme" value="Изменить"></a>


    <br><br><br><br><br><br><br><br><br>
    <div class="php">
        <?php
    if(isset($_POST['submit-SESSIA'])){
        $search = $_POST['search-SESSIA'];
        $query = mysqli_query($connect, "SELECT * FROM `Sessia` WHERE `id_ses` LIKE '%$search%' OR `num_zachetki` LIKE '%$search%' ");
        while ($row = mysqli_fetch_assoc($query)) 
        
        echo "ID: ". $row['id_ses'] ."<br>
                  Номер зачетки: ". $row['num_zachetki'] ."<br>
                  Предмет: ". $row['id_predmet'] ."<br>
                  Дата: ". $row['data'] ."<br>
                  Тип контроля: ". $row['kontrol'] ."<br>
                  Оценка: ". $row['Ocenka'] ."<br><br><br>";
    }
    if(isset($_POST['submit-SEMP'])){
        $search = $_POST['search-SEMP'];
        $query = mysqli_query($connect, "SELECT * FROM `Semestroviy_plan` WHERE `id_group` LIKE '%$search%' OR `id_predmet` LIKE '%$search%' ");
        while ($row = mysqli_fetch_assoc($query)) 
        
        echo "ID Семестрового плана: ". $row['id_semest_plan'] ."<br>
                  ID Группы: ". $row['id_group'] ."<br>
                  ID Предмета: ". $row['id_predmet'] ."<br>
                  Кол-во часов: ". $row['kol-vo_chasov'] ."<br><br><br>";
    }


?></div>

</body>
</html>