<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    require 'connect.php';
    $ID = $_COOKIE['Med'];
    $sql = "SELECT `персонал`.*, `должность`.`наименование должности`
    FROM `персонал` 
        LEFT JOIN `должность` ON `персонал`.`Должность` = `должность`.`id`
    WHERE `персонал`.`id` = $ID;";

    $sql = $pdo->query($sql);
    $Profession = $sql->fetch(PDO::FETCH_ASSOC)['наименование должности'];
    if($Profession == 'Врач'){
        echo '<title>Пациенты</title>';
    }else{
        echo '<title>Врачи</title>';
    }
    ?>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/select.css">
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        function divfix(){
            elem = document.getElementById("fixdiv");
            st = window.getComputedStyle(elem, null).getPropertyValue("display");
            if(st == 'block'){
                elem.style.display = 'none';
            }else{
                elem.style.display = 'block';
            }
        }
   </script>
   <script src='js\deleteWork.js'></script>
    
</head>
<body>
    <?php
        require 'header.php';
    ?>
    
    <div id='input'>
    <?php
    if($Profession == 'Врач'){
        echo '<input type="button" onclick="window.location.href = \'AddPatient.php\';" value="ДОБАВИТЬ ПАЦИЕНТА">
                <input type="button" onclick="divfix()" value="НАЙТИ ПАЦИЕНТА">
                </div>
                <div id="fixdiv">
                    <form id="fix" method="get">
                        <input placeholder="ФИО" name="FIO" type="text">
                        <input placeholder="Код МКБ" name="MKB" type="text">
                        <input placeholder="Диагноз" name="Diag" type="text">
                        <input type="submit" value="Найти">
                    </form>
                </div>';
    }else{
        echo '<input type="button" onclick="window.location.href = \'AddWorker.php\';" value="ДОБАВИТЬ СОТРУДНИКА">
                <input type="button" onclick="divfix()" value="НАЙТИ СОТРУДНИКА">
                </div>
                <div id="fixdiv">
                    <form id="fix" method="get">
                        <input placeholder="ФИО" name="FIO" type="text">
                        <input placeholder="Название должности" name="Dolznost" type="text">
                        <input type="submit" value="Найти">
                    </form>
                </div>';
    }
    ?>
    
    <main><form method='post'>
    <?php
    $Start = true;
    if($Profession == 'Врач'){
        $Where = '';
        if(isset($_GET['FIO'])){
            if($_GET['FIO'] != ''){
                if ($Start){
                    $Where .= 'WHERE `пациент`.`ФИО` = "'.$_GET['FIO'].'" ';
                    $Start = false;
                }else{
                    $Where .= 'AND `пациент`.`ФИО` = "'.$_GET['FIO'].'" ';
                }
            }
        }
        if(isset($_GET['MKB'])){
            if($_GET['MKB'] != ''){
                if ($Start){
                    $Where .= 'WHERE `диагноз`.`Код МКБ` = "'.$_GET['MKB'].'" ';
                    $Start = false;
                }else{
                    $Where .= 'AND `диагноз`.`Код МКБ` = "'.$_GET['MKB'].'" ';
                }
            }
        }
        if(isset($_GET['Diag'])){
            if($_GET['Diag'] != ''){
                if ($Start){
                    $Where .= 'WHERE `диагноз`.`Наименование диагноза` LIKE "%'.$_GET['Diag'].'%" ';
                    $Start = false;
                }else{
                    $Where .= 'AND `диагноз`.`Наименование диагноза` LIKE "%'.$_GET['Diag'].'%" ';
                }
            }
            
        }
        $sql = 'SELECT `пациент`.`ФИО`, `госпитализация`.`id`, `история_болезни`.`id`, `диагноз`.`Наименование диагноза`,
        `диагноз`.`Код МКБ`
        FROM `пациент` 
            LEFT JOIN `госпитализация` ON `пациент`.`Госпитализация` = `госпитализация`.`id`, `история_болезни` 
            LEFT JOIN `диагноз` ON `история_болезни`.`Диагноз` = `диагноз`.`id`';
        $sql = $sql.' '.trim($Where).';';
        echo '<table id="first" cellspacing="0">
                <tr>
                <td>ПАЦИЕНТ</td>
                <td>КОД МКБ</td>
                <td>ДИАГНОЗ</td>
            </tr></table>';
            $Link = 'Patient.php';

        echo '<table  id="second" cellspacing="0">';
        $I=0;
        $sql = $pdo->query($sql);
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $FIO = $row['ФИО'];
            $Kod = $row['Код МКБ'];
            $Diag  = $row['Наименование диагноза'];
            $LinkTemp = $Link.'?ID='.$row['id'];
            if ($I % 2 == 0){
                echo '<tr class="even">';
            }else{
                echo '<tr>';
            }

            echo "<td><a href='$LinkTemp'> $FIO</a></td>
                    <td>$Kod</td>
                    <td>$Diag</td>
                </tr>";
            $I++;
        }

    }else{
        if(issett($_GET['FIO']) && isset($_GET['Dolznost'])){
            if($_GET['Dolznost'] != '' && $_GET['FIO'] != ''){
                $sql = 'SELECT `персонал`.`ФИО`, `персонал`.`Должность`, `должность`.`наименование должности`, 
                `персонал`.`id`
                FROM `персонал` 
                    LEFT JOIN `должность` ON `персонал`.`Должность` = `должность`.`id`
                WHERE `персонал`.`ФИО` = "'.$_GET['FIO'].'" AND `должность`.`наименование должности` = "'.$_GET['Dolznost'].'";';
            }
        }
        elseif(isset($_GET['FIO'])){
            if($_GET['FIO'] != ''){
                $sql = 'SELECT `персонал`.`ФИО`, `персонал`.`Должность`, `должность`.`наименование должности`, 
                `персонал`.`id`
                FROM `персонал` 
                    LEFT JOIN `должность` ON `персонал`.`Должность` = `должность`.`id`
                WHERE `персонал`.`ФИО` = "'.$_GET['FIO'].'";';
            }
        }
        elseif(isset($_GET['Dolznost'])){
            if($_GET['Dolznost'] != ''){
                $sql = 'SELECT `персонал`.`ФИО`, `персонал`.`Должность`, `должность`.`наименование должности`, 
                `персонал`.`id`
                FROM `персонал` 
                    LEFT JOIN `должность` ON `персонал`.`Должность` = `должность`.`id`
                WHERE `должность`.`наименование должности` = "'.$_GET['Dolznost'].'";';
            }
        }
        else{
            $sql = 'SELECT `персонал`.`ФИО`, `персонал`.`Должность`, `должность`.`наименование должности`, 
            `персонал`.`id`
                    FROM `персонал` 
                    LEFT JOIN `должность` ON `персонал`.`Должность` = `должность`.`id`;';
        }
        echo '<table id="first">
                <tr>
                <td>СОТРУДНИК</td>
                <td>ДОЛЖНОСТЬ</td>
                <td></td>
            </tr></table>';
        $Link = 'account.php';

        echo '<table  id="second" cellspacing="0">';
        $I=0;
        $sql = $pdo->query($sql);

        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $FIO = $row['ФИО'];
            $Dolzhnost  = $row['наименование должности'];
            $ID = $row['id'];
            $LinkTemp = $Link.'?ID='.$ID;
            
            if ($I % 2 == 0){
                echo '<tr class="even">';
            }else{
                echo '<tr>';
            }
            echo "<td><a href='$LinkTemp'> $FIO</a></td>
                    <td>$Kod</td>
                    <td>$Dolzhnost</td>
                    <td><button value='$ID' id='$ID a'onclick='deleteworker(this.id)'><img src='img/delete.png' width='50px'></button></td>
                </tr>";
            $I++;
        }
    }

    ?>
    </table>
    </form></main>
</body>

</html>