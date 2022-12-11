<?php
require 'connect.php';
$ID = $_POST['ID'];
$sql = "DELETE FROM `персонал` WHERE `персонал`.`id` = $ID;";
$sql = $pdo->query($sql);
?>
