<?php

session_start();

include("db_settings.php");

/* on peut ajouter à cette page un bouton de refresh */

if(isset($_REQUEST['username'])){

/* echo  $_SESSION['userwaitsuntil'] bu sistemi de&#287;i&#351;tiriyoruz.. */
$un=$_REQUEST['username'];

$q_file = $_SESSION['yourq'];

$info = getdate();

$actualtime = ($info['hours'] * 60) + ($info['minutes']);

$checkin = $conn->query("SELECT * FROM $q_file WHERE username='$un' ");

$userdata= $checkin ->fetch_assoc();



$findid= $userdata['id'] - 1;


$checkin2 = $conn -> query("SELECT time_until FROM $q_file WHERE id=$findid");

$userbeforedata= $checkin2 ->fetch_assoc();


echo 'Here is some test-data: userbefores id is ' . $findid . "-- et il pourra ecrire jusqu'à "  . $userbeforedata['time_until']  ;

$mintowait= $userbeforedata['time_until'] - $actualtime;

echo "--you wait encore " . $mintowait;

if($mintowait<=0){

header("Location: http://nessir.com/write.php");

}

$back_url = "http://nessir.com/write.php";


}
else{
echo 'You should login first. Go back bro.';
}


?>

<!-- HTML form -->
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script>

(function(){
  $(document).ready(function() {

   var php_url_name= "<?php echo $back_url; ?>";
  	var time = "<?php echo $mintowait; ?>",
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
      	span.text( "This nessir will be reserved to you for 5 minutes in " + correctNum(time) + " minutes" );
    }, 1000);
  }); 
})()

</script>

<style>
#countdown{
margin:auto;
font-family: 'Roboto', sans-serif;
font-size:20px;
color: #0033ff;

}
</style>
</head>

<body>
<div id="inner">
<div id="timer">
<center>
<span id="countdown">Aks&#305;n zaman!</span>
</center>
</div>
</div>
</body>