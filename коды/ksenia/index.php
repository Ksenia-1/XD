<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div id="header" class="half">
<p>ЖУКОВСКАЯ ГОРОДСКАЯ БОЛЬНИЦА</p>   
</div>
    <main>
    <div class="half">
    <div id="a"><p>awe2</p></div>
    <div id='b'>    
        <?php
            if(isset($_COOKIE['Md'])){
                header('Location: /index.php');
            }elseif(isset($_GET['E'])){
                echo '<div id="b"><form action="EnterProcess.php" method="post">
                <p>Вход для персонала больницы</p>
                <input type="text" placeholder="Вы ввели неправильный логин или пароль" name="Login">
                <input type="password" placeholder="Вы ввели неправильный логин или пароль" name="Password">
                <input type="submit" value="Войти">
                </form></div>';
            }else{
                echo '<div id="b"><form action="EnterProcess.php" method="post">
                <p>Вход для персонала больницы</p>
                <input type="text" placeholder="Логин" name="Login">
                <input type="password" placeholder="Пароль" name="Password">
                <input type="submit" value="Войти">
                </form></div>';
            }
        ?>
</div>
    </div>
    
    <div class="half">
    <div id="c"><p>При вознокновении неполадок <br>
                    обращайтесь в слубу поддержки: <br>
                    HELPHELP@HELP.COM <br>
                    Тел.: <br>
                    8(999)-777-66-55 <br>
                    8(999)-666-55-44 <br></p></div>
    <div id="d"><p></p></div>
    </div>
    </main>
    </body>

</html>
