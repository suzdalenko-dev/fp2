<?PHP
	$capitales = array(
					'europa'=>array('spain'=>'madrid','portugal'=>'lisboa','rusia'=>'moscu','bielorusia'=>'minsk','cuba'=>'la Habana',
									'francia'=>'Paris'),
					'america'=>array('nicaragua'=>'managua','mexico'=>'mexico d.f','canada'=>'ottawa','USA'=>'Washington DC'),
					'africa'=>array('libia'=>'tripoli','argelia'=>'argel','marruecos'=>'rabat'));


	foreach($capitales['europa'] as $clave=>$value){
		echo "$clave => $value <br>";
	}
?>