<?php
echo 'go';


if(isset($_REQUEST["username"])){
header("Location: http://nessir.com/homepage.php");
die();
}
else{
header("Location: http://nessir.com/register.php");
die();
}
?>