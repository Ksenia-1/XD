<?php
require 'connect.php';

if(isset($_POST['OkladReq'])){

    $Dolzhnost = $_POST['Dolzhnost'];
    $Oklad = $_POST['Oklad'];
    
    $sql = "SELECT `должность`.`id`
    FROM `должность`
    WHERE `должность`.`наименование должности` = '$Dolzhnost';";
    
    $sql = $pdo->query($sql);
    
    $ID = $sql->fetch(PDO::FETCH_ASSOC)['id'];
    
    $sql = "UPDATE `должность` SET `Оклад` = '$Oklad' WHERE `должность`.`id` = $ID;";
    $sql = $pdo->query($sql);

}elseif(isset($_POST['DolzhostReq'])){

    $Dolzhnost = $_POST['Dolzhnost'];
    $ID = $_POST['ID'];
    $sql = "SELECT `должность`.`id`
    FROM `должность`
    WHERE `должность`.`наименование должности` = '$Dolzhnost';";
    $sql = $pdo->query($sql);
    $DolzhnostID = $sql->fetch(PDO::FETCH_ASSOC)['id'];

    $sql  = "UPDATE `персонал` SET `Должность` = '$DolzhnostID' WHERE `персонал`.`id` = $ID;";
    $sql = $pdo->query($sql);

}elseif(isset($_POST['QualifiReq'])){
    $Qualif = $_POST['Qualif'];
    $ID = $_POST['ID'];
    $sql  = "SELECT `квалификация`.`id`
    FROM `квалификация`
    WHERE `квалификация`.`Категория квалификации` = '$Qualif';";
    $sql = $pdo->query($sql);
    $QualifID = $sql->fetch(PDO::FETCH_ASSOC)['id'];
    
    $sql  = "UPDATE `персонал` SET `Квалификация` = '$QualifID' WHERE `персонал`.`id` = '$ID';";
    $sql = $pdo->query($sql);
    
}

?>