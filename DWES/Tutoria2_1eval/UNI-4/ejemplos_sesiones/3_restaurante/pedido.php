<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    </head>
    <body>
        <?php
        session_start();
        $platos = array("hamburguesa"=>"5","pizza"=>"10","pechugapollo"=>"7.5","tartamanzana"=>"3.5","sushi"=>"10","lasaña"=>"7");
        $_SESSION["platos"] = $platos;
            foreach($platos as $key=>$value){
                echo "<a href='importe.php?nombre=$key'.jpg>";
				echo "<img src='img/".$key.".jpg'/>";
				echo "</a>";
                echo " ";
            }
			$descuento = array_rand($platos);
            $_SESSION["descuento"] = $descuento;
             echo "<div><center><h2>Oferta del Día:</h2><img src='img/".$descuento.".jpg'/></center></div>"
			
        ?>
    </body>
</html>
