<?php
require 'connect.php';

$FIO = $_POST['FIO'];
$seria = $_POST['seria'];
$nomer = $_POST['nomer'];
$passport = $seria.' '.$nomer;
$tel = $_POST['tel'];
$adres = $_POST['adres'];
$otdel = $_POST['otdel'];
$qualif = $_POST['qualif'];
$dolzhnost = $_POST['dolzhnost'];

$sql  = "SELECT `отделение`.`№ отделения`
FROM `отделение`
WHERE `отделение`.`Наименование отделения` = '$otdel';";
$sql = $pdo->query($sql);
$otdelID = $sql->fetch(PDO::FETCH_ASSOC)['№ отделения'];

$sql  = "SELECT `квалификация`.`id`
    FROM `квалификация`
    WHERE `квалификация`.`Категория квалификации` = '$qualif';";
$sql = $pdo->query($sql);
$qualifID = $sql->fetch(PDO::FETCH_ASSOC)['id'];

$sql = "SELECT `должность`.`id`
    FROM `должность`
    WHERE `должность`.`наименование должности` = '$dolzhnost';";
$sql = $pdo->query($sql);
$dolzhnostID = $sql->fetch(PDO::FETCH_ASSOC)['id'];

$sql = "INSERT INTO `персонал` (`id`, `ФИО`, `Паспорт`, `Телефон`, `Адрес`, `Отделение`, `Квалификация`, `Должность`) 
VALUES (NULL, '$FIO', '$passport', '$tel', '$adres', '$otdelID', '$qualifID', '$dolzhnostID');";
$sql = $pdo->query($sql);

header('Location: Select.php');
?>