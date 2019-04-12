<?php 

function readList($filename){
	$j_list = file_get_contents($filename);
	$liste 	= json_decode($j_list, JSON_OBJECT_AS_ARRAY);
	return $liste;
}

function adressliste($filename){
	$liste = readList($filename);
	foreach ($liste[0] as $key => $adress ) {
		//$kid = $key + 1;
		echo "#" . $key . " " .  $adress['Vorname'] . " " . $adress['Name'] ." ". $adress['Strasse'] ." ". $adress['Postleitzahl'] . " " . $adress['Ort'] . "\n";
	}
}

function erfassen(&$adressen, $filename){
	//print_r($adressen);
	jsonSave($filename, $adressen);
}

function jsonSave($filename, $adressen){
	$json_data = json_encode($adressen);
	if(file_put_contents($filename, $json_data)){
		return  "Datei gespeichert!";
	}
}

     

$filename = './adressen.json';
$adressen = json_decode(file_get_contents($filename), JSON_OBJECT_AS_ARRAY);

?>