<?php
require 'connect.php';

$ID = (int)$_POST['ID'];
$Text = $_POST['Text'];
if(isset($_POST['Anamnez'])){
    $sql = "UPDATE `история_болезни` SET `Анамнез` = '$Text' WHERE `история_болезни`.`id` = $ID;";
    $sql = $pdo->query($sql);
}
elseif(isset($_POST['Zhaloba'])){
    $sql = "UPDATE `история_болезни` SET `Жалобы` = '$Text' WHERE `история_болезни`.`id` = $ID;";
    $sql = $pdo->query($sql);
}
?>