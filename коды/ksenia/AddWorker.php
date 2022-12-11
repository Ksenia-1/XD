<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>

    <?php
    require 'header.php';
    ?>
    <main>
    <form method='post' action='AddWorkerProcess.php'>
    <p>ФИО: <input id='name' name='FIO' type='text' size='25'></p><hr align='left'>
    <div id='passport'>Паспорт: <br><p>Серия: <input name='seria' size='10' type='text'></p>
                                    <p>Номер: <input name='nomer' size='10' type='text'></p></div><hr align='left'>
    <p>Контактный номер: <input type='text' name='tel'></p><hr align='left'>
    <p>Адрес проживания: <br><input size='40' name='adres' type='text'></p><hr align='left'>
    <div id='inf'>
    <p>Отдел: <input  type='text' name='otdel'></p>
    <p>Квалификация: <input type='text' name='qualif' id='qwalif1'></p>
    <p>Должность: <input type='text' name='dolzhnost' id='dolzhnost'></p>
    </div>
    <input type="submit" value="Добавить">
    </form>
    </main>
</body>
</html>