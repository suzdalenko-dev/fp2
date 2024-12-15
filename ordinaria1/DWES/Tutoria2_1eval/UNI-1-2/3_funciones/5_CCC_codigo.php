<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ejercicio 5 - Número cuenta</title>

</head>
<body>
		<header class="row header">
			<h1 class="col-md-8 col-md-offset-2 text-center">Ejercicio 5 - Número cuenta</h1>
		</header>
				<?php
					function calculaDigito($numero){
						if (strlen($numero)!=10) return "X";
						$cifras = array(1,2,4,8,5,10,9,7,3,6);
						$digit=0;
						for ($i=0; $i < 10; $i++) {
						    $digit += substr($numero,$i,1) * $cifras[$i];
						}
						$digit = 11 - ($digit % 11);
						if ($digit == 11) $digit = 0;
						if ($digit == 10) $digit = 1;
						return $digit;
					}
					function validaCCC($bank, $oficina, $cd, $acc) {
						if (calculaDigito("00".$bank.$oficina)!=$cd{0}) return false;
						if (calculaDigito($acc)!=$cd{1}) return false;
						return true;
					}
					function valorLetras($cifras) {
						$LETRAS = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // A=10, B=11, ... Z=35
      					$items = array();
      					for ($i=0; $i<strlen($cifras); $i++) {
        					$posicion = strpos($LETRAS, $cifras[$i]);
        					$items[] = $posicion < 0? "-": $posicion;
      					}
      					return implode("", $items);
					}
					function modulo($cifras, $divisor) {
    				  /*
        				El entero más grande en PHP es 2.147.483.647 (2^31-1) (PHP_INT_MAX)
        				que tiene 10 cifras, de las cuales las 9 últimas pueden tomar cualquier valor.
        				El divisor y el resto tendrán 2 cifras. Por lo tanto CUENTA como tope
        				puede ser de 7 cifras (9-2) y como mínimo de 1 cifra.
      				  */
      					$CUENTA = 7;
      					$len = strlen($cifras);
      					$resto = 0;
      					for ($i=0; $i<$len; $i+=$CUENTA) {
        					$dividendo = $resto . substr($cifras, $i, $CUENTA);
        					$resto = intval($dividendo) % $divisor;
      					}
      					return $resto;
    				}
					function validaIBAN($prefijo, $bank, $oficina, $cd, $acc){
						$pais = substr($prefijo, 0, 2);
      					$dc = substr($prefijo, 2);
						$iban = $bank.$oficina.$cd.$acc.valorLetras($pais).$dc;
						$resto = modulo($iban, 97);
						return 1 == $resto;
					}
					function validaCuenta($ccc){
						$output = $prefijo = $bank = $oficina = $cd = $acc = "";
						$iban = false;
						$arrayccc = str_split($ccc);
						$separador = 0;
						if(count($arrayccc) == 24) {
							$output .= "<b>IBAN</b>: ".$ccc."<br>";
							$iban = true;
						}else if(count($arrayccc) == 20){
							$output .= "<b>CCC</b>: ".$ccc."<br>";
						}else{
							return "Ha introducido un valor erróneo, pruebe a introducir una serie de 20 dígitos en el caso de CCC o hasta 34 en caso de IBAN";
						}
						if($iban) {
							$prefijo = substr($ccc, 0, 4);
							$separador = 4;
						}
						$bank = substr($ccc, 0+$separador, 4);
						$oficina = substr($ccc, 4+$separador, 4);
						$dc = substr($ccc, 8+$separador, 2);
						$acc = substr($ccc, 10+$separador);
						if($iban){
							$output .="<b>Prefijo</b>: ".$prefijo."<br>";
						}
						$output .= "<b>Banco</b>: ".$bank."<br>";
						$output .= "<b>Oficina</b>: ".$oficina."<br>";
						$output .= "<b>Dígito de control: ".$dc."</b><br>";
						$output .= "<b>Número de cuenta</b>: ".$acc."<br>";
						if($iban) {
							$output .=(validaIBAN($prefijo, $bank, $oficina, $dc, $acc))?"<b>Es un IBAN válido</b>":"<b>No es un IBAN válido</b>";
						} else {
							$output .= (validaCCC($bank, $oficina, $dc, $acc))?"<b>Es un número de cuenta válido</b>":"<b>No es un número de cuenta válido</b>";
						}
						return $output;
					}
					$ccc = "28728332131184518432";
					$ccc="27287663240970625687";
					echo validaCuenta($ccc);
				

				?>	
			</div>
	</div>
</body>
</html>