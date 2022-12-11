<?php
require_once 'connect.php';
echo '<header><nav>';
$ID = $_COOKIE['Med'];
$sql = "SELECT `персонал`.*, `должность`.`наименование должности`
FROM `персонал` 
    LEFT JOIN `должность` ON `персонал`.`Должность` = `должность`.`id`
WHERE `персонал`.`id` = $ID;";

$sql = $pdo->query($sql);
$Profession = $sql->fetch(PDO::FETCH_ASSOC)['наименование должности'];
if($Profession == 'Врач'){
    echo '<a href="account.php">Кабинет</a>
    <a href="Select.php">Пациенты</a>
    <a href="Exit.php">Выйти</a>';
}else{
    echo '<a href="account.php">Кабинет</a>
    <a href="Select.php">Сотрудники</a>
    <a href="Exit.php">Выйти</a>';
}
echo '</header></nav>';
?>