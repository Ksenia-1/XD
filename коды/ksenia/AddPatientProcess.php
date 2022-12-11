<?php
require 'connect.php';

$FIO = $_POST['FIO'];
$birthday = $_POST['birthday'];
$passport = $_POST['passport'];
$polic = $_POST['polic'];
$adres = $_POST['adres'];
$tel = $_POST['tel'];
$postulpenie = $_POST['Postulpenie'];
$otdel = $_POST['otdel'];
$zhaloba = $_POST['Zhaloba'];
$anamnez = $_POST['Anamnez'];
$diagnoz = $_POST['Diagnoz'];
$analiz = $_POST['analiz'];
$sql  = "SELECT `отделение`.`№ отделения`
FROM `отделение`
WHERE `отделение`.`Наименование отделения` = '$otdel';";
$sql = $pdo->query($sql);
$otdelID = $sql->fetch(PDO::FETCH_ASSOC)['№ отделения'];

$sql  = "SELECT `диагноз`.`id`
FROM `диагноз`
WHERE `диагноз`.`Наименование диагноза` = '$diagnoz';";
$sql = $pdo->query($sql);
$diagnozID = $sql->fetch(PDO::FETCH_ASSOC)['id'];

$sql  = "SELECT `анализы`.`id`
FROM `анализы`
WHERE `анализы`.`Наименование анализов` LIKE '%$analiz%';";
$sql = $pdo->query($sql);
$analizID = $sql->fetch(PDO::FETCH_ASSOC)['id'];


$sql  = "INSERT INTO `история_болезни` (`id`, `Жалобы`, `Анамнез`, `Диагноз`, `Лечение`, `Лекарства`, `Анализы`, `Процедуры`, `Эпикриз`, `Операции`) 
VALUES (NULL, '$zhaloba', '$anamnez', '$diagnozID', NULL, NULL, '$analizID', NULL, NULL, NULL);";
$sql = $pdo->query($sql);
$boleznlID = $pdo->lastInsertId();

$sql  = "INSERT INTO `госпитализация` (`id`, `История болезни`, `Дата поступления`, `Дата выписки`, `Отделение`) 
VALUES (NULL, '$boleznlID', '$postulpenie', NULL, '$otdelID');";
$sql = $pdo->query($sql);
$gospialID = $pdo->lastInsertId();

$sql  = "INSERT INTO `пациент` (`id`, `ФИО`, `Год рождения`, `Паспорт`, `Полис`, `Телефон`, `Адрес`, `Госпитализация`) 
VALUES (NULL, '$FIO', '$passport', '$passport', '$polic', '$tel', '$adres', '$gospialID');";
$sql = $pdo->query($sql);

header('Location: Select.php');
?>