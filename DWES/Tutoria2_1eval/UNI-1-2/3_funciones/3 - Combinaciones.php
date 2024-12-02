<html>
	<head>
		<title>Ejercicio PHP</title>
		<meta charset="UTF-8"/>
		<style type="text/css">
			body {
				font-family: "verdana";
				background-color: black;
				color: white;}
		</style>
	</head>
	<body>
		<?php
			// ------------ version recursiva ------------
			function factor($num){
				if ($num == 1) {
					return 1;
				}else{
					return $num*factor($num-1);
				}
			}

			function combinaciones($n1, $n2){
				$resultado = factor($n1+$n2-1)/(factor($n2)*factor($n1-1));
				return $resultado;
			}
			
			$n1 = 5;
			$n2 = 3;
			echo "El resultado es " . combinaciones($n1, $n2);
		
		?>
	</body>
</html>