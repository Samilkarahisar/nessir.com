<?php
 
// any valid date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// always modified right now
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// HTTP/1.1
header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
// HTTP/1.0
header("Pragma: no-cache");
 
 
if(isset($_REQUEST['username'])){
    $usern=$_REQUEST['username'];
    }
else{
header("Location:http://nessir.com/login.php");
}
$url = 'http://nessir.com/write.php';
 
session_start();
 
$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
 
if(isset($_SESSION['fname'] ))
{
 
include("db_settings.php");
 
$q_filename = $_SESSION['fname'] . "_queue";
 
$usern= $_REQUEST['username'];
 
 
$sql= $conn->query("SELECT username FROM  $q_filename WHERE id='1' ");
 
$firstrow = $sql->fetch_assoc();
 
if(isset($firstrow['username'])){
 
if($usern==$firstrow['username']){
 
/* 
USER COMES AND HE IS THE TOP OF QUEUE (he comes from inqueue.php)
 
*/
$file=$_SESSION['fname'] . ".txt";
$filed_id = $_SESSION['fid'];
$back_url = "http://nessir.com/viewer.php?textid=" . "$filed_id";
 
}
else{
/* 
USER COMES AND SOMEONE IS ALREADY TOP OF _QUEUE.
*/ 
$testing = $conn->query("SELECT * FROM $q_filename");
 
$counted = $testing -> num_rows;
 
$sqllast= $conn->query("SELECT * FROM $q_filename WHERE id= $counted ");
 
$lastrow = $sqllast->fetch_assoc();
 
$db_userqtime = $lastrow['time_until'] + 5 ;
 
$idcount = $lastrow['id'] + 1;
 
$db_write = $conn->query("INSERT INTO $q_filename (id,username,time_until) values('$idcount','$usern','$db_userqtime')");
 
 
/* find a better way to choose the last rows id instead of taking all the data in the fcking table.. */
 
$_SESSION['yourq'] = $q_filename;
 
header("Location:http://nessir.com/inqueue.php");
 
}
 
}
 
else{
/*
USER COMES AND THE _QUEUE IS EMPTY.
*/
$file=$_SESSION['fname'] . ".txt";
$filed_id = $_SESSION['fid'];
$back_url = "http://nessir.com/viewer.php?textid=" . "$filed_id";
 
 
$info = getdate();
 
$db_usertime = ($info['hours'] * 60) + ($info['minutes'] + 5);
 
 
$zero= 1;
$db_writer = $conn->query("INSERT INTO $q_filename (id,username,time_until) values('$zero','$usern','$db_usertime')");
 
}
 
}
else{
 
 
header("Location:http://nessir.com/new.php");
 
exit;
}
 
 
if (isset($_POST['text']))
{
 
$test= "Location:" . "$back_url";
$checking = $conn->query("SELECT username FROM $q_filename WHERE id='1'");
$check = $checking ->fetch_assoc();
 
if($usern==$check['username']){
    $eklenen=  $_POST['text'];
 
    $myfile = fopen($file, "a");
 
    fwrite($myfile, $eklenen);
 
    fclose($myfile);
 
$info = getdate();
 
$nextusertime = ($info['hours'] * 60) + ($info['minutes'] + 5);
 
$sql_delete = $conn->query("DELETE FROM $q_filename WHERE id=1");
$sql_update = $conn->query("UPDATE $q_filename SET id=1, time_until=$nextusertime LIMIT 1");
header($test);
 
exit();
}
else{
header("Location: http://nessir.com/homepage.php");
exit;
}
 
}
 
// read the textfile
$text = file_get_contents($file);
 
?>	
 
<!-- HTML form -->
 
 
 
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'>
<style>
.header{
background:#FAFAFA;
top:0;
width:100%;
position:fixed;
}
body{
 background-color:#FAFAFA;
}
#field1{
margin:auto;
resize:none;
width:810px;
height:300px;
font-size:16px;
 
}
#field{
margin:auto;
resize:none;
width:810px;
height:200px;
font-size:16px;
}
#main{
background-color:#FAFAFA;
    margin:auto;
    width:860px;
    height:710px;
    padding:10px;
 
    border-radius: 10px;
    }
