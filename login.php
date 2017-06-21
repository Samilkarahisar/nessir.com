<html>
  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<title>Nessir - Writer connection</title>

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
border: solid #FAFAFA 1px;
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


#logo{
margin:auto;
 height: auto; 
    width: auto; 
    max-width: 173px; 
    max-height: 173px;
}


img{
max-width:80%;
max-height:80%;
}
</style>
</head>
  
<body>
<center>
<?php
if (!$hata =="") {
echo '<font face="verdana" size="2" color="#800000"><b>Giri&#351; S&#305;ras&#305;nda Hata Olu&#351;tu</b><br>';
echo '&#350;ifre veya Kullan&#305;c&#305; Ad&#305; Yanl&#305;&#351;. Tekrar Deneyin<br>';
}
?>
</center>

<center>
<div id="logo">
<img src="nessirlogo.png"/>
</div>

</center>
<div id="merkez">
<form action="login_done.php" method="post">

<div id="tcontain">
<input class="textbox" type="text" name="kullaniciadi" size="25" required placeholder="Pen name" autocomplete="off">
<input class="textbox" type="password" name="sifre" size="25" required placeholder="Password" autocomplete="off">

</div>
<input class="btn" type="submit" value="Connect">
</form>
</div>

</body>
  
</html>