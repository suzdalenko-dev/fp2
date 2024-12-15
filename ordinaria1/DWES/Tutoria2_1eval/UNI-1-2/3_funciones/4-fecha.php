<html>
	<head>
		<title>Ejercicio 2</title>
	</head>
	
	<body>
		<?php
		function esBisiesto($year){
			return $year%4==0 || $year%100==0 && $year%400!=0;
		}
		
		function validacion($a){
			$meses = array(31,28,31,30,31,30,31,31,30,31,30,31);
			
			// se puede hacer son substring
			$fecha = explode("/", $a);
			$dia=$fecha[0];
			$mes=$fecha[1];
			$anio=$fecha[2];
			
			//comprobamos el mes
			if($mes>0 && $mes<=12){
			}else{
				return false;
			}
			
			//comprobamos si es bisiesto
			if(esBisiesto($anio)){
				$meses[1]=29;
			}
			
			//comprobamos si los dias estan entre los valores
			if($dia>$meses[$mes-1]){
				return false;
			}else{
				return true; 
			}
		}
		// ------- probar con estas fechas ----------------------
		//$fecha="29/02/2016";
		//$fecha="29/02/2017";
		//$fecha="31/11/2017";
		$fecha="31/13/2012";
		
		if (validacion($fecha))
			echo "es válida";
		else	
			echo "NO es válida";
	
		?>
	</body>
</html>