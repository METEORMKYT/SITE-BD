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
    <title>ФЭК 2024 ДЕКАНАТ</title>

    
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
        .html {
  background-image: url("img/fon-gradient-630.webp");
        }
    </style>
</head>
<body>
    <h1>ФЭК 2024 <p align="center">ДЕКАНАТ</p> </h1>    <br><br><br>




    <h2 class="text1"><b>Поиск по факультетам<b></h2>
    <form method="post">
            <input class="button1" type="text" name="search-FAK" class="search-FAK"><input type="submit" name="submit-FAK" value="Поиск Fakultet">
    </form>
        
    <h2 class="text1"><b>Поиск по студентам<b></h2>
    <form method="post">
            <input class="button1" type="text" name="search-STUD" class="search"><input type="submit" name="submit-STUD" value="Поиск Student">
    </form>

    <h2 class="text1"><b>Поиск по сессии<b></h2>
    <form method="post">
            <input class="button1" type="text" name="search-SESSIA" class="search"><input type="submit" name="submit-SESSIA" value="Поиск Sessia">
    </form>


    <br><br><br><br><br>
    <div class="php">
        <?php
    if(isset($_POST['submit-FAK'])){
        $search = $_POST['search-FAK'];
        $query = mysqli_query($connect, "SELECT * FROM `Fakultet` WHERE `id_fak` LIKE '%$search%' OR `name_fak` LIKE '%$search%' ");
        while ($row = mysqli_fetch_assoc($query))
        
        echo "ID: ". $row['id_fak'] ."<br>
                  Имя: ". $row['name_fak'] ."<br><br><br>";
    }
    if(isset($_POST['submit-STUD'])){
        $search = $_POST['search-STUD'];
        $query = mysqli_query($connect, "SELECT * FROM `Student` WHERE `num_zachetki` LIKE '%$search%' OR `id_group` LIKE '%$search%' OR `FIO` LIKE '%$search%' ");
        while ($row = mysqli_fetch_assoc($query)) 
        
        echo "Номер зачетки: ". $row['num_zachetki'] ."<br>
                  ФИО: ". $row['FIO'] ."<br>
                  Группа: ". $row['id_group'] ."<br><br><br>";
    }
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

?></div>

</body>
</html>