<?php
	$cc="27287663240970625687";
	
	function mostrarCodigoEntidad($cc){
		$resultado=substr($cc,0,4);
		return $resultado;
	}
	
	function mostrarCodigoOficina($cc){
		$resultado=substr($cc,4,4);
		return $resultado;
	}
	
	function mostrarNumeroControl($cc){
		$resultado=substr($cc,8,2);
		return $resultado;
	}
	
	function mostrarNumeroCuenta($cc){
		$resultado=substr($cc,10,10);
		return $resultado;
	}
	

	
function valCuentaBancaria ($cuenta1,$cuenta2,$cuenta3,$cuenta4)
{
	$valido=true;
	if (mod11CuentaBancaria("00".$cuenta1.$cuenta2)!=$cuenta3{0}){ 
	$valido=false;
	}
	if (mod11CuentaBancaria($cuenta4)!=$cuenta3{1}){
		  $valido=false;
	}else{
	$valido=true;
	}
	return $valido;
}

function mod11CuentaBancaria($numero){
		if (strlen($numero)!=10) return "?";

		$cifras = Array(1,2,4,8,5,10,9,7,3,6);
		$chequeo=0;
	 for ($i=0; $i < 10; $i++)
    	$chequeo += substr($numero,$i,1) * $cifras[$i];
		$chequeo = 11 - ($chequeo % 11);
	 if ($chequeo == 11) 
		$chequeo = 0;
	 if ($chequeo == 10) 
		$chequeo = 1;
	  return $chequeo;
	}

	$cuenta1=mostrarCodigoEntidad($cc);
	$cuenta2=mostrarCodigoOficina($cc);
	$cuenta3=mostrarNumeroControl($cc);
	$cuenta4=mostrarNumeroCuenta($cc);
	echo $cuenta1.$cuenta2.$cuenta3.$cuenta4;
	print($cuenta4);
	print(valCuentaBancaria ($cuenta1,$cuenta2,$cuenta3,$cuenta4)?"valido":"no valido");
?>