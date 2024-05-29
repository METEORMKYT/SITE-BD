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
    <title>ФЭК 2024 ЗАМ ДЕКАНАТА</title>

    
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
    <h1>ФЭК 2024 <p align="center">ЗАМЕСТИТЕЛЬ ДЕКАНАТА</p> </h1>    <br><br><br>




    <h2 class="text1"><b>Успеваимость группы<b></h2>
    <form method="post">
            <input class="button1" type="text" name="search-GRUP" class="search"><input type="submit" name="submit-GRUP" value="Поиск Group">
    </form>
        
    <h2 class="text1"><b>Успеваимость студента<b></h2>
    <form method="post">
            <input class="button1" type="text" name="search-STUD" class="search"><input type="submit" name="submit-STUD" value="Поиск Student">
    </form>


    <br><br><br><br><br><br><br><br><br>
    <div class="php">
        <?php
    if(isset($_POST['submit-GRUP'])){
        $search = $_POST['search-GRUP'];
        $query = mysqli_query($connect, 
        "SELECT Gruppa.num_group, Gruppa.id_spec, Student.num_zachetki, Student.FIO, Student.id_group, Sessia.num_zachetki, Sessia.id_predmet, Sessia.data, Sessia.id_predmet, Sessia.kontrol, Sessia.Ocenka
        FROM Gruppa, Student, Sessia
        WHERE Student.id_group = Gruppa.num_group AND Sessia.num_zachetki = Student.num_zachetki ");
        while ($row = mysqli_fetch_assoc($query))
        
        echo "Номер группы ". $row['num_group'] ."<br>
                Специальность: ". $row['id_spec'] ."<br>
                Номер зачетки: ". $row['num_zachetki'] ."<br>
                ФИО: ". $row['FIO'] ."<br>
                Предмет: ". $row['id_predmet'] ."<br>
                Дата: ". $row['data'] ."<br>
                Тип контроля: ". $row['kontrol'] ."<br>
                Оценка: ". $row['Ocenka'] ."<br><br><br>";
    }
    if(isset($_POST['submit-STUD'])){
        $search = $_POST['search-STUD'];
        $query = mysqli_query($connect, 
        "SELECT Student.num_zachetki, Student.FIO, Sessia.num_zachetki, Sessia.data, Sessia.id_predmet, Sessia.kontrol, Sessia.Ocenka
        FROM Student, Sessia
        WHERE Sessia.num_zachetki = Student.num_zachetki ");
        while ($row = mysqli_fetch_assoc($query)) 
        
        echo "Номер зачетки: ". $row['num_zachetki'] ."<br>
                ФИО: ". $row['FIO'] ."<br>
                Предмет: ". $row['id_predmet'] ."<br>
                Дата: ". $row['data'] ."<br>
                Тип контроля: ". $row['kontrol'] ."<br>
                Оценка: ". $row['Ocenka'] ."<br><br><br>";
    }
    

?></div>

</body>
</html>