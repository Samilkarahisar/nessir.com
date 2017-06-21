<?php
if (isset($_REQUEST["username"])) {
echo 'loginok';
}
else {
header ("Location: login.php");
}
?>



<html>
<head>
<title>Nessir-Homepage</title>
<style>

body{
background-color:#FAFAFA;
}


#logo{
margin-top:100px;
 height: auto; 
    width: auto; 
    max-width: 300px; 
    max-height: 200px;
padding:10px;
margin-bot:30px;
}
.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #cf866c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #cf866c;
	box-shadow:inset 0px 1px 0px 0px #cf866c;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #d0451b), color-stop(1, #bc3315));
	background:-moz-linear-gradient(top, #d0451b 5%, #bc3315 100%);
	background:-webkit-linear-gradient(top, #d0451b 5%, #bc3315 100%);
	background:-o-linear-gradient(top, #d0451b 5%, #bc3315 100%);
	background:-ms-linear-gradient(top, #d0451b 5%, #bc3315 100%);
	background:linear-gradient(to bottom, #d0451b 5%, #bc3315 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d0451b', endColorstr='#bc3315',GradientType=0);
	background-color:#d0451b;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #942911;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #854629;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bc3315), color-stop(1, #d0451b));
	background:-moz-linear-gradient(top, #bc3315 5%, #d0451b 100%);
	background:-webkit-linear-gradient(top, #bc3315 5%, #d0451b 100%);
	background:-o-linear-gradient(top, #bc3315 5%, #d0451b 100%);
	background:-ms-linear-gradient(top, #bc3315 5%, #d0451b 100%);
	background:linear-gradient(to bottom, #bc3315 5%, #d0451b 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bc3315', endColorstr='#d0451b',GradientType=0);
	background-color:#bc3315;
}
.myButton:active {
	position:relative;
	top:1px;
}


img{
max-width:60%;
max-height:60%;
}

.btn {
margin:auto;
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
<center>
<a href="http://www.nessir.com/logout.php" class="myButton">Logout.</a>
<div id="logo">

<img src="nessirlogo.png"/>

</div>

<div id="buttons">

<FORM METHOD="LINK" ACTION="http://nessir.com/new.php">
<INPUT TYPE="submit" class="btn"  VALUE="Begin a new nessir">
</FORM>
<FORM METHOD="LINK" ACTION="http://nessir.com/viewer.php">
<INPUT TYPE="submit" class="btn"  VALUE="Read(Random)">
</FORM>

</div>


</center>

</body>

</html>				