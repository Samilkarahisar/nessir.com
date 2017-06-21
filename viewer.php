<?php
 
 
session_start();
 
if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
         unset($_SESSION['fname']);
   }
} 
 
 
include("db_settings.php");
 
$url = 'http://nessir.com/viewer.php';
 
if(isset($_GET['textid'])){
$textyid=$_GET['textid'];
 
$sql = $conn->query( "SELECT * FROM texts WHERE id=$textyid");
 
}
else{
 
$sql1 = $conn->query("SELECT * FROM texts");
 
 
$row_count= mysqli_num_rows($sql1);
 
$e= 1;
 
$max_row= $row_count - $e;
 
$count= rand(0,$max_row);
 
$sql = $conn->query( "SELECT * FROM texts WHERE id=$count ");
 
 
}
 
$row = $sql->fetch_assoc();
$file= $row["name"] . ".txt";
 
 
$_SESSION['fname'] = $row["name"];
$_SESSION['fid'] = $row[id];
 
 
?>	
 
<!-- HTML form -->
<head>
 
<style>
body{
background:#FAFAFA
}
.header{
margin-top:30px;
background:#FAFAFA;
top:0;
width:100%;
position:fixed;
}
 
hr{
color: #0033ff;
background-color: #0033ff;
height: 5px;
}
.btn {
margin-top:10px;
padding-left:25px;
margin-left:8px;
width: 230px;
height:50px;
font-family: Arial;
color: black;
font-size: 19px;
padding: 10px 20px 10px 20px;
}
 
 
#field{
 
margin:auto;
resize:none;
width:810px;
height:400px;
font-size:14px;
}
#main{
 
    margin:auto;
    width:860px;
    height:610px;
    padding:10px;
    background-color:#FAFAFA;
    border-radius: 10px;
    }
 
#oldtext{
    width:840px;
    height:200px;
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
#getinqueue{
margin-top:250px;
}
</style>
 
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script>   
var btn = document.getElementById('myBtn');
btn.addEventListener('click', function() {
  document.location.href = 'http://nessir.com/homepage.php';
});
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
<textarea readonly  id="field" style="overflow:auto;resize:none" cols="116" >
 
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
 
<div id="shake">
 
 
 
</div>
 
<div id="getinqueue">
 
<FORM METHOD="LINK" ACTION="http://nessir.com/viewer.php">
<INPUT TYPE="submit" class="btn"  VALUE="nessir-shake">
</FORM>
 
<input type="button" value="Write to this" class="btn" id="btnHome" onClick="window.location = 'http://nessir.com/write.php'" />
<input type="button" value="Homepage" class="btn" id="btnHome" onClick="window.location = 'http://nessir.com/homepage.php'" />
</div>
 
</div>
<br>
 
 
 
 
 
</center>
</div>
 
</div>
</body>	