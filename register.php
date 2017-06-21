<?php

include("db_settings.php");

$sql= $conn->query("SELECT * FROM uye");

$total = $sql->num_rows;

$left = 200 - $total;

?>

<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<title>Nessir - Kay&#305;t</title>

<style>

body{
background-color:white;
}
#forspan{
margin-bottom:20px;
}
#merkez{
width:250px;
height:300px;
margin:auto;
}
input:focus {outline: none; }
span{
font-family: 'Roboto', sans-serif;
color:red;
 text-decoration: underline;
}
.textbox{
background:none;
padding-left:25px;
border-top:  black 1px;
border-right: black 1px;
border-bottom: black 1px;
border-left: black 1px;
width: 230px;
height:50px;
font-size:15px;
}

#tcontain{
margin-top:5px;
padding-left:8px;
border: solid  #F2F2F2  1px;
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
<div id="logo">
<img src="nessirlogo.png"/>
</div>
</center>

<div id="merkez">
<form action="register_done.php" method="post">

<div id="tcontain">

<input class="textbox" type="text" name="ad" id="ad" size="25" required placeholder="Name" autocomplete="off">
<input class="textbox" type="text" name="kullaniciadi" id="kullaniciadi" size="25" required placeholder="Pen name" autocomplete="off">
<input class="textbox" type="password" name="sifre" id="sifre" size="25" required placeholder="Password" autocomplete="off">
<input class="textbox" type="text" name="posta" id="posta" size="25" required placeholder="Email" autocomplete="off">



</div>
<input class="btn" type="submit" value="Register" name="B1">

</form>
</div>


<center>
<div id="forspan">
<span><?php echo  $total . " users already became writers. " . "Only " .$left . " more will join the beta phase." ; ?></span>
</div>
<iframe width="560" height="315" src="https://www.youtube.com/embed/lEvMSVjF5E8" frameborder="0" allowfullscreen></iframe>
</center>
</body>
</html>