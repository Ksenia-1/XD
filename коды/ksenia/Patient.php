<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пациент</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/nav.css">
    <script src="js/textarea.js"></script>
    <style>
        body{
            font-size:1.2em;
        }
    </style>
</head>
<body>
    <?php
    require 'header.php';
    ?>

    <main>

    <?php

    $ID = $_GET['ID'];

    $sql = "SELECT `пациент`.*, `госпитализация`.`Отделение`, 
    `отделение`.`Наименование отделения`, `история_болезни`.`Жалобы`, 
    `история_болезни`.`Анамнез`, `история_болезни`.`Диагноз`, 
    `история_болезни`.`Анализы`, `диагноз`.`Наименование диагноза`, 
    `анализы`.`Наименование анализов`, `госпитализация`.`Дата поступления`
    FROM `пациент` 
        LEFT JOIN `госпитализация` ON `пациент`.`Госпитализация` = `госпитализация`.`id` 
        LEFT JOIN `отделение` ON `госпитализация`.`Отделение` = `отделение`.`№ отделения`, `история_болезни` 
        LEFT JOIN `диагноз` ON `история_болезни`.`Диагноз` = `диагноз`.`id` 
        LEFT JOIN `анализы` ON `история_болезни`.`Анализы` = `анализы`.`id`
    WHERE `пациент`.`id` =  $ID;";
    $sql = $pdo->query($sql);
    $Analiz = '';
    while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $Name = $row['ФИО'];
        $Birthday = $row['Год рождения'];
        $Passport = $row['Паспорт'];
        $Polis = $row['Полис'];
        $Adres = $row['Адрес'];
        $Tel = $row['Телефон'];
        $Postuplenie = $row['Дата поступления'];
        $Otdel = $row['Наименование отделения'];
        $Zhaloba = $row['Жалобы'];
        $Anamnez = $row['Анамнез'];
        $Diagnoz = $row['Наименование диагноза'];
        $Analiz .= $row['Наименование анализов'].'<br>'; 
    }

    echo "<form>
    <p>Пациент: $Name</p>
    <p>Год рождения: $Birthday</p>
    <p>Паспорт: $Passport</p>
    <p>Полис: $Polis</p>
    <p>Адрес: $Adres</p>
    <p>Телефон: $Tel</p>
    <p>Дата поступления: $Postuplenie</p>
    <p>Отделение: $Otdel</p>
    <p>Жалобы: <textarea id='zhaloba1' onchange='zhaloba(this.id)' spellcheck='false' rows='8'>$Zhaloba</textarea></p>
    <p>Анамнез: <textarea id='anamnez1' onchange='anamnez(this.id)' spellcheck='false' rows='8'>$Anamnez</textarea></p>
    <p>Диагноз: $Diagnoz</p>
    <p>Анализы: $Analiz</p>
    <input type='hidden' value='$ID' id='ID'>
    </form>";
    ?>

    </main>
</body>
</html>