#queue{
margine:auto;
resize:none;
width:810px;
height:20px;
 
}
 
#oldtext{
 
    width:840px;
    height:300px;
    }
#newtext{
 
    width:840px;
    height:200px;
    }
#mesaj{
font-family: 'Roboto', sans-serif;
 float:right;
margin-top:10px;
color: #f13c05;
}
#charNum{
font-family: 'Roboto', sans-serif;
 float:right;
margin-right:5px;
margin-top:10px;
color: #f13c05;
 
}
 
 
#btn_container{
margin-top:5px;
}
 
.btn {
  width:1.6cm;
  height:0.8cm;
 -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0px;
  font-family: Arial;
  font-weight: bold;
  color: #000;
  font-size: 13px;
 
  padding: 2px 2px 2px 2px;
 background: #FFFFFF;
  border:  solid #000 1px;
  text-decoration: none;
}
 
#leg{
font-family: 'Roboto', sans-serif;
}
#countdown{
margin:auto;
font-family: 'Roboto', sans-serif;
font-size:20px;
color: #f13c05;
}
 
#nextwriternotification{
float:right;
}
#lastwriternotification{
float:left;
}
 
#logo{
margin:auto;
 height: auto; 
    width: auto; 
    max-width: 181x; 
    max-height: 58px;
}
 
 
img{
max-width:60%;
max-height:60%;
}
}
</style>
 
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script>   
 
 function countChar(val) {
        var len = val.value.length;
        if (len >= 500) {
          val.value = val.value.substring(0, 500);
        } else {
          $('#charNum').text( 500 - len);
        }
      };
 
(function(){
  $(document).ready(function() {
   var php_url_name= "<?php echo $back_url; ?>";
  	var time = "00:05:01",
      parts = time.split(':'),
      hours = +parts[0],
      minutes = +parts[1],
      seconds = +parts[2],
      span = $('#countdown');
 
    function correctNum(num) {
      return (num<10)? ("0"+num):num;
    }
 
    var timer = setInterval(function(){
    	seconds--;
      	if(seconds == -1) {
        	seconds = 59;
          	minutes--;
 
          	if(minutes == -1) {
            	minutes = 59;
              	hours--;
 
              	if(hours==-1) {
                  window.location.replace(php_url_name);
 
                  clearInterval(timer);
                  return;
                }
            }
        }
      	span.text(correctNum(hours) + ":" + correctNum(minutes) + ":" + correctNum(seconds));
    }, 1000);
  }); 
})()
</script>
</head>
 
<body>
<div class="header">
<div id="container">
<center>
<div id="logo">
<img src="nessirlogo.png"/>
</div>
 
<div id="main">
 
<br>
 
 
<div  id="oldtext">
<center>
<textarea readonly  id="field1" style="overflow:auto;resize:none" rows="20" cols="116" >
 
<?php 
 
$filename= $file;
 
$file_ptr     = fopen ( $filename, "r" );
$file_size    = filesize ( $filename );
$text         = fread ( $file_ptr, $file_size );
fclose ( $file_ptr );
 
echo  $text ;
 
?>
</textarea>
</div>
 
<br>
 
<div id="queue">
 
<span id="lastwriternotification"> <?php  echo $usern . ", you are now writing."; ?></span>
 
 
<span id="nextwriternotification"><?php  echo $array[0]; ?> </span>
 
</div>
 
<br>
<div id="timer">
<center>
<span id="countdown">Time flies!</span>
</center>
</div>
 
<br>
<div id="newtext">
 
<form action="" method="post">
<fieldset>
<legend id="leg">Write the story:</legend>
 
<textarea id="field" onkeyup="countChar(this)" maxlength="500" name="text" rows="20" cols="110" resize: none;></textarea>
 
<div id="mesaj"> characters.</div>
 
<div id="charNum">500</div> 
 
<div id="btn_container">
 
 
<input class="btn" type="submit"/>
<input class="btn" type="reset" />
 
</div>
 
 
</fieldset>
 
</form>
</div>
 
</div>
 
</center>
</div>
</div>
</body>	