<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление пациента</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/nav.css">
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
    <form method='post' action='AddPatientProcess.php'>
    <p>ФИО: <input type="text" name="FIO"></p>
    <p>Год рождения: <input type="text" name="birthday"></p>
    <p>Паспорт: <input type="text" name="passport"></p>
    <p>Полис: <input type="text" name="polic"></p>
    <p>Адрес: <input type="text" name="adres"></p>
    <p>Телефон: <input type="text" name="tel"></p>
    <p>Дата поступления: <input type="text" name="Postulpenie"></p>
    <p>Отделение: <input type="text" name="otdel"></p>
    <p>Жалобы: <textarea name='Zhaloba' spellcheck='false' rows='8'></textarea></p>
    <p>Анамнез: <textarea name='Anamnez' spellcheck='false' rows='8'></textarea></p>
    <p>Диагноз: <input type="text" name="Diagnoz"></p>
    <p>Анализы: <input type="text" name="analiz"></p>
    <input type="submit" value="добавить">
    </form>

    </main>
</body>
</html>