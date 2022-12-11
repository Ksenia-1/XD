<?php
setcookie('Med', '', time()-2592000);
header('Location: index.php');
?>