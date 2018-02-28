<?php

$count=0;
$retorno = array();
foreach ($_FILES['file']['name'] as $filename) 
{
	$tmp=$_FILES['file']['tmp_name'][$count];
	$name=$_FILES['file']['name'][$count];
	$count=$count + 1;
	$destino = 'uploads/' . $name;
	move_uploaded_file( $tmp, $destino);
}
?>
