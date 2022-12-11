<?php
require 'connect.php';
$Login = $_POST['Login'];
$Pass = $_POST['Password'];

$sql = 'SELECT `userdata`.`id`, `userdata`.`Login`, `userdata`.`Password`
FROM `userdata` 
WHERE `userdata`.`Login` = ? AND `userdata`.`Password` = ?;';

$sql = $pdo->prepare($sql);
$sql->execute(array($Login, $Pass));

$ID = $sql->fetch(PDO::FETCH_ASSOC)['id'];

if(isset($ID)){
    setcookie("Med", $ID, time()+2592000);
    header('Location: /account.php');
}else{
    header('Location: /index.php?E=1');
}
?>