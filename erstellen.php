<?php

include('function.php');

$geschlecht = trim(htmlentities(strip_tags($_POST['geschlecht'])));
$vorname = trim(htmlentities(strip_tags($_POST['vorname'])));
$name = trim(htmlentities(strip_tags($_POST['name'])));
$strasse = trim(htmlentities(strip_tags($_POST['strasse'])));
$plz = trim(htmlentities(strip_tags($_POST['postleitzahl'])));
$ort = trim(htmlentities(strip_tags($_POST['ort'])));

if(empty($geschlecht) || empty($vorname) || empty($name) || empty($strasse) || empty($plz) || empty($ort)){error();}
if(strlen($geschlecht.$vorname.$name.$strasse.$plz.$ort)/6>60){error();}

if ($_POST['id']!="") {
	$id = $_POST['id'];
	$adressen[$id] = array('Geschlecht' => $geschlecht, 'Vorname'=>$vorname, 'Name'=>$name, 'Strasse'=>$strasse, 'Postleitzahl'=>$plz, 'Ort'=>$ort);
	erfassen($adressen, $filename);
	//header("location: single.php?id=$id");
}
else{
	$adressen[] = array('Geschlecht' => $geschlecht, 'Vorname'=>$vorname, 'Name'=>$name, 'Strasse'=>$strasse, 'Postleitzahl'=>$plz, 'Ort'=>$ort);
	erfassen($adressen, $filename);
 
}


?>