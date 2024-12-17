<?php
$ok = true;
$dwes->beginTransaction();
if($dwes->exec('DELETE …') == 0)
	 $ok = false; // error

if($dwes->exec('UPDATE …') == 0)
	 $ok = false;  // error
…
if ($ok) 
	$dwes->commit();  // Si todo fue bien confirma los cambios
else 
	$dwes->rollback();   //  y si no, los revierte
?>
