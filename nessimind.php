<?php
include("db_settings.php");

$info = getdate();

$actualtime = ($info['hours'] * 60) + ($info['minutes']);


$sql1= $conn->query("SELECT * FROM texts");

while($filenames = $sql1->fetch_assoc()){
    $new_array[$filenames['id']] = $filenames; // new array will contain _queue names
}

for ($x = 0; $x <= 100; $x++) {

$totest = $new_array[$x]['name'] . "_queue";

if($sql = $conn->query("SELECT * FROM $totest LIMIT 1")){

$refreshingtimeuntil = $sql->fetch_assoc();

if($actualtime>$refreshingtimeuntil['time_until']) {

$sql_delete = $conn->query("DELETE FROM $totest limit 1");

$myfile = fopen("mind_did.txt", "a");

$eklenen = "DELETED " . $refreshingtimeuntil['username'] . "FROM" . $totest  ."AT " . $actualtime . "." . "\n";

fwrite($myfile, $eklenen);

fclose($myfile);


} 
}


}

?>