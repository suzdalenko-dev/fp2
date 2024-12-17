<html>
	<head>
		<title></title>
	</head>
	<body>
		<?PHP
			$n = 21;
			$i=2;
			$primo=true;
			while (($i< $n) && ($primo)){
				if($n%$i==0){
					$primo=false;
				}
				echo $i."\t";
				$i++;
			}

			if($primo){
				echo "<br> $n es primo";
			}else {
				echo "<br> $n no es primo";
			}

		?>
	</body>
</html>