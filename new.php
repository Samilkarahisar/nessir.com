<?php
if(isset($_REQUEST['username'])){
    $usern=$_REQUEST['username'];
    }
else{
header("Location:http://nessir.com/login.php");
}

if(isset($_POST['nessir_title'])){
session_start();

$name=$_POST['nessir_title'];

$_SESSION['fname'] = $name;

$table_name= $name . "_queue";

include("db_settings.php");

$sql="CREATE TABLE $table_name(
id SMALLINT NOT NULL,
username VARCHAR(30) NOT NULL,
time_until SMALLINT NOT NULL
)";

$conn->query($sql);

$sql3 = $conn->query("SELECT * FROM texts");

$row_count= mysqli_num_rows($sql3);


$dbtext_id = $row_count;
$dbtext_name =  $name;

$sql4= $conn->query("INSERT INTO texts values('$dbtext_id','$dbtext_name')");

echo $dbtext_id;

$toopen= $name . ".txt";
$open = fopen($toopen, "a");

$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];

$current_date = "$date/$month/$year at $hour:$min";


$time_until= ($hour * 60) + ($min + 5);
$first=1;
$sql5= $conn->query("INSERT INTO $table_name values(id,username,time_until) values('$first','$usern','$time_until')");


$eklenen= "Title: " . $name . "." . "\n" . "This nessir began from " . $usern . " on " . $current_date . "\n"  . "--------" . "\n";

fwrite($open, $eklenen);
fclose($open);

$_SESSION['fid'] = $dbtext_id;
header("Location:http://nessir.com/write.php");

exit();

}

?>
<html>
  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<title>Nessir</title>

<style>
body{
background-color:white;
}

#merkez{
width:250px;
height:300px;
margin:auto;
}

input:focus {outline: none; }

.textbox{
border: 0px;
padding-left:25px;
width: 230px;
height:50px;
font-size:15px;
}

#tcontain{
padding-left:8px;
border: solid #F2F2F2 1px;
}

.btn {
margin-left:10px;
margin-top:10px;
padding-left:25px;
width: 230px;
height:50px;
font-family: Arial;
color: black;
font-size: 19px;
padding: 10px 20px 10px 20px;
}

</style>
</head>
  
<body>
<div id="merkez">
<form action="new.php" method="post">

<div id="tcontain">
<input class="textbox" type="text" name="nessir_title" size="25" required placeholder="Title your nessir" autocomplete="off">
</div>

<input class="btn" type="submit" value="Begin">
</form>

</div>

</body>
  
</html>