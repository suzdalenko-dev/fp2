<html>
	<head>
        <meta charset="UTF-8">
		<title>Capicuas 100-999</title>
	</head>
	<body>
		<h1>1)	Generar n&uacutemeros que son capic&uacutea entre 100 y 999.</h1>
		<?php

		for ($i = 100 ; $i<=999; $i++){
			$u= $i%10;
			$c= (int)($i/100); //con el floor extraemos solo la parte entera de la division
			if ($u==$c){
				echo "El numero $i es capicua <br>";
			}
		}
		?>
	</body>
</html>