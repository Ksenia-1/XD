<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/nav.css">
    <script src="js/account.js"></script>
</head>
<body>

    <?php
    require 'header.php';
    ?>
    <main>
        <h2>ЛИЧНЫЙ КАБИНЕТ</h2>
    <?php

    
    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];
    }else{
        $ID = $_COOKIE['Med'];
    }

    $sql = "SELECT `персонал`.*, `отделение`.`Наименование отделения`, 
    `квалификация`.`Категория квалификации`, `должность`.`наименование должности`,
    `должность`.`Оклад`
    FROM `персонал` 
        LEFT JOIN `отделение` ON `персонал`.`Отделение` = `отделение`.`№ отделения` 
        LEFT JOIN `квалификация` ON `персонал`.`Квалификация` = `квалификация`.`id` 
        LEFT JOIN `должность` ON `персонал`.`Должность` = `должность`.`id` 
    WHERE `персонал`.`id` = $ID;";
    $sql = $pdo->query($sql);

    while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $Name = $row['ФИО'];
        $Passport = explode(' ', $row['Паспорт']);
        $Tel = $row['Телефон'];
        $Adres = $row['Адрес'];
        $Otdel = $row['Наименование отделения'];
        $Qwalif = $row['Квалификация'].'-ая категория';
        $Dolzhnost = $row['наименование должности'];
        $Seria = $Passport[0];
        $Nomer = $Passport[1];
        $Oklad = $row['Оклад'];
    }
    $readonly = 'readonly';
    if(isset($_GET['ID'])){
        if($Dolzhnost == 'Бухгалтер'){
            $readonly = '';
        }
    }

    echo "<form>
    <p>ФИО: <input readonly id='name' type='text' size='".strlen($Name)*0.65."' value='$Name'></p><hr align='left'>
    <div id='passport'>Паспорт: <br><p>Серия: <input readonly size='".strlen($Seria)*0.9."' type='text' value='$Seria'></p>
                                    <p>Номер: <input readonly size='".strlen($Nomer)*0.9."' type='text' value='$Nomer'></p></div><hr align='left'>
    <p>Контактный номер: <input readonly type='text' value='$Tel'></p><hr align='left'>
    <p>Адрес проживания: <br><input readonly size='".strlen($Adres)*0.65."' type='text' value='$Adres'></p><hr align='left'>
    <div id='inf'>
    <p>Отдел: <input readonly type='text' value='$Otdel'></p>
    <p>Квалификация: <input $readonly type='text' id='qwalif1' onchange='qualifi(this.id)' value='$Qwalif'></p>
    <p>Должность: <input $readonly type='text' id='dolzhnost' onchange='dolzhnost(this.id)' value='$Dolzhnost'></p>
    <p>Оклад: <input $readonly type='number' id='oklad1' onchange='oklad(this.id)' value='$Oklad'></p>
    </div><input type='hidden' value='$ID' id='ID'></form>";
    ?>
    </main>
</body>
</html>